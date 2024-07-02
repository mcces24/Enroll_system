<?php
class YearLevel  {
    private $conn;
    private $table = 'year_lvl';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read course from the database
    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readYearLevelByCourseId($courseId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE course_id = ' . $courseId; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
