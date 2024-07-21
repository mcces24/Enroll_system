<?php
class StudentController extends Student {

    public function getLoginUserId() {
        if (isset($_COOKIE['USER_LOGIN_AUTH']) && !empty($_COOKIE['USER_LOGIN_AUTH'])) {
            $userId = $_COOKIE['USER_LOGIN_AUTH'];
        } else {
            $userId = 0;
        }
        return $userId;
    }

    public function ifAlreadyPreEnrollController($data) {
        $response = [];
        try {
            $stmt = $this->ifAlreadyPreEnroll($data);
            if ($stmt->rowCount() > 0) {
                $response['isAlreadySubmitted'] = true;
            } else {
                $response['isAlreadySubmitted'] = false;
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in ifAlreadyPreEnrollController(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in ifAlreadyPreEnrollController(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
        return $response;
    }
    
    public function preEnrollAdd($data) {
        $response = [];
        try {
            $stmt = $this->ifAlreadyPreEnroll($data);
            if ($stmt->rowCount() > 0) {
                $response['isPreEnroll'] = false;
                $response['type'] = 'error';
                $response['message'] = 'You have already submitted.';
            } else {
                $stmt = $this->createPreEnroll($data);
                if ($stmt) {
                    $response['isPreEnroll'] = true;
                    $response['type'] = 'success';
                    $response['message'] = 'Pre-enrolled Successfully.';
                } else {
                    $response['isPreEnroll'] = false;
                    $response['type'] = 'error';
                    $response['message'] = 'Something went wrong! Try Again.';
                }
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in preEnrollAdd(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in preEnrollAdd(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
        return $response;
    }

    function getStudents(){
        $userId = $this->getLoginUserId();
        $data = [
            'new_user_id' => $userId
        ];
        $response = $this->getStudentLists($data);
        return $response;
    }

    function getStudentLists($data) {
        global $db; 
        try {
            $new_user_id = $data['new_user_id'];
            $condition = [
                'WHERE' => "new_user_id = $new_user_id",
                'LIMIT' => 1,
                'ORDER' => 'id DESC',
            ];
            $studentLists = $this->getStudentList($condition);

            if ($studentLists === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $returnStudentList = [];
            while ($row = $studentLists->fetch(PDO::FETCH_ASSOC)) {
                $returnStudentList['students'][] = $row;
            }

            $qrcodeController = new QrcodeController($db);
            $params = [
                'student_id' => isset($returnStudentList['students'][0]['id_number']) ? $returnStudentList['students'][0]['id_number'] : 0,
                'id_number' => isset($returnStudentList['students'][0]['id_number']) ? $returnStudentList['students'][0]['id_number'] : 0,
                'course_id' => isset($returnStudentList['students'][0]['course_id']) ? $returnStudentList['students'][0]['course_id'] : 0,
                'section_id' => isset($returnStudentList['students'][0]['section_id']) ? $returnStudentList['students'][0]['section_id'] : 0,
                'semester_id' => isset($returnStudentList['students'][0]['semester_id']) ? $returnStudentList['students'][0]['semester_id'] : 0,
                'year_id' => isset($returnStudentList['students'][0]['year_id']) ? $returnStudentList['students'][0]['year_id'] : 0,
                'academic' => isset($returnStudentList['students'][0]['year_id']) ? $returnStudentList['students'][0]['year_id'] : 0
            ];
            $qrCode = $qrcodeController->getQrcodeData($params);
            $returnStudentList['qrcode'] = isset($qrCode[0]) ? $qrCode[0] : array();

            $courseController = new CourseController($db);
            $course = $courseController->getCourse($params);
            $returnStudentList['course'] = isset($course[0]) ? $course[0] : array();

            $yearLevelController = new YearLevelController($db);
            $yearLevel = $yearLevelController->getYearLevel($params);
            $returnStudentList['year_lvl'] = isset($yearLevel[0]) ? $yearLevel[0] : array();

            $sectionController = new SectionController($db);
            $section = $sectionController->getSection($params);
            $returnStudentList['sections'] = isset($section[0]) ? $section[0] : array();

            if (isset($returnStudentList[0]['type']) && 
                ($returnStudentList[0]['type'] == 'Shift' || $returnStudentList[0]['type'] == 'Irregular' || $returnStudentList[0]['type'] == 'Transferee')
            ) {
                
            } else{
                $SubjectController = new SubjectController($db);
                $subject = $SubjectController->getSubject($params);
                $returnStudentList['subject'] = isset($subject) ? $subject : array();
            }
    
            return $returnStudentList;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getStudentLists(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getStudentLists(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

//     function getStudentList($data) {
//         global $studentController; // Assuming $semesterController is declared and accessible
//         $new_user_id = $data['new_user_id'];
//         try {
//             $where = `
//                 WHERE
//                     new_user_id = $new_user_id
//             `;
//             $getVerifiedData = $studentController->getStudentList($where);
//             return $getVerifiedData;
//         } catch (Exception $e) {
//             // Handle other exceptions
//             //echo "Exception in createNewUser(): " . $e->getMessage();
//             return false; // or handle the error in another way
//         }
//     }
}