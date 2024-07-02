<?php
include_once '../../MainFunction.php';
require '../../phpmailer/phpmailer/src/Exception.php';
require '../../phpmailer/phpmailer/src/PHPMailer.php';
require '../../phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get JSON input
    $requestData = json_decode(file_get_contents('php://input'), true);
    $email = $requestData['email'];
    $passwordHash = $requestData["password"];
    $randomNumber = rand(100000, 999999);

    $params = [
        'email' => $email,
        'password' => $passwordHash,
        'verified_status' => $randomNumber
    ];

    header('Content-Type: application/json');
    $response = json_encode(createNewUser($params));


    if ($response) {
        $mail = new PHPMailer(true);

        try {
            // PHPMailer setup
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
            $mail->Subject = 'Madridejos Community College - Verify Account';

            $link = "https://madridejoscommunitycollege.com/step/students/login/?verify=$randomNumber";
            $mail->isHTML(true);
            $mail->Body = file_get_contents('email_verification.html');
            $mail->Body = str_replace('<?= $link ?>', $link, $mail->Body);

            $mail->send();
        } catch (Exception $e) {
            $response['error'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            header('HTTP/1.1 500 Internal Server Error');
        }
    } 
    // Return JSON response
    header('Content-Type: application/json');
    echo $response;
}
?>
