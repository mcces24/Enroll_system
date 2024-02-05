<?php
    include_once "./database/conn.php";
    
    require './phpmailer/phpmailer/src/Exception.php';
    require './phpmailer/phpmailer/src/PHPMailer.php';
    require './phpmailer/phpmailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $conn = new mysqli($servername, $username, $password, $dbname);


    $data = json_decode(file_get_contents("php://input"), true);

    $jsonRecord = json_encode($data);


    $email = $data['email'];
    $password = md5($data['password']);
    $randomNumber = rand(100000, 999999);


    $insertSql = "INSERT INTO new_user (email, password, verified_status) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sss", $email, $password, $randomNumber);
    $insertResult = $insertStmt->execute();

    if ($insertResult) {
        echo "Data inserted successfully";
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
		
			$senderName = 'Madridejos Community College';
			$senderEmail = 'capstone.project2022.2023@gmail.com';

			$mail->setFrom($senderEmail, $senderName);
			$mail->addAddress($email);
		
			$mail->isHTML(true);
			$mail->Subject = 'Verify Account';
		
		    $link = "https://madridejoscommunitycollege.com/step/students/login/index.php?verify=$randomNumber";
			$mail->Body = "<h4>Click this link to verify your account: $link</h4>";
		
			$mail->send();

			$resp['status'] = 'success';
			$resp['msg']    = 'OTP sent to your email.';
			
		} catch (Exception $e) {
			$resp['status'] = 'failed';
			$resp['msg']    = "Error: {$mail->ErrorInfo}";
		}
         
    } else {
        echo "Error inserting data: " . $insertStmt->error;
    }

    $insertStmt->close();
?>
