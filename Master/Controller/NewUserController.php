<?php
class NewUserController extends NewUser {
    
    public function getLoginUserId() {
        if (isset($_COOKIE['COOKIE_STUDENTS']) && !empty($_COOKIE['COOKIE_STUDENTS'])) {
            $userAuth = $_COOKIE['COOKIE_STUDENTS'];
            $userId = $userAuth['Id'];
        } else {
            $userId = 0;
        }
        return $userId;
    }

    public function isStudentLogin() {
        if (isset($_COOKIE['COOKIE_STUDENTS']) && !empty($_COOKIE['COOKIE_STUDENTS'])) {
            return true;
        } else {
            return false;
        }
    }

    public function verifiedData($verify) {
        // $getVerifiedData = $this->getVerifiedData($verify);
        // return $getVerifiedData;
        $responseData = [];
        try {
            // Get data by email
            $stmt = $this->getVerifiedData($verify);
    
            // Check if there are any rows returned
            if ($stmt->rowCount() > 0) {
                $responseData['status'] = 'success';
                $responseData['message'] = 'Account verification has been successfully completed.';
                $responseData['type'] = 'success';
            } else {
                $responseData['status'] = 'failed';
                $responseData['message'] = 'Verification expired. Account has not been verified.';
                $responseData['type'] = 'warning';
            }
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in ifEmailExists(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in verifiedData(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }

        return $responseData;
    }

    public function login($username, $password) {
        $responseData = [];
        try {
            // Get data by email
            $stmt = $this->getLoginUser($username, $password);
    
            // Check if there are any rows returned
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    if ($row['verified_status'] != '1') {
                        $responseData['status'] = 'failed';
                        $responseData['message'] = 'Account is not yet verified, Please check your email to verify your account.';
                        $responseData['type'] = 'info';
                    } else {
                        setcookie('USER_LOGIN_AUTH', $row, time() + (86400 * 30), '/');
                        // $_SESSION['SESSION_STUDENTS'] = $username;
                        // $_SESSION['USER_ID'] = $row['Id'];
                        $responseData['isRegistered'] = isset($_COOKIE['isRegistered']) ? $_COOKIE['isRegistered'] : false;
                        $responseData['status'] = 'success';
                        $responseData['message'] = 'Login successfully.';
                        $responseData['type'] = 'success';
                        setcookie('isRegistered', false, time() - 3600, '/');
                    }
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'ID Number Is Not Yet Enroll In This Semester.';
                    $responseData['type'] = 'info';
                }
            } else {
                $responseData['status'] = 'failed';
                $responseData['message'] = 'ID Number/Email Account Not Found OR Invalid.';
                $responseData['type'] = 'danger';
            }
        } catch (PDOException $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in ifEmailExists(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in getLoginUser(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }

        return $responseData;
    }

    public function ifEmailExists($email) {
        try {
            // Get data by email
            $stmt = $this->getUserByEmail($email);
    
            // Check if there are any rows returned
            if ($stmt->rowCount() > 0) {
                $response = ['emailExists' => true];
                return $response; // Email exists
            } else {
                $response = ['emailExists' => false];
                return $response; // Email does not exist
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in ifEmailExists(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in ifEmailExists(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

    public function addNewUser($params = array()) {
        try {
            $stmt = $this->createNewUser($params);
    
            if ($stmt) {
                $response = ['isSave' => true];
                setcookie('isRegistered', true, time() + (86400 * 30), '/');
                return $response; 
            } else {
                $response = ['isSave' => false];
                return $response;
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in ifEmailExists(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in ifEmailExists(): " . $e->getMessage();
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