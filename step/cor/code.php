<?php  
require '../../database/dbcon.php';
if(isset($_POST['done'])){
	if(isset($_GET['id'])){

		$student_id = mysqli_real_escape_string($conn, $_GET['id']);

        $id_number = mysqli_real_escape_string($conn, $_GET['id_number']);


		$query1 = "UPDATE que SET status='6' WHERE student_id='$student_id' ";
    	$query_run1 = mysqli_query($conn, $query1);

    	if($query_run1)
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
    
        
    
}
 
?>