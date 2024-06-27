<?php
session_start();
require '../../../database/dbcon.php';


if (isset($_POST['add_exam1'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $email_user = mysqli_real_escape_string($conn, $_POST['email_user']);
    $email_pass = mysqli_real_escape_string($conn, $_POST['email_pass']);
    $email_name = mysqli_real_escape_string($conn, $_POST['email_name']);




    $query = "UPDATE system SET email_user='$email_user', email_pass='$email_pass',email_name='$email_name' WHERE system_id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Updated Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Error Updating";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
