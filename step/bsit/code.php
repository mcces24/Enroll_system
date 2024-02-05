<?php
session_start();
require '../../database/dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Not Qualified, Data Erased!";
        $_SESSION['message_icon'] = "success";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applicant is Qualified!";
        $_SESSION['message_icon'] = "error";
        header("Location: index.php");
        exit(0);
    }
}



if(isset($_POST['sections']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $exam_remarks = mysqli_real_escape_string($conn, $_POST['exam_remarks']);
    $findings = mysqli_real_escape_string($conn, $_POST['findings']);
    $status_type = mysqli_real_escape_string($conn, $_POST['status_type']);
   
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
    

    $query1 = "UPDATE que SET status='1' WHERE id='$student_id' ";
    $query_run1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE documents SET exam_remarks='$exam_remarks', findings='$findings' WHERE applicant_id='$applicant_id' ";
    $query_run2 = mysqli_query($conn, $query2);


    $query = "UPDATE students SET status_type='$status_type', course_id='$course_id', year_id='$year_id' WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applicant Accepted, Endores Success";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Endores Unsuccess";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}

if(isset($_POST['endorse']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);
    $wish_course = mysqli_real_escape_string($conn, $_POST['wish_course']);
    
    


    $query = "UPDATE admission_list SET wish_course='$wish_course' WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applicant Endorse Successfull";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Endorse Failed";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}


?>
