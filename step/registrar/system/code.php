<?php
session_start();
require '../../../database/dbcon.php';

// Function to update status for a table
function updateStatus($conn, $table, $idField, $statusField, $id, $status) {
    $update = "UPDATE $table SET $statusField = ? WHERE $idField = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("ii", $status, $id);
    $query_run = $stmt->execute();
    
    if ($query_run) {
        $reset = "UPDATE $table SET $statusField = '0' WHERE $idField != ?";
        $stmt = $conn->prepare($reset);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    return $query_run;
}

// Function to handle updating rates
function updateRate($conn, $field, $value, $id) {
    $query = "UPDATE rate SET $field = ? WHERE Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $value, $id);
    $query_run = $stmt->execute();
    
    if ($query_run) {
        $_SESSION['message'] = ucfirst(str_replace('_', ' ', $field)) . " changes successfully";
        $_SESSION['message_icon'] = "success";
    } else {
        $_SESSION['message'] = "Error changing " . str_replace('_', ' ', $field);
        $_SESSION['message_icon'] = "error";
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(0);
}

// Update academic status
if (isset($_GET['id']) && isset($_GET['status'])) {
    $academic_id = $_GET['id'];
    $status = $_GET['status'];
    updateStatus($conn, 'academic', 'academic_id', 'status', $academic_id, $status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(0);
}

// Update semester status
if (isset($_GET['sem_id']) && isset($_GET['sem_status'])) {
    $sem_id = $_GET['sem_id'];
    $sem_status = $_GET['sem_status'];
    updateStatus($conn, 'semester', 'semester_id', 'sem_status', $sem_id, $sem_status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(0);
}

// Update enroll status
if (isset($_GET['enroll_id']) && isset($_GET['status'])) {
    $enroll_id = $_GET['enroll_id'];
    $status = $_GET['status'];
    updateStatus($conn, 'enroll', 'enroll_id', 'status', $enroll_id, $status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(0);
}

// Update unit rate
if (isset($_POST['rate'])) {
    $Id = mysqli_real_escape_string($conn, $_POST['Id']);
    $units_rate = mysqli_real_escape_string($conn, $_POST['units_rate']);
    updateRate($conn, 'units_rate', $units_rate, $Id);
}

// Update lab rate
if (isset($_POST['lab_rate'])) {
    $Id = mysqli_real_escape_string($conn, $_POST['Id']);
    $lab_rate = mysqli_real_escape_string($conn, $_POST['lab_rate1']);
    updateRate($conn, 'lab_rate', $lab_rate, $Id);
}
?>
