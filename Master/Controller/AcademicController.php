<?php
class AcademicController extends Academic {
    public function getActiveAcademicYear() {
        try {
            $activeAcademicYear = $this->readActiveAcademic();
            if ($activeAcademicYear === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $academicYear = [];
            while ($row = $activeAcademicYear->fetch(PDO::FETCH_ASSOC)) {
                $academicYear[] = [
                    'status' => $row['status'],
                    'academic_start' => $row['academic_start'],
                    'academic_end' => $row['academic_end']
                ];
            }
    
            return $academicYear;
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