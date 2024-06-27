<?php
session_start();
require '../../../database/dbcon.php';

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Not Qualified, Data Erased!";
        $_SESSION['message_icon'] = "success";
        header("Location: ./");
        exit(0);
    } else {
        $_SESSION['message'] = "Applicant is Qualified!";
        $_SESSION['message_icon'] = "error";
        header("Location: ./");
        exit(0);
    }
}



if (isset($_POST['sections'])) {
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);


    $query = "UPDATE students SET status_type='Shift Accept', course_id='$course_id', year_id='$year_id' WHERE id_number='$id_number' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Students Accepted Successfull";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    } else {
        $_SESSION['message'] = "Students Not Accepted";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}

if (isset($_POST['endorse'])) {
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number1']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);




    $query = "UPDATE shift_students SET course_id='$course_id' WHERE id_number='$id_number' ";
    $query_run = mysqli_query($conn, $query);

    $query1 = "UPDATE students SET course_id='$course_id', status_type='Shift Clear' WHERE id_number='$id_number' ";
    $query_run1 = mysqli_query($conn, $query1);

    if ($query_run) {
        $_SESSION['message'] = "Students Cleared Success";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    } else {
        $_SESSION['message'] = "Students Not Cleared";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}
