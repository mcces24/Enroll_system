<?php
session_start();
require '../../../database/dbcon.php';


    $academic_id = $_GET['id'];
    $status = $_GET['status'];
    $update = "UPDATE academic SET status=$status WHERE academic_id=$academic_id";
    $query_run = mysqli_query($conn, $update);

    if($query_run)
    {   
        $update1 = "UPDATE academic SET status='0' WHERE academic_id!=$academic_id";
        $query_run1 = mysqli_query($conn, $update1);
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

    $sem_id = $_GET['sem_id'];
    $sem_status = $_GET['sem_status'];
    $update1 = "UPDATE semester SET sem_status=$sem_status WHERE semester_id=$sem_id";
    $query_run1 = mysqli_query($conn, $update1);

    if($query_run1)
    {
        $update11 = "UPDATE semester SET sem_status='0' WHERE semester_id!=$sem_id";
        $query_run11 = mysqli_query($conn, $update11);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

    $enroll_id = $_GET['enroll_id'];
    $status = $_GET['status'];
    $update0 = "UPDATE enroll SET status=$status WHERE enroll_id=$enroll_id";
    $query_run0 = mysqli_query($conn, $update0);

    if($query_run0)
    {
        $update11 = "UPDATE enroll SET status='0' WHERE enroll_id!=$enroll_id";
        $query_run11 = mysqli_query($conn, $update11);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

    if(isset($_POST['rate']))
{
    $Id = mysqli_real_escape_string($conn, $_POST['Id']);

    $units_rate = mysqli_real_escape_string($conn, $_POST['units_rate']);
    
    
    
    

    $query = "UPDATE rate SET units_rate='$units_rate' WHERE Id='$Id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Unit rate changes successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error changing unit rates";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}

if(isset($_POST['lab_rate']))
{
    $Id = mysqli_real_escape_string($conn, $_POST['Id']);

    $lab_rate = mysqli_real_escape_string($conn, $_POST['lab_rate1']);
    
    
    
    

    $query = "UPDATE rate SET lab_rate='$lab_rate' WHERE Id='$Id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Lab rate changes successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error changing lab rates";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}

?>