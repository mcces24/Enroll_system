<?php
session_start();
require '../../../database/config.php';


if (isset($_POST['add_exam'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $raw_score = mysqli_real_escape_string($conn, $_POST['raw_score']);
    $stanine = mysqli_real_escape_string($conn, $_POST['stanine']);
    $percentile = mysqli_real_escape_string($conn, $_POST['percentile']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status_type = mysqli_real_escape_string($conn, $_POST['status_type']);


    $query = "UPDATE students SET raw_score='$raw_score', stanine='$stanine',percentile='$percentile',category='$category', status_type='$status_type' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Exam Results Added  Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Exam Results Error";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['add_exam1'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $raw_score = mysqli_real_escape_string($conn, $_POST['raw_score']);
    $stanine = mysqli_real_escape_string($conn, $_POST['stanine']);
    $percentile = mysqli_real_escape_string($conn, $_POST['percentile']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);



    $query = "UPDATE students SET raw_score='$raw_score', stanine='$stanine',percentile='$percentile',category='$category' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Exam Results Updated Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Exam Results Error";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
