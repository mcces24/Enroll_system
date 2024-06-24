<?php

require '../../phpmailer/phpmailer/src/Exception.php';
require '../../phpmailer/phpmailer/src/PHPMailer.php';
require '../../phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $requestData = json_decode(file_get_contents('php://input'), true);
    $email = $requestData['email'];
    $passwordHash = md5($requestData["password"]);
    $randomNumber = rand(100000, 999999);

    // Replace these credentials with your database connection details
   include_once "../../database/conn.php";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO student_acc (email, pass, verified_status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $passwordHash, $randomNumber);

    if ($stmt->execute() === TRUE) {
        echo json_encode(['isSave' => true]);
        $mail = new PHPMailer(true);

		try {
			$mail = new PHPMailer(true);
		
			$mail->SMTPDebug = false; // Set to false for production
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'capstone.project2022.2023@gmail.com';
			$mail->Password   = 'nxnqxklsnggbkdtc';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port       = 465;
		
			$senderName = 'MCC - Verify Account';
			$senderEmail = 'capstone.project2022.2023@gmail.com';

			$mail->setFrom($senderEmail, $senderName);
			$mail->addAddress($email);
		
			$mail->isHTML(true);
			$mail->Subject = 'OPT CODE';
		
		    $link = "https://madridejoscommunitycollege.com/step/students/login/index.php?verify=$randomNumber";
			$mail->Body = "<h4>Madridejos Community College</h4>
			                <p>Verification Link: $link</p>
			";
		
			$mail->send();

		} catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
		
		
    } else {
        echo json_encode(['isSave' => false]);
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
