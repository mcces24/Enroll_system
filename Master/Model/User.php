<?php
class User {
    private $conn;
    private $table = 'users';

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read course from the database
   public function read($params = array()) {
        // Initialize the conditions string and fields
        $conditions = '';
        $field = !empty($params['FIELDS']) ? $params['FIELDS'] : '*';
        
        // Add JOIN clause if present
        if (!empty($params['JOIN'])) {
            $conditions .= ' ' . $params['JOIN'];
        }
    
        // Add WHERE clause if present
        if (!empty($params['WHERE'])) {
            $conditions .= ' WHERE ' . $params['WHERE'];
        }
    
        // Add ORDER BY clause if present
        if (!empty($params['ORDER'])) {
            $conditions .= ' ORDER BY ' . $params['ORDER'];
        }
    
        // Add LIMIT clause if present
        if (!empty($params['LIMIT'])) {
            $conditions .= ' LIMIT ' . $params['LIMIT'];
        }
    
        // Build the query string
        $query = 'SELECT ' . $field . ' FROM ' . $this->table . $conditions;
    
        try {
            // Prepare the query
            $stmt = $this->conn->prepare($query);
    
            // Bind parameters (if any exist in the WHERE clause)
            if (!empty($params['bindings'])) {
                foreach ($params['bindings'] as $key => $value) {
                    $stmt->bindValue($key, $value);
                }
            }
    
            // Execute the query
            $stmt->execute();
    
            // Return the statement for further processing (fetching rows, etc.)
            return $stmt;
    
        } catch (PDOException $e) {
            // Handle the error (could be logging or rethrowing the exception)
            echo "Error executing query: " . $e->getMessage();
            return false;
        }
    }


    public function update($params = array()){
        $conditions = '';
        $set = '';
        
        if (!empty($params['SET'])) {
            $set .= ' SET ' . $params['SET'];
        }
        if (!empty($params['WHERE'])) {
            $conditions .= ' WHERE ' . $params['WHERE'];
        }

        $query = 'UPDATE ' . $this->table . $set . $conditions;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
