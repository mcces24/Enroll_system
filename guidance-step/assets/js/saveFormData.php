<?php

// Your database connection and configuration
include_once "../../../database/conn.php";

$conn = new mysqli($servername, $username, $password, $dbname);


$data = json_decode(file_get_contents("php://input"), true);

$jsonRecord = json_encode($data);

$var = $data['applicant_id'];


$checkSql = "SELECT * FROM guidance_record WHERE applicant_id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $var);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->fetch_assoc()) {
    // Data exists, update it
    $updateSql = "UPDATE guidance_record SET record = ? WHERE applicant_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ss", $jsonRecord, $var);
    $updateResult = $updateStmt->execute();

    if ($updateResult) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $updateStmt->error;
    }

    $updateStmt->close();
} else {
    // Data doesn't exist, insert a new record
    $insertSql = "INSERT INTO guidance_record (record, applicant_id) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ss", $jsonRecord, $var);
    $insertResult = $insertStmt->execute();

    if ($insertResult) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $insertStmt->error;
    }

    $insertStmt->close();
}

$checkStmt->close();


?>
