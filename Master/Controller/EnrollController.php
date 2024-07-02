<?php
class EnrollController extends Enroll {
    public function getActiveEnroll() {
        try {
            $activeEnroll = $this->readActiveEnroll();
            if ($activeEnroll === false) {
                throw new Exception("Failed to fetch active enrollments");
            }
    
            $enroll = [];
            while ($row = $activeEnroll->fetch(PDO::FETCH_ASSOC)) {
                // Validate enroll_name
                if (isset($row['enroll_name']) && !empty($row['enroll_name'])) {
                    $enroll[] = [
                        'enroll_name' => $row['enroll_name'],
                    ];
                }
                // You can add more validation rules for other fields if needed
            }
    
            return $enroll;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getActiveEnroll(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getActiveEnroll(): " . $e->getMessage();
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