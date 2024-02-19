<?php
// Establish a database connection (assuming you have already done this)

// Retrieve the email from the request body
$requestData = json_decode(file_get_contents('php://input'), true);
$email = $requestData['email'];

// Prepare and execute a SQL query to check if the email exists
$stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the result as JSON
header('Content-Type: application/json');

if ($result['count'] > 0) {
    echo json_encode(['emailExists' => true]);
} else {
    echo json_encode(['emailExists' => false]);
}
?>