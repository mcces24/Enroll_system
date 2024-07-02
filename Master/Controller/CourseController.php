<?php
class CourseController extends Course {
    public function getCourse() {
        try {
            $course = $this->read();
            if ($course === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $courses = [];
            while ($row = $course->fetch(PDO::FETCH_ASSOC)) {
                $courses[] = [
                    'course_id' => $row['course_id'],
                    'course_name' => $row['course_name'],
                    'course_code' => $row['course_code']
                ];
            }
    
            return $courses;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getActiveAcademicYear(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getActiveAcademicYear(): " . $e->getMessage();
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