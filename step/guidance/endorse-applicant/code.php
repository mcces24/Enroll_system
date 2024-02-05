<?php
session_start();
require '../../../database/config.php';


if(isset($_POST['add_exam']))
{
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);
    $status_type = mysqli_real_escape_string($conn, $_POST['status_type']);
    
    $comp = mysqli_real_escape_string($conn, $_POST['comp']);
    $com_cate = mysqli_real_escape_string($conn, $_POST['com_cate']);
    $reas = mysqli_real_escape_string($conn, $_POST['reas']);
    $reas_cat = mysqli_real_escape_string($conn, $_POST['reas_cat']);
    $verbal = mysqli_real_escape_string($conn, $_POST['verbal']);
    $verbal_stanine = mysqli_real_escape_string($conn, $_POST['verbal_stanine']);
    $verbal_percen = mysqli_real_escape_string($conn, $_POST['verbal_percen']);
    $verbal_cat = mysqli_real_escape_string($conn, $_POST['verbal_cat']);
    $quan = mysqli_real_escape_string($conn, $_POST['quan']);
    $quan_cat = mysqli_real_escape_string($conn, $_POST['quan_cat']);
    $figu = mysqli_real_escape_string($conn, $_POST['figu']);
    $figu_cat = mysqli_real_escape_string($conn, $_POST['figu_cat']);
    $nonver = mysqli_real_escape_string($conn, $_POST['nonver']);
    $nonver_stanine = mysqli_real_escape_string($conn, $_POST['nonver_stanine']);
    $nonver_percen = mysqli_real_escape_string($conn, $_POST['nonver_percen']);
    $nonver_cat = mysqli_real_escape_string($conn, $_POST['nonver_cat']);
    $total_raw = mysqli_real_escape_string($conn, $_POST['total_raw']);
    $total_stanine = mysqli_real_escape_string($conn, $_POST['total_stanine']);
    $total_percen = mysqli_real_escape_string($conn, $_POST['total_percen']);
    $total_cat = mysqli_real_escape_string($conn, $_POST['total_cat']);

    $query1 = "UPDATE students SET status_type='$status_type' WHERE applicant_id='$applicant_id' ";
    $query_run1 = mysqli_query($conn, $query1);

    $query = "UPDATE admission_score SET comp='$comp', com_cate='$com_cate', reas='$reas', reas_cat='$reas_cat', verbal='$verbal', verbal_stanine='$verbal_stanine', verbal_percen='$verbal_percen', verbal_cat='$verbal_cat', quan='$quan', quan_cat='$quan_cat', figu='$figu', figu_cat='$figu_cat', nonver='$nonver', nonver_stanine='$nonver_stanine', nonver_percen='$nonver_percen', nonver_cat='$nonver_cat', total_raw='$total_raw' , total_stanine='$total_stanine' , total_percen='$total_percen', total_cat='$total_cat'  WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applican Endores. Score Change Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        $_SESSION['message'] = "Exam Results Error";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

}

if(isset($_POST['add_exam1']))
{

    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);


    $comp = mysqli_real_escape_string($conn, $_POST['comp']);
    $com_cate = mysqli_real_escape_string($conn, $_POST['com_cate']);
    $reas = mysqli_real_escape_string($conn, $_POST['reas']);
    $reas_cat = mysqli_real_escape_string($conn, $_POST['reas_cat']);
    $verbal = mysqli_real_escape_string($conn, $_POST['verbal']);
    $verbal_stanine = mysqli_real_escape_string($conn, $_POST['verbal_stanine']);
    $verbal_percen = mysqli_real_escape_string($conn, $_POST['verbal_percen']);
    $verbal_cat = mysqli_real_escape_string($conn, $_POST['verbal_cat']);
    $quan = mysqli_real_escape_string($conn, $_POST['quan']);
    $quan_cat = mysqli_real_escape_string($conn, $_POST['quan_cat']);
    $figu = mysqli_real_escape_string($conn, $_POST['figu']);
    $figu_cat = mysqli_real_escape_string($conn, $_POST['figu_cat']);
    $nonver = mysqli_real_escape_string($conn, $_POST['nonver']);
    $nonver_stanine = mysqli_real_escape_string($conn, $_POST['nonver_stanine']);
    $nonver_percen = mysqli_real_escape_string($conn, $_POST['nonver_percen']);
    $nonver_cat = mysqli_real_escape_string($conn, $_POST['nonver_cat']);
    $total_raw = mysqli_real_escape_string($conn, $_POST['total_raw']);
    $total_stanine = mysqli_real_escape_string($conn, $_POST['total_stanine']);
    $total_percen = mysqli_real_escape_string($conn, $_POST['total_percen']);
    $total_cat = mysqli_real_escape_string($conn, $_POST['total_cat']);
    
    

    $query = "UPDATE admission_score SET comp='$comp', com_cate='$com_cate', reas='$reas', reas_cat='$reas_cat', verbal='$verbal', verbal_stanine='$verbal_stanine', verbal_percen='$verbal_percen', verbal_cat='$verbal_cat', quan='$quan', quan_cat='$quan_cat', figu='$figu', figu_cat='$figu_cat', nonver='$nonver', nonver_stanine='$nonver_stanine', nonver_percen='$nonver_percen', nonver_cat='$nonver_cat', total_raw='$total_raw' , total_stanine='$total_stanine' , total_percen='$total_percen', total_cat='$total_cat'  WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);   

    if($query_run)
    {
        $_SESSION['message'] = "Exam Results Updated Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
    else
    {
        $_SESSION['message'] = "Exam Results Error";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }

}

?>