<?php

// Your database connection and configuration
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mcc_es";
include_once "../../../database/conn.php";

$conn = new mysqli($servername, $username, $password, $dbname);


$data = json_decode(file_get_contents("php://input"), true);

$jsonRecord = json_encode($data);

$var = $data['applicant_id'];

$done = "Form Done";

$updateSql = "UPDATE students SET status_type = ? WHERE applicant_id = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("ss", $done, $var);
$updateResult = $updateStmt->execute();

if ($updateResult) {
    echo "Data updated successfully";
} else {
    echo "Error updating data: " . $updateStmt->error;
}

$updateStmt->close();


?>
