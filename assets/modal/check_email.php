<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../../database/conn.php"; // Adjust the path as needed

    // Initialize response array
    $response = ['emailExists' => false];

    // Check if the database connection was successful
    if ($conn->connect_error) {
        header('HTTP/1.1 500 Internal Server Error');
        $response['error'] = 'Database connection failed';
        echo json_encode($response);
        exit();
    }

    // Get JSON input
    $requestData = json_decode(file_get_contents('php://input'), true);
    $email = isset($requestData['email']) ? $requestData['email'] : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        header('HTTP/1.1 400 Bad Request');
        $response['error'] = 'Invalid email format';
        echo json_encode($response);
        exit();
    }

    try {
        // Prepare SQL query
        $query = "SELECT COUNT(*) AS count FROM new_user WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if email exists
        if ($result) {
            $row = $result->fetch_assoc();
            $emailExists = ($row['count'] > 0);
            $response['emailExists'] = $emailExists;
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            $response['error'] = 'Database query failed';
        }
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        $response['error'] = 'An error occurred: ' . $e->getMessage();
    } finally {
        // Close statement and connection
        if (isset($stmt) && $stmt) {
            $stmt->close();
        }
        if (isset($conn) && $conn) {
            $conn->close();
        }
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
