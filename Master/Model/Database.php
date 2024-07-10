<?php
require_once BASE_PATH . '/env.php';
class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASSWORD;
    private $conn;

    // Method to connect to the database
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "<script>alert('Connection Error: " . $e->getMessage() . "')</script>";
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
