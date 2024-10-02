<?php
class UserController extends User {

    public function getUser($params = array()) {
        try {
            if (!empty($params)) {
                // Initialize empty condition array
                $condition = [];
            
                // If username and password are provided
                if (isset($params['username']) && isset($params['password'])) {
                    $username = $params['username'];
                    $password = $params['password'];
            
                    // Retrieve user by username (do not include password in condition yet)
                    $condition = [
                        'WHERE' => "username = :username",
                        'bindings' => [':username' => $username]
                    ];
            
                } elseif (isset($params['id'])) {
                    // If only ID is provided
                    $id = $params['id'];
                    $condition = [
                        'WHERE' => "id = :id",
                        'bindings' => [':id' => $id]
                    ];
                }
            
            } else {
                // No conditions provided, so return an empty condition
                $condition = [];
            }
            
            $user = $this->read($condition);
            if ($user === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            // $responeUser = [];
            // while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            //     $responeUser[] = $row;
            // }

            $user = $user->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Assuming the plain text password is available in $params['password']
                $plainTextPassword = $params['password'];
            
                // Verify the password using password_verify
                if (password_verify($plainTextPassword, $user['password'])) {
                    // Password matches, login successful
                    echo "Login successful!";
                    // Here, you can proceed with setting session data or other post-login actions
                } else {
                    // Password does not match
                    echo "Invalid password.";
                }
            } else {
                // No user found
                echo "Invalid username.";
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
