<?php

require '../../../database/dbcon.php';

$query = "SELECT * FROM system  ";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
	$student = mysqli_fetch_array($query_run);
?><?php
								} else {
									echo "<h4>No Such Id Found</h4>";
								}

									?>
<?php
//send_mail.php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include '../../../database/config1.php';
if (isset($_POST['email_data'])) {
	require 'class/class.phpmailer.php';
	$output = '';
	foreach ($_POST['email_data'] as $row) {
		$student_id = $row["name"];
		$query1 = "SELECT * FROM students WHERE id='$student_id'";
		$query_run1 = mysqli_query($conn, $query1);
		$student1 = mysqli_fetch_array($query_run1);
		$fname = $student1['fname'];
		$lname = $student1['lname'];
		$mname = $student1['mname'];


		$text = "Hello! $lname, $fname $mname.";
		$app = ($student1['applicant_id']);

		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host       = 'smtp.gmail.com'; 		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port       = 465;								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = ($student['email_user']);					//Sets SMTP username
		$mail->Password   = ($student['email_pass']);					//Sets SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = ($student['email_user']);			//Sets the From email address for the message
		$mail->FromName = ($student['email_name']);					//Sets the From name of the message
		$mail->AddAddress($row["email"]);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = ($student['email_enroll_sub']); //Sets the Subject of the message
		//An HTML or plain text message body
		$body = $student['email_enroll'];
		$id = $row["name"];
		$domain = $student['domain'];
		$step = "$domain/step/guidance/endorse-applicant/enrollment-steps?id=$id";
		$mail->Body = "<h2>$text</h2> <br> $body<br>Please print this and present during enrollment: <br>$step <h3>Applicant Number: $app </h3><br> NOTE: Please secure a copy of your Applicant Number. Thank You.";

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error

		if ($result) {
			$output .= html_entity_decode($result);
		}
	}
	if ($output) {
		echo 'ok';
	} else {
		echo 'erorr';
	}
}


?>