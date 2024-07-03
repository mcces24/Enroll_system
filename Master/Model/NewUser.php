<?php
class NewUser {
    private $conn;
    private $table = 'new_user';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read users from the database
    public function read($params = array()) {
        $conditions = '';
        
        if (!empty($params['JOIN'])) {
            $conditions .= ' ' . $params['JOIN'];
        }
        if (!empty($params['WHERE'])) {
            $conditions .= ' WHERE ' . $params['WHERE'];
        }
        if (!empty($params['ORDER'])) {
            $conditions .= ' ORDER ' . $params['ORDER'];
        }
        if (!empty($params['LIMIT'])) {
            $conditions .= ' LIMIT ' . $params['LIMIT'];
        }
        if (!empty($params['FIELDS'])) {
            $field  = $params['FIELDS'];
        } else {
            $field = '*';
        }

        $query = 'SELECT ' . $field  . '  FROM ' . $this->table . $conditions;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getLoginUser($username, $password) {
        try {
            // Hash the password (you should use a secure hashing method)
            $hashPassword = md5($password);
    
            $query = 'SELECT * FROM ' . $this->table . ' n 
                      LEFT JOIN students s ON n.Id = s.new_user_id 
                      WHERE (n.email = :username AND n.password = :password) 
                      OR (s.id_number = :username AND n.password = :password)';
            
            $stmt = $this->conn->prepare($query);
            
            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashPassword);
    
            if ($stmt->execute()) {
                return $stmt;
            } else {
                $errorInfo = $stmt->errorInfo();
                throw new Exception("Failed to execute query: " . $errorInfo[2]);
            }
        } catch (PDOException $e) {
            echo "PDOException in getLoginUser(): " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Exception in getLoginUser(): " . $e->getMessage();
            return false;
        }
    }

    public function getVerifiedData($verify) {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE verified_status = :verify';
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':verify', $verify);
    
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $query = 'UPDATE ' . $this->table . ' SET verified_status = 1 WHERE verified_status = :ver';
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindParam(':ver', $verify);
                    if ($stmt->execute()) {
                        return $stmt;
                    } else {
                        throw new Exception("Failed to execute query: " . $stmt->errorInfo()[2]);
                    }
                } else {
                    return $stmt;
                }
            } else {
                $errorInfo = $stmt->errorInfo();
                throw new Exception("Failed to execute query: " . $errorInfo[2]);
            }
        } catch (PDOException $e) {
            echo "PDOException in getLoginUser(): " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Exception in getLoginUser(): " . $e->getMessage();
            return false;
        }
    }

    public function getUserByEmail($email) {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            if ($stmt->execute()) {
                return $stmt;
            } else {
                throw new Exception("Failed to execute query: " . $stmt->errorInfo()[2]);
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in readActiveSemester(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in readActiveSemester(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

    // Method to create a new user
    public function createNewUser($params = array()) {
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, password = :password, verified_status = :verified_status';
        $stmt = $this->conn->prepare($query);

        //Sanitize input
        $email = htmlspecialchars(strip_tags($params['email']));
        $password = htmlspecialchars(strip_tags($params['password']));
        $verified_status = htmlspecialchars(strip_tags($params['verified_status']));
        $passwordHash = md5($password);

        // Bind data
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':verified_status', $verified_status);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
