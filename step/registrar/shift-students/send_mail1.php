
<?php
//send_mail.php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../../database/config1.php';
if(isset($_POST['email_data']))
{

	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$subject_id = $row["name"];
		$id_number = $row["email"];
		$query1 = "SELECT * FROM selected_subject WHERE subject_id='$subject_id'";
		$query_run1 = mysqli_query($conn, $query1);

		if(mysqli_num_rows($query_run1) > 0){
			$code = 'Subject Already Added';
		}
		else{
		$query = mysqli_query($conn, "INSERT INTO selected_subject VALUES('','$id_number','$subject_id')"); 

		$code = 'Subject Added';
		
		}


	}
		echo $code;
}
else{
	echo 'Subject Not Added';
}

	
?>