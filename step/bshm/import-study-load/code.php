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
        header("Location: /");
        exit(0);
    } else {
        $_SESSION['message'] = "Applicant is Qualified!";
        $_SESSION['message_icon'] = "error";
        header("Location: ./");
        exit(0);
    }
}



if (isset($_POST['sections'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $semester_id = mysqli_real_escape_string($conn, $_POST['semester_id']);
    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $section_id = mysqli_real_escape_string($conn, $_POST['section_id']);
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $status_type = mysqli_real_escape_string($conn, $_POST['status_type']);


    $query = "UPDATE students SET semester_id='$semester_id', year_id='$year_id', course_id='$course_id', section_id='$section_id',id_number='$id_number', status_type='$status_type' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Course, Year & Section set Successfully";
        $_SESSION['message_icon'] = "success";
        header("Location: ./");
        exit(0);
    } else {
        $_SESSION['message'] = "Error! Not Set";
        $_SESSION['message_icon'] = "success";
        header("Location: ./");
        exit(0);
    }
}

if (isset($_POST['update'])) {
    $applicant_id1 = mysqli_real_escape_string($conn, $_POST['applicant_id1']);

    $exam_remarks = mysqli_real_escape_string($conn, $_POST['exam_remarks']);
    $findings = mysqli_real_escape_string($conn, $_POST['findings']);



    $query = "UPDATE students SET findings='$findings', exam_remarks='$exam_remarks' WHERE applicant_id='$applicant_id1' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Update Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    } else {
        $_SESSION['message'] = "Update Unsuccessful";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}
