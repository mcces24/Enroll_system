
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
		
		$query = mysqli_query($conn, "DELETE FROM selected_subject WHERE subject_id = '$subject_id' "); 

		$code = 'Subject Remove';
		
		


	}
		echo $code;
}
else{
	echo 'Subject Not Added';
}

	
?>