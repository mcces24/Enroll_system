<?php
header("Access-Control-Allow-Origin: *");

include_once '../../MainFunction.php';
require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = [];
    if (!empty($_POST)) {
        $requestData = $_POST;
    } else {
        $requestData = json_decode(file_get_contents('php://input'), true) ?? [];
    }
    //print_r($requestData);
    getPostData($requestData);
}

function getPostData($POST) {
    switch ($POST['type']) {
        case 'verify':
            verifiedUser($POST['data'] ?? null);
            break;
        case 'login':
            $data = $POST['data'] ?? null;
            login($data);
            break;
        case 'check_email':
            $data = $POST['data'] ?? null;
            checkEmail($data);
            break;
        case 'register':
            $data = $POST['data'] ?? null;
            register($data);
            break;
        case 'fetchYear':
            $data = $POST['data'] ?? null;
            fetchYear($data);
            break;
        case 'preEnroll':
            $data = $POST['data'] ?? null;
            preEnroll($data);
            break;
        case 'guidance_login':
            $data = $POST['data'] ?? null;
            guidanceLogin($data);
            break;
        case 'getNotification':
            getNotification();
            break;
        case 'guidanceLogout':
            guidanceLogout();
        break;    
        default:
            break;
    }
}

function verifiedUser($verify) {
    $verifiedData = getVerifiedData($verify);
    if (is_array($verifiedData)) {
        if ($verifiedData['status'] == 'success') {
            $response['type'] = $verifiedData['type'];
            $response['message'] = $verifiedData['message'];
        } else {
            $response['type'] = $verifiedData['type'];
            $response['message'] = $verifiedData['message'];
        }
    } else {
        $response['message'] = "Internal error occured";
        $response['type'] = "danger";
    }

    echo json_encode($response);
}

function login($data) {
    $username = isset($data['username']) ? $data['username'] : null;
    $password = isset($data['password']) ? $data['password'] : null;

    $verifiedData = getLoginUser($username, $password);
    
    echo json_encode($verifiedData);
}

function guidanceLogin($data) {
    $username = isset($data['username']) ? $data['username'] : null;
    $password = isset($data['password']) ? $data['password'] : null;

    $verifiedData = loginGuidanceUser($username, $password);
    
    echo json_encode($verifiedData);
}

function checkEmail($data) {
    $email = $data['email'];
    if (!empty($email)) {
        header('Content-Type: application/json');
        echo json_encode(ifEmailExists($email));
    } else {
        echo false;
    }
}

function register($data) {
    $email = $data['email'];
    $password = $data['password'];
    $randomNumber = rand(100000, 999999);

    $params = [
        'email' => $email,
        'password' => $password,
        'verified_status' => $randomNumber
    ];

    $response = createNewUser($params);

    if ($response) {
        $mail = new PHPMailer(true);

        try {
            // PHPMailer setup
            $mail->isSMTP();
            //$mail->Host       = 'smtp.gmail.com';
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            //$mail->Username   = 'capstone.project2022.2023@gmail.com';
            //$mail->Password   = 'nxnqxklsnggbkdtc';
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //$mail->Port       = 465;

            $mail->Username   = 'no-reply@madridejoscommunitycollege.com'; // Your Hostinger email address
            $mail->Password   = 'MCCes@2024'; // Your Hostinger email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also possible for port 465
            //$mail->Port       = 587; // TCP port to connect to, 587 for STARTTLS, 465 for SMTPS

            $senderName = 'MCC - Verify Account';
            $senderEmail = 'no-reply@madridejoscommunitycollege.com';

            $mail->setFrom($senderEmail, $senderName);
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Madridejos Community College - Verify Account';

            $link = "https://madridejoscommunitycollege.com/step/students/login/?verify=$randomNumber";
            $mail->isHTML(true);
            $mail->Body = file_get_contents('Layout/email_verification.html');
            $mail->Body = str_replace('<?= $link ?>', $link, $mail->Body);

            $mail->send();
        } catch (Exception $e) {
            $response['error'] = 'Message could not be sent. Mailer Error: ' . $e->getMessage();
            header('HTTP/1.1 500 Internal Server Error');
        }
    } 
    header('Content-Type: application/json');
    echo json_encode($response);
}

function fetchYear($data) {
    $course_id = $data['course_id'];
    $yearLevelByCourse = getYearLevelByCourseId($course_id);
    header('Content-Type: application/json');
    echo json_encode($yearLevelByCourse);
}

function preEnroll($data) {
    $preEnrollStudents = preEnrollStudents($data);
    header('Content-Type: application/json');
    echo json_encode($preEnrollStudents);
}

function getNotification() {
    $notification = getNotifications();
    header('Content-Type: application/json');
    echo json_encode($notification);
}

function guidanceLogout() {
    $response = guidanceLogoutNow();
    header('Content-Type: application/json');
    echo json_encode($response);
}
