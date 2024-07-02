<?php
class SemesterController extends Semester {
    public function getActiveSemester() {
        try {
            $activeSemester = $this->readActiveSemester();
            if ($activeSemester === false) {
                throw new Exception("Failed to fetch active semester");
            }
    
            $semester = [];
            while ($row = $activeSemester->fetch(PDO::FETCH_ASSOC)) {
                // Validate sem_status and semester_name
                if (isset($row['sem_status']) && isset($row['semester_name']) &&
                    !empty($row['sem_status']) && !empty($row['semester_name'])) {
                    
                    $semester[] = [
                        'sem_status' => $row['sem_status'],
                        'semester_name' => $row['semester_name'],
                    ];
                }
                // You can add more validation rules for other fields if needed
            }
    
            return $semester;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getActiveSemester(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getActiveSemester(): " . $e->getMessage();
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