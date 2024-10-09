<?php

define('ATTEMPT_PATH', dirname(__DIR__) . '/POST/LoginAttempt.php');
if (file_exists(ATTEMPT_PATH)) {
    include_once ATTEMPT_PATH;
} else {
    die('Error: Some files are missing.');
}

class NewUserController extends NewUser {

    function getNewUserData($params = array()) {
        try {
            if (!empty($params)) {
                if (isset($params['userId'])) {
                    $userId = $params['userId'];
                    $condition = [
                        'WHERE' => "Id = $userId"
                    ];
                } else {
                    $condition = [];
                }
            } else {
                $condition = [];
            }
            $qrCode = $this->read($condition);
            if ($qrCode === false) {
                throw new Exception("Failed to fetch active academic year");
            }
    
            $qrCodeList = [];
            while ($row = $qrCode->fetch(PDO::FETCH_ASSOC)) {
                $qrCodeList[] = $row;
            }
    
            return $qrCodeList;
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in getQrcodeData(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in getQrcodeData(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }
    
    public function getLoginUserId() {
        if (isset($_COOKIE['USER_LOGIN_AUTH']) && !empty($_COOKIE['USER_LOGIN_AUTH'])) {
            $userId = $_COOKIE['USER_LOGIN_AUTH'];
        } else {
            $userId = 0;
        }
        return $userId;
    }

    public function getLoginEmail() {
        $userId = $this->getLoginUserId();
        $params = [
            "userId" => $userId,
        ];
        $newUser = $this->getNewUserData($params);
        if (!empty($newUser)) {
            $email = $newUser[0]['email'];
        } else {
            $email = null;
        }
        return $email;
    }

    public function isStudentLogin() {
        if (isset($_COOKIE['USER_LOGIN_AUTH']) && !empty($_COOKIE['USER_LOGIN_AUTH'])) {
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
        $conn = mysqli_connect("localhost", "u510162695_mcces", "MccAdmin1", "u510162695_mcc_es");
        try {

            // Get user location
            $locationResponse = getUserLocation();

            if (!$locationResponse['success']) {
                $responseData['status'] = 'failed';
                $responseData['message'] = $locationResponse['message'];
                $responseData['type'] = 'error'; 
                return $responseData;
            } else {
                $lat = $locationResponse['data']['lat'];
                $lon = $locationResponse['data']['lon'];
                $location = $locationResponse['data']['location'];
        
                // Get complete address
                $addressResponse = getCompleteAddress($lat, $lon);
                if (!$addressResponse['success']) {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = $addressResponse['message'];
                    $responseData['type'] = 'error'; 
                    return $responseData;
                } else {
                    $completeAddress = $addressResponse['address'];
                }
            }
            // Get data by email
            $stmt = $this->getLoginUser($username, $password);
    
            // Check if there are any rows returned
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    if ($row['verified_status'] != '1') {
                        logLoginAttempt($conn, $username, 'student', 'failed', $location, $completeAddress, $lat, $lon);
                        $responseData['status'] = 'failed';
                        $responseData['message'] = 'Account is not yet verified, Please check your email to verify your account.';
                        $responseData['type'] = 'info';
                    } else {
                        logLoginAttempt($conn, $username, 'student', 'success', $location, $completeAddress, $lat, $lon);
                        setcookie('USER_LOGIN_AUTH', $row['Id'], time() + (86400 * 30), '/');
                        // $_SESSION['SESSION_STUDENTS'] = $username;
                        // $_SESSION['USER_ID'] = $row['Id'];
                        $responseData['isRegistered'] = isset($_COOKIE['isRegistered']) ? $_COOKIE['isRegistered'] : false;
                        $responseData['status'] = 'success';
                        $responseData['message'] = 'Login successfully.';
                        $responseData['type'] = 'success';
                        setcookie('isRegistered', false, time() - 3600, '/');
                    }
                } else {
                    logLoginAttempt($conn, $username, 'student', 'failed', $location, $completeAddress, $lat, $lon);
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'ID Number Is Not Yet Enroll In This Semester.';
                    $responseData['type'] = 'info';
                }
            } else {
                logLoginAttempt($conn, $username, 'student', 'failed', $location, $completeAddress, $lat, $lon);
                $responseData['status'] = 'failed';
                $responseData['message'] = 'ID Number/Email Account Not Found OR Invalid.';
                $responseData['type'] = 'danger';
            }
        } catch (PDOException $e) {
            logLoginAttempt($conn, $username, 'student', 'failed', $location, $completeAddress, $lat, $lon);
            $responseData['status'] = 'failed';
            $responseData['message'] = "PDOException in ifEmailExists(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        } catch (Exception $e) {
            logLoginAttempt($conn, $username, 'student', 'failed', $location, $completeAddress, $lat, $lon);
            $responseData['status'] = 'failed';
            $responseData['message'] = "Exception in getLoginUser(): " . $e->getMessage();
            $responseData['type'] = 'danger';
        }

        return $responseData;
    }

    public function forgetPassword($data) {
        $responseData = [];
        try {
            // Get data by email
            $username = isset($data['username']) ? $data['username'] : null;
            $otp_code = isset($data['otp_code']) ? $data['otp_code'] : null;
            $new_password = isset($data['new_password']) ? $data['new_password'] : null;
            $otp_code_verify = isset($data['otp_code_verify']) ? $data['otp_code_verify'] : null;
            $sendingOtp = isset($data['sendingOtp']) ? $data['sendingOtp'] : false;
            $email = isset($data['email']) ? $data['email'] : false;
            $verified_status = isset($data['verified_status']) ? $data['verified_status'] : false;
            $verify = isset($data['verify']) ? $data['verify'] : false;

            if (!empty($email) && !empty($verified_status)) {
                $params = [
                    "SET" => "verified_status = '$verified_status'",
                    "WHERE" => "email = '$email'",
                ];

                $update = $this->update($params);

                if ($update ) {
                    $responseData['status'] = 'success';
                    $responseData['message'] = 'OTP SENT';
                    $responseData['type'] = 'success';
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'OTP NOT SENT';
                    $responseData['type'] = 'error'; 
                }

                return $responseData;
            }

            if (!empty($username)) {
                $stmt = $this->forgetStudent($data);
                 // Check if there are any rows returned
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        if ($verify) {
                            $responseData['status'] = 'success';
                            $responseData['message'] = 'Verification link send to your email.';
                            $responseData['type'] = 'success';
                        } else {
                            $responseData['status'] = 'success';
                            $responseData['message'] = 'Sending OTP to your Email.';
                            $responseData['type'] = 'success';
                        }
                    }
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'Email not found. Please use registered email.';
                    $responseData['type'] = 'danger';
                }

                return $responseData;
            } 

            if (!empty($new_password) && !empty($otp_code_verify)) {
                $password = md5($new_password);
                $params = [
                    "SET" => "password = '$password', verified_status = '1'",
                    "WHERE" => "verified_status = '$otp_code_verify'",
                ];

                $update = $this->update($params);

                if ($update ) {
                    $responseData['status'] = 'success';
                    $responseData['message'] = 'Password has been changed. Please Login.';
                    $responseData['type'] = 'success';
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'Error changing password.';
                    $responseData['type'] = 'error'; 
                }

                return $responseData;
            } 

            if (!empty($otp_code)) {
                $stmt = $this->forgetStudent($data);
                 // Check if there are any rows returned
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        $responseData['status'] = 'success';
                        $responseData['message'] = 'OTP Verify';
                        $responseData['type'] = 'success';
                    }
                } else {
                    $responseData['status'] = 'failed';
                    $responseData['message'] = 'Invalid OTP';
                    $responseData['type'] = 'danger';
                }

                return $responseData;
            } 

            if ($sendingOtp) {
                $responseData['status'] = 'success';
                $responseData['message'] = 'OTP SENT';
                $responseData['type'] = 'success';

                return $responseData;
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
