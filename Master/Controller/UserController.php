<?php
class UserController extends User {

    public function getUser($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['username']) && isset($params['password'])) {
                    $username = $params['username'];
                    $password = $params['password'];
                    $condition = [
                        'WHERE' => "username = '$username' AND password = '$password'"
                    ];
                } else if (isset($params['id'])) {
                    $id = $params['id'];
                    $condition = [
                        'WHERE' => "id = '$id'"
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            
            $user = $this->read($condition);
            if ($user === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $responeUser = [];
            while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                $responeUser[] = $row;
            }
    
            return $responeUser;
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


}