<?php
class GuidanceController extends Student {

    public function login($username, $password) {
        global $db;
        $responseData = [];
        try {
            // Get data by email
            $params = [
                'username' => $username,
                'password' => $password
            ];
            $user = new UserController($db);
            $responeUser = $user->getUser($params);
            $responeUser = isset($responeUser[0]) ? $responeUser[0] : $responeUser;
            // Check if there are any rows returned
            if (!empty($responeUser)) {
                if (isset($responeUser['role']) && $responeUser['role'] == "Guidance Office") {

                    $params = [
                        "SET" => "online = '1'",
                        "WHERE" => "username = '$username'",
                    ];

                    $update = $user->update($params);
                    if ($update ) {
                        setcookie('GUIDANCE_LOGIN_AUTH', $responeUser['id'], time() + (86400 * 30), '/');
                        $responseData['status'] = 'success';
                        $responseData['message'] = 'Login successfully.';
                        $responseData['type'] = 'success';
                    } else {
                        $responseData['status'] = 'failed';
                        $responseData['message'] = 'Failed to login.';
                        $responseData['type'] = 'error'; 
                    }
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'Email or password do not match for this portal.';
                    $responseData['type'] = 'warning';
                }
            } else {
                $responseData['status'] = 'failed';
                $responseData['message'] = 'Email or password do not match.';
                $responseData['type'] = 'danger';
            }
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in login(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in login(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }

        return $responseData;
    }

    public function isGuidanceLogin() {
        if (isset($_COOKIE['GUIDANCE_LOGIN_AUTH']) && !empty($_COOKIE['GUIDANCE_LOGIN_AUTH'])) {
            return $_COOKIE['GUIDANCE_LOGIN_AUTH'];
        } else {
            return false;
        }
    }

    function getGuidanceLoginData(){
        global $db;
        $loginId = $this->isGuidanceLogin();

        $responseData = [];
        try {
            // Get data by email
            $params = [
                'id' => $loginId,
            ];
            $user = new UserController($db);
            $responeUser = $user->getUser($params);
            $responeUser = isset($responeUser[0]) ? $responeUser[0] : $responeUser;
            // Check if there are any rows returned
            if (!empty($responeUser)) {
                return $responeUser;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in getGuidanceLoginData(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in getGuidanceLoginData(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }

        return $responseData;
    }

    public function logout() {
        global $db;
        $user = new UserController($db);
        $loginId = $this->isGuidanceLogin();

        $params = [
            "SET" => "online = '0'",
            "WHERE" => "id = '$loginId'",
        ];

        $update = $user->update($params);
        $return = array();
        if ($update) {
            setcookie('GUIDANCE_LOGIN_AUTH', '', time() - 3600, '/');
            $return['status'] = 'success';
            $return['message'] = 'Logout successfully.';
            $return['type'] = 'success';
        } else {
            $return['status'] = 'failed';
            $return['message'] = 'Failed to logout.';
            $return['type'] = 'error'; 
        }
        
        return json_encode($return);
    }
    
    public function getNotifications() {
        global $db;
        $academic = new AcademicController($db);
        $academicYear = $academic->getActiveAcademicYear();

        $semester = new SemesterController($db);
        $semesterData = $semester->getActiveSemester();

        $semester = !empty($semesterData) ? $semesterData[0]['semester_name'] : null;
        $start = !empty($academicYear) ? $academicYear[0]['academic_start'] : null;
        $end = !empty($academicYear)? $academicYear[0]['academic_end']: null;
        $academic = !empty($academicYear) ? "$start-$end" : null;

        $responseData = [];

        try {
            // Get data by email
            $params = [
                'newApplicant' => [
                    'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type='New Applicant' ",
                ],
                'acceptApplicant' => [
                    'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type='Accept Applicant' ",
                ],
                'formDone' => [
                    'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type='Form Done' ",
                ]
            ];
            
            
            $newApplicant = $this->getStudentList($params['newApplicant']);
            $acceptApplicant = $this->getStudentList($params['acceptApplicant']);
            $formDone = $this->getStudentList($params['formDone']);

            $acceptApplicant = $acceptApplicant->fetchAll(PDO::FETCH_ASSOC);
            $totalAcceptApplicant = count($acceptApplicant);

            $formDone = $formDone->fetchAll(PDO::FETCH_ASSOC);
            $totalFormDone = count($formDone);

            $newApplicant = $newApplicant->fetchAll(PDO::FETCH_ASSOC);
            $totalNewApplicant = count($newApplicant);
            
            $return = array(
                'totalNewApplicant' => $totalNewApplicant,
                'totalAcceptApplicant' => $totalAcceptApplicant,
                'totalFormDone' => $totalFormDone,
                'totalNotifications' => $totalAcceptApplicant + $totalFormDone + $totalNewApplicant,
            );
            return json_encode($return);
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in getNotifications(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in getNotifications(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }
        return $responseData;
    }

    public function getAcademicAndSemester() {
        global $db;
        $academic = new AcademicController($db);
        $academicYear = $academic->getActiveAcademicYear();

        $semester = new SemesterController($db);
        $semesterData = $semester->getActiveSemester();

        $semester = !empty($semesterData) ? $semesterData[0]['semester_name'] : null;
        $start = !empty($academicYear) ? $academicYear[0]['academic_start'] : null;
        $end = !empty($academicYear)? $academicYear[0]['academic_end']: null;
        $academic = !empty($academicYear) ? "$start-$end" : null;

        return array(
            'academic' => $academic,
            'semester' => $semester
        );
    }

    public function home() {

        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'totalAcceptedApplicant' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type = 'Accept Applicant' ",
            ],
            'totalPassAndEnroll' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type = 'Enroll New Students' ",
            ],
            'totalFailedToPass' => [
                "JOIN" => "INNER JOIN admission_score a ON students.applicant_id = a.applicant_id",
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND total_cat = 'Low Average' ",
            ],
            'totalPassButNotEnroll' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type = 'Applicant' ",
            ],
            'barGraph' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students') ",
                'FIELDS' => "total_cat, count(*) as number",
                'JOIN' => "INNER JOIN admission_score a ON students.applicant_id = a.applicant_id LEFT JOIN course c ON students.course_id=c.course_id LEFT JOIN year_lvl y ON students.year_id=y.year_id",
                'GROUP BY' => "total_cat"
            ]
        ];

        $acceptedApplicant = $this->getStudentList($params['totalAcceptedApplicant']);
        $acceptedApplicant = $acceptedApplicant->fetchAll(PDO::FETCH_ASSOC);
        $totalAcceptedApplicant = count($acceptedApplicant);

        $passAndEnroll = $this->getStudentList($params['totalPassAndEnroll']);
        $passAndEnroll = $passAndEnroll->fetchAll(PDO::FETCH_ASSOC);
        $totalPassAndEnroll = count($passAndEnroll);

        $failedToPass = $this->getStudentList($params['totalFailedToPass']);
        $failedToPass = $failedToPass->fetchAll(PDO::FETCH_ASSOC);
        $totalFailedToPass = count($failedToPass);

        $passButNotEnroll = $this->getStudentList($params['totalPassButNotEnroll']);
        $passButNotEnroll = $passButNotEnroll->fetchAll(PDO::FETCH_ASSOC);
        $totalPassButNotEnroll = count($passButNotEnroll);

        $barGraph = $this->getStudentList($params['barGraph']);
        $barGraph = $barGraph->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'totalAcceptedApplicant' => $totalAcceptedApplicant,
            'totalPassAndEnroll' => $totalPassAndEnroll,
            'totalFailedToPass' => $totalFailedToPass,
            'totalPassButNotEnroll' => $totalPassButNotEnroll,
            'dashboardData' => [
                "barGraph" => $barGraph
            ]
        );
        return $return;
    }

    public function newApplicant() {
        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'newApplicantData' => [
                'WHERE' => "status_type = 'New Applicant' AND academic = '$academic' AND semester_id = '$semester'",
                'ORDER' => "id ASC"
            ],
        ];

        $newApplicantData = $this->getStudentList($params['newApplicantData']);
        $newApplicantData = $newApplicantData->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'newApplicantData' => $newApplicantData
        );
        return $return;
    }

    public function getLastApplicantId() {
        global $db;
        $responseData = [];
        try {
            $query = "SELECT * FROM students order by applicant_id desc limit 1";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $last_id = $row['applicant_id'];
            if ($last_id == "") {
                $applicant_id = "APP10000001";
            } else {
                $applicant_id = substr($last_id, 3);
                $applicant_id = intval($applicant_id);
                $applicant_id = "APP" . ($applicant_id + 1);
            }
            $return = array(
                'lastApplicantId' => $applicant_id
            );
            return $return;
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in getLastApplicantId(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in getLastApplicantId(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }
        return $responseData;
    }

    public function acceptNewApplicantController($data) {
        global $db;
        
        try {
            $lastApplicantId = $this->getLastApplicantId();
            $lastApplicantId = $lastApplicantId['lastApplicantId'];
            //return $lastApplicantId;
            $id = $data['id'];

            $query = [
                'SET' => "status_type = 'Accept Applicant', applicant_id = '$lastApplicantId'",
                'WHERE' => "id = '$id'",
            ];

            $studendModel = new Student($db);
            $update = $studendModel->update($query);

            if ($update) {
                $query = "INSERT INTO documents VALUES(null, '$lastApplicantId', '', '', '', '', '', '')";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $return = array(
                    'status' => 'success',
                    'message' => 'Applicant accepted successfully.',
                    'type' => 'success',
                    'id' => $id
                );
            } else {
                $return = array(
                    'status' => 'failed',
                    'message' => 'Failed to accept applicant.',
                    'type' => 'error',
                    'id' => $id
                );
            }
            return json_encode($return);
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in acceptNewApplicantController(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in acceptNewApplicantController(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }
        return $responseData;
    }

}