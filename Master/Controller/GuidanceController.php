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
            Check if there are any rows returned
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

        $return = array(
            'academic' => $academic,
            'semester' => $semester 
        );

       return !empty($academicYear) && !empty($semesterData) ? $return : array();
        
    }

    public function getSystemData() {
        global $db;
        $system = new System($db);
        $params = [
            'WHERE' => "system_id = 1",
        ];
        $systemData = $system->read($params);
        $systemData = $systemData->fetchAll(PDO::FETCH_ASSOC);
        return $systemData;
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
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND admission_score < 40",
            ],
            'totalPassButNotEnroll' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND status_type = 'Applicant' ",
            ],
            'barGraph' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students') ",
                'FIELDS' => "admission_score, count(*) as number",
                'JOIN' => "INNER JOIN admission_score a ON students.applicant_id = a.applicant_id LEFT JOIN course c ON students.course_id=c.course_id LEFT JOIN year_lvl y ON students.year_id=y.year_id",
                'GROUP BY' => "admission_score"
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
                    'message' => 'Accepted.',
                    'type' => 'success',
                    'id' => $id
                );
            } else {
                $return = array(
                    'status' => 'failed',
                    'message' => 'Failed to accept.',
                    'type' => 'danger',
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
    
    public function acceptedApplicantController() {
        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'newApplicantData' => [
                'WHERE' => "status_type = 'Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'",
                'ORDER' => "id ASC"
            ],
        ];

        $acceptedApplicant = $this->getStudentList($params['newApplicantData']);
        $acceptedApplicantData = $acceptedApplicant->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'acceptedApplicantData' => $acceptedApplicantData
        );
        return $return;
    }

    public function sendGuidanceFormController($data) {
        global $db;
        $systemData = $this->getSystemData();
        
        try {
            //return $lastApplicantId;
            $id = $data['id'];

            $query = [
                'SET' => "status_type = 'Accept_form'",
                'WHERE' => "id = '$id'",
            ];

            $studendModel = new Student($db);
            $update = $studendModel->update($query);

            if ($update) {
                $return = array(
                    'system' => $systemData,
                    'status' => 'success',
                    'message' => 'Form sent.',
                    'type' => 'success',
                    'id' => $id
                );
            } else {
                $return = array(
                    'status' => 'failed',
                    'message' => 'Failed to send form.',
                    'type' => 'danger',
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

    public function getAppicantByApplicantIdController($applicantId, $params = array()) {
        global $db;
        if  (isset($params['type'])) {
            if ($params['type'] == 'guidanceRecord') {
                $query = [
                    'guidanceRecord' => [
                        'JOIN' => 'INNER JOIN students ON guidance_record.applicant_id = students.applicant_id',
                        'WHERE' => "students.applicant_id='$applicantId'",
                    ],
                ];
                $guidanceRecordModel = new GuidanceRecord($db);
                $guidanceRecord = $guidanceRecordModel->read($query['guidanceRecord']);
                $guidanceRecordData = $guidanceRecord->fetchAll(PDO::FETCH_ASSOC);

                $return = array(
                    'guidanceRecordData' => $guidanceRecordData,
                );
            }
        } else {
            $query = [
                'applicantWithOutRecord' => [
                    'WHERE' => "applicant_id = '$applicantId'",
                ],
                'applicantWithRecord' => [
                    'WHERE' => "status_type != 'Accept_form' AND applicant_id = '$applicantId'",
                ],
            ];
    
            $applicantWithOutRecord = $this->getStudentList($query['applicantWithOutRecord']);
            $applicantWithOutRecordData = $applicantWithOutRecord->fetchAll(PDO::FETCH_ASSOC);
    
            $applicantWithRecord = $this->getStudentList($query['applicantWithRecord']);
            $applicantWithRecordData = $applicantWithRecord->fetchAll(PDO::FETCH_ASSOC);
    
            $return = array(
                'applicantWithOutRecordData' => $applicantWithOutRecordData,
                'applicantWithRecordData' => $applicantWithRecordData
            );
        }
        
        return $return;
    }

    public function isGuidanceRecord($applicantId) {
        global $db;
        $guidanceRecord = new GuidanceRecord($db);
        $params = [
            'WHERE' => "applicant_id = '$applicantId'",
        ];
        $checkRecord = $guidanceRecord->read($params);
        $checkRecordData = $checkRecord->fetchAll(PDO::FETCH_ASSOC);
        return $checkRecordData;
    }

    public function saveApplicantGuidanceRecordController($data) {
        global $db;

        $applicant_id = $data['applicant_id'];
        $record = json_encode($data);
      
        $guidanceRecord = new GuidanceRecord($db);

        $isGuidanceRecord = $this->isGuidanceRecord($applicant_id);
        if (empty($isGuidanceRecord)) {
            $params = [
                'FIELDS' => "record, applicant_id",
                'VALUES' => "'$record', '$applicant_id'"
            ];
            $saveRecord = $guidanceRecord->create($params);
        } else {
            $params = [
                'SET' => "record = '$record'",
                'WHERE' => "applicant_id = '$applicant_id'",
            ];
            $saveRecord = $guidanceRecord->update($params);
        }

        if ($saveRecord) {
            $return = array(
                'status' => 'success',
                'message' => 'Data updated successfully.',
                'type' => 'success',
            );
        } else {
            $return = array(
                'status' => 'failed',
                'message' => 'Failed to update data.',
                'type' => 'danger',
            );
        }

        return json_encode($return);
    }

    public function updateApplicantStatusController($data) {
        global $db;
        $applicant_id = $data['applicant_id'];

        $query = [
            'SET' => "status_type = 'Form Done'",
            'WHERE' => "applicant_id = '$applicant_id'",
        ];

        $update = $this->update($query);
        
        if ($update) {
            $return = array(
                'status' => 'success',
                'message' => 'Data updated successfully.',
                'type' => 'success',
            );
        } else {
            $return = array(
                'status' => 'failed',
                'message' => 'Failed to update data.',
                'type' => 'danger',
            );
        }

        return json_encode($return);
    }

    public function applicantAdmissionController() {
        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'applicantAdmissionData' => [
                'WHERE' => "status_type = 'Form Done' AND academic = '$academic' AND semester_id = '$semester'",
                'ORDER' => "id ASC"
            ],
        ];

        $applicantAdmission = $this->getStudentList($params['applicantAdmissionData']);
        $applicantAdmissionData = $applicantAdmission->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'applicantAdmissionData' => $applicantAdmissionData
        );
        return $return;
    }

    public function sendAdmissionController($data) {
        global $db;
        $systemData = $this->getSystemData();
        try {

            $id = $data['id'];

            $query = [
                'SET' => "status_type = 'Accept'",
                'WHERE' => "id = '$id'",
            ];

            $studendModel = new Student($db);
            $update = $studendModel->update($query);

            if ($update) {
                $return = array(
                    'system' => $systemData,
                    'status' => 'success',
                    'message' => 'Admission sent.',
                    'type' => 'success',
                    'id' => $id
                );
            } else {
                $return = array(
                    'status' => 'failed',
                    'message' => 'Failed to send Admission.',
                    'type' => 'danger',
                    'id' => $id
                );
            }
            return json_encode($return);
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in sendAdmissionController(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in sendAdmissionController(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }
        return $responseData;
    }

    public function applicantGuidanceFormDataController() {
        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'applicantGuidanceFormData' => [
                //'WHERE' => "academic = '$academic' AND semester_id = '$semester'",
                'JOIN' => 'INNER JOIN guidance_record g ON students.applicant_id = g.applicant_id',
                'ORDER' => "students.id ASC"
            ],
        ];

        $applicantGuidanceForm = $this->getStudentList($params['applicantGuidanceFormData']);
        $applicantGuidanceFormData = $applicantGuidanceForm->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'applicantGuidanceFormData' => $applicantGuidanceFormData
        );

        return $return;
    }

    public function applicantScoresController() {
        $getAcademicAndSemester = $this->getAcademicAndSemester();
        $academic = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['academic'] : null;
        $semester = !empty($getAcademicAndSemester) ? $getAcademicAndSemester['semester'] : null;

        $params = [
            'applicantScoresData' => [
                'WHERE' => "academic = '$academic' AND semester_id = '$semester'",
                'JOIN' => 'INNER JOIN admission_score ON students.applicant_id=admission_score.applicant_id INNER JOIN admission_list ON students.applicant_id=admission_list.applicant_id',
                'ORDER' => "admission_id ASC"
            ],
            'applicantList' =>  [
                'FIELDS' => "students.applicant_id, students.fname, students.mname, students.lname, students.age",
                'WHERE' => "academic = '$academic' AND semester_id = '$semester' AND admission_score.applicant_id IS NULL AND students.applicant_id != ''",
                'JOIN' => 'LEFT JOIN admission_score ON students.applicant_id = admission_score.applicant_id',
            ],
        ];

        $applicantScores = $this->getStudentList($params['applicantScoresData']);
        $applicantScoresData = $applicantScores->fetchAll(PDO::FETCH_ASSOC);

        $applicantList = $this->getStudentList($params['applicantList']);
        $applicantListData = $applicantList->fetchAll(PDO::FETCH_ASSOC);

        $return = array(
            'applicantScoresData' => $applicantScoresData,
            'applicantListData' => $applicantListData
        );

        return $return;
    }

    public function addApplicantScoresController($datas) {
        global $db;

        $fields = '';
        $values = '';
        foreach ($datas as $key => $data) {
            // Concatenate keys into $fields
            $fields .= $key;
        
            // Check if current iteration is not the last element
            if ($key !== array_key_last($datas)) {
                $fields .= ", ";
            }
        
            // Concatenate values into $values
            $values .= "'" . $data . "'";
        
            // Check if current iteration is not the last element
            if ($key !== array_key_last($datas)) {
                $values .= ", ";
            }
        }
        $applicant_id = isset($datas['applicant_id']) ? $datas['applicant_id'] : '';
        $addmissionScore = new AdmissionScore($db);

        $params = [
            'FIELDS' => $fields,
            'VALUES' => $values
        ];
        $saveScore = $addmissionScore->create($params);
        if ($saveScore) {
            $return = array(
                'status' => 'success',
                'message' => 'Score added successfully.',
                'type' => 'success',
                'text' => "For " . $applicant_id
            );
        } else {
            $return = array(
                'status' => 'failed',
                'message' => 'Failed to add score.',
                'type' => 'danger',
                'text' => "For " . $applicant_id
            );
        }
        
        return json_encode($return);
    }

    public function importCSVScoreController($datas) {
        global $db;
        //required file
        $csvMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv', 'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        if (!empty($datas) && in_array($datas['type'], $csvMimes)) {

            $requiredCSVDAta = array(
                'Applicant ID',
                'Admission Score',
            );

            $csvFile = fopen($datas['tmp_name'], 'r');

            $getCSVData = fgetcsv($csvFile);

            foreach ($requiredCSVDAta as $key => $value) {
                if ($getCSVData[$key] != $value) {
                    $return = array(
                        'status' => 'failed',
                        'message' => 'Invalid CSV file. Please upload a valid CSV file.',
                        'type' => 'error',
                    );
                    return json_encode($return);
                }
            }

            $insertedData = 0;
            $failedToInsertData = 0;
            $updatedData = 0;
            $failedToUpdatedData = 0;
            $invalidData = 0;
            $dataCount = 0;

            $insertedDataArray = [];
            $failedToInsertDataArray = [];
            $updatedDataArray = [];
            $failedToUpdatedDataArray = [];
            $invalidDataArray = [];
            

            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $dataCount++;

                $applicant_id = $line[0];
                $admissionScore  = $line[1];

                $query = [
                    'checkApplicant' => [
                        'WHERE' => "applicant_id = '$applicant_id'",
                    ],
                    'studentUpdateStatus' => [
                        'SET' => "status_type = 'Accept Applicant'",
                        'WHERE' => "applicant_id = '$applicant_id'",
                    ]
                ];

                $studendModel = new Student($db);
                $haveStudentData = $studendModel->getStudentList($query['checkApplicant']);
                $haveStudent = $haveStudentData->fetchAll(PDO::FETCH_ASSOC);

                if (empty($haveStudent)) {
                    $invalidData++;
                    $invalidDataArray[] = $applicant_id;
                    continue;
                }
                
                $admissionScoreModel = new AdmissionScore($db);
                $haveAdmissionScoreData = $admissionScoreModel->read($query['checkApplicant']);
                $haveAdmissionScore = $haveAdmissionScoreData->fetchAll(PDO::FETCH_ASSOC);

                if (empty($haveAdmissionScore)) {
                    $studendModel = new Student($db);
                    $update = $studendModel->update($query['studentUpdateStatus']);
                    if ($update) {
                        $query = [
                            'FIELDS' => "applicant_id, admission_score",
                            'VALUES' => "'$applicant_id', '$admissionScore'"
                        ];
                        $insertScore = $admissionScoreModel->create($query);
                        if ($insertScore) {
                            $insertedData++;
                            $insertedDataArray[] = $applicant_id;
                        } else {
                            $failedToInsertData++;
                            $failedToInsertDataArray[] = $applicant_id;
                        }
                    }
                } else {
                    $query = [
                        'SET' => "admission_score = '$admissionScore'",
                        'WHERE' => "applicant_id = '$applicant_id'",
                    ];
                    $updateScore = $admissionScoreModel->update($query);
                    if ($updateScore) {
                        $updatedData++;
                        $updatedDataArray[] = $applicant_id;
                    } else {
                        $failedToUpdatedData++;
                        $failedToUpdatedDataArray[] = $applicant_id;
                    }
                }
            }
            if ($dataCount > 0) {
                $allDataArray = array(
                    'insertedData' => $insertedDataArray,
                    'failedToInsertData' => $failedToInsertDataArray,
                    'updatedData' => $updatedDataArray,
                    'failedToUpdatedData' => $failedToUpdatedDataArray,
                    'invalidData' => $invalidDataArray,
                );

                $allDataArray = json_encode($allDataArray);
                
                $return = array(
                    'allDataArray' => $allDataArray,
                    'status' => 'success',
                    'message' => 'Admission score data imported successfully.',
                    'text' => "
                        Inserted: $insertedData | Failed To Insert: $failedToInsertData | Updated: $updatedData | Failed To Update: $failedToUpdatedData | Invalid Data: $invalidData
                    ",
                    'type' => 'success',
                );
            } else {
                $return = array(
                    'status' => 'failed',
                    'message' => 'No data found in CSV file.',
                    'type' => 'error',
                );
            }

        } else {
            $return = array(
                'status' => 'failed',
                'message' => 'Invalid File type. Please upload a valid CSV file.',
                'type' => 'error',
            );
        }

        return json_encode($return);
    }
}
