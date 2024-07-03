<?php
class SubjectController extends Subject {
    public function getSubject($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['id_number'])) {
                    $semester_id = $params['semester_id'];
                    $course_id = $params['course_id'];
                    $year_id = $params['year_id'];
                    $section_id = $params['section_id'];
                    $condition = [
                        'WHERE' => "semester_id = '$semester_id' AND course_id = $course_id AND year_id = $year_id AND section_id = $section_id",
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            
            $subject = $this->read($condition);
            if ($subject === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $responseSubject = [];
            while ($row = $subject->fetch(PDO::FETCH_ASSOC)) {
                $responseSubject[] = $row;
            }
    
            return $responseSubject;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getSubject(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getSubject(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

    // public function isStudentLogin() {
    //     $users = $this->read();
    //     $userArray = [];

    //     while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
    //         $userItem = [
    //             'Id' => $row['Id'],
    //             'email' => $row['email']
    //         ];
    //         array_push($userArray, $userItem);
    //     }

    //     return $userArray;
    // }
}