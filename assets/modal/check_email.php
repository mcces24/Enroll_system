<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../../database/conn.php"; // Adjust the path as needed
    
    // Check if the database connection was successful
    if ($conn->connect_error) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['emailExists' => false]);
        exit();
    }

    // Get JSON input
    $requestData = json_decode(file_get_contents('php://input'), true);
    $email = isset($requestData['email']) ? $requestData['email'] : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Invalid email format']);
        exit();
    }

    // Prepare SQL query
    $query = "SELECT COUNT(*) AS count FROM student_acc WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if email exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emailExists = ($row['count'] > 0);
        echo json_encode(['emailExists' => $emailExists]);
    } else {
        echo json_encode(['emailExists' => false]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
