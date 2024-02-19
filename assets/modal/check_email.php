<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Replace these credentials with your database connection details
   include_once "../../database/conn.php";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        $requestData = json_decode(file_get_contents('php://input'), true);
        $email = $requestData['email'];

        // Prepare and execute a SQL query to check if the email exists
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM new_user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the result as JSON
        header('Content-Type: application/json');

        if ($result['count'] > 0) {
            echo json_encode(['emailExists' => true]);
        } else {
            echo json_encode(['emailExists' => false]);
        }

}
?>
