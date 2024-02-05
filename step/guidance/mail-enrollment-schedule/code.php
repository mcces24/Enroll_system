<?php
session_start();
require '../../../database/dbcon.php';


if(isset($_POST['add_exam1']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $email_enroll = mysqli_real_escape_string($conn, $_POST['email_enroll']);
    $email_enroll_sub = mysqli_real_escape_string($conn, $_POST['email_enroll_sub']);
    
    

    $query = "UPDATE system SET email_enroll='$email_enroll', email_enroll_sub='$email_enroll_sub' WHERE system_id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        $_SESSION['message'] = "Error Updating";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

}

?>