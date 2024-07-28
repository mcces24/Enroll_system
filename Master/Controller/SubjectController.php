<?php
class SubjectController extends Subject {

    public function getSubject($params = array()) {
        global $db;
        $academicController = New AcademicController($db);
        $academicYear = $academicController->getActiveAcademicYear();
        $start = !empty($academicYear[0]) && $academicYear[0]['academic_start'] ? $academicYear[0]['academic_start'] : null;
        $end = !empty($academicYear[0]) && $academicYear[0]['academic_end'] ? $academicYear[0]['academic_end'] : null;
        $academic = !empty($academicYear) ? "$start-$end" : null;
        
        try {
            if (!empty($params)) {
                if (isset($params['id_number'])) {
                    $semester_id = $params['semester_id'];
                    $course_id = $params['course_id'];
                    $year_id = $params['year_id'];
                    $section_id = $params['section_id'];
                    $academic = $params['academic'];
                    $id_number = $params['id_number'];
                    $condition = [
                        'FIELDS' => "*, subjects.subject_code as subjectCode",
                        'WHERE' => "subjects.semester_id = '$semester_id' AND subjects.course_id = '$course_id' AND subjects.year_id = '$year_id'",
                        'JOIN' => "LEFT JOIN subject_connects ON subjects.subject_code = subject_connects.subject_code AND subject_connects.academic_year = '$academic' INNER JOIN course c ON subjects.course_id = c.course_id INNER JOIN year_lvl y ON subjects.year_id = y.year_id"
                    ];

                    if ($params['type'] == "Irregular") {
                        $selectSubject = "SELECT * FROM selected_subject WHERE id_number = :id_number ORDER BY select_id LIMIT 1";
                        $stmt = $db->prepare($selectSubject);
                        $stmt->bindParam(':id_number', $id_number, PDO::PARAM_STR);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            while ($subjects = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $string = $subjects['subject_codes'];
                                $unescapedString = stripslashes($string);
                                $array = json_decode($unescapedString, true);
                    
                                $convertedString = '(' . implode(', ', array_map(function($item) {
                                    return '"' . $item . '"';
                                }, $array)) . ')';
                    
                                $condition['WHERE'] .= " AND subjects.subject_code IN $convertedString";
                            }
                        }
                    }                    
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