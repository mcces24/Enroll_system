<?php
class Enroll {
    private $conn;
    private $table = 'enroll';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read users from the database
    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readActiveEnroll() {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE status = 1';
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                return $stmt;
            } else {
                throw new Exception("Failed to execute query: " . $stmt->errorInfo()[2]);
            }
        } catch (PDOException $e) {
            // Handle PDOException (database connection issues, etc.)
            echo "PDOException in readActiveEnroll(): " . $e->getMessage();
            return false; // or handle the error in another way
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception in readActiveEnroll(): " . $e->getMessage();
            return false; // or handle the error in another way
        }
    }

    // Method to create a new user
    // public function create() {
    //     $query = 'INSERT INTO ' . $this->table . ' SET name = :name, email = :email';
    //     $stmt = $this->conn->prepare($query);

    //     // Sanitize input
    //     $this->name = htmlspecialchars(strip_tags($this->name));
    //     $this->email = htmlspecialchars(strip_tags($this->email));

    //     // Bind data
    //     $stmt->bindParam(':name', $this->name);
    //     $stmt->bindParam(':email', $this->email);

    //     if($stmt->execute()) {
    //         return true;
    //     }

    //     return false;
    // }
}
