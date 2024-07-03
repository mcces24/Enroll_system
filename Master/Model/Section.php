<?php
class Section {
    private $conn;
    private $table = 'sections';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read course from the database
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

}
