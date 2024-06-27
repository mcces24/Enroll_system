<?php
session_start();
include_once('../../../database/connection.php');

if (isset($_POST['admission_sched'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        //use prepared statement to prevent sql injection
        $stmt = $db->prepare("INSERT INTO admission_sched (sched_date, status) VALUES (:sched_date, :status)");
        //if-else statement in executing our prepared statement
        $_SESSION['message'] = ($stmt->execute(array(':sched_date' => $_POST['sched_date'],  ':status' => $_POST['status']))) ? 'New Admission Date Added Added' : 'Something went wrong. Cannot add member';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //close connection
    $database->close();
} elseif (isset($_POST['sched_time_id'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        //use prepared statement to prevent sql injection
        $stmt = $db->prepare("INSERT INTO admission_time (sched_time_start, sched_time_stop, status) VALUES (:sched_time_start, :sched_time_stop, :status)");
        //if-else statement in executing our prepared statement
        $_SESSION['message'] = ($stmt->execute(array(':sched_time_start' => $_POST['sched_time_start'], ':sched_time_stop' => $_POST['sched_time_stop'],  ':status' => $_POST['status']))) ? 'New Admission Time Added' : 'Something went wrong. Cannot add member';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Fill up add form first';
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
