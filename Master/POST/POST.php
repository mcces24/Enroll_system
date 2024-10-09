<?php

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
    if (isset($_FILES['data']) && $_FILES['data']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['data']['tmp_name'];
        $requestData['data'] = $_FILES['data'];
    }
    // print_r($requestData);
    getPostData($requestData);
} else {
    echo 'Invalid request!!!!';
}

function getPostData($POST)
{
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
        case 'acceptNewApplicant':
            $data = $POST['data'] ?? null;
            acceptNewApplicant($data);
            break;
        case 'sendGuidanceForm':
            $data = $POST['data'] ?? null;
            sendGuidanceForm($data);
            break;
        case 'saveApplicantGuidanceRecord':
            $data = $POST['data'] ?? null;
            saveApplicantGuidanceRecord($data);
            break;
        case 'updateApplicantStatus':
            $data = $POST['data'] ?? null;
            updateApplicantStatus($data);
            break;
        case 'sendAdmission':
            $data = $POST['data'] ?? null;
            sendAdmission($data);
            break;
        case 'addApplicantScores':
            $data = $POST['data'] ?? null;
            addApplicantScores($data);
            break;
        case 'importCSVScore':
            $data = $POST['data'] ?? null;
            importCSVScore($data);
            break;
        case 'forgetStudent':
            $data = $POST['data'] ?? null;
            forgetStudent($data);
            break;
        default:
            break;
    }
}

function verifiedUser($verify)
{
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

function login($data)
{
    $username = isset($data['username']) ? $data['username'] : null;
    $password = isset($data['password']) ? $data['password'] : null;

    $verifiedData = getLoginUser($username, $password);

    echo json_encode($verifiedData);
}

function guidanceLogin($data)
{
    $username = isset($data['username']) ? filter_var($data['username'], FILTER_SANITIZE_STRING) : null;
    $password = isset($data['password']) ? filter_var($data['password'], FILTER_SANITIZE_STRING) : null;

    $verifiedData = loginGuidanceUser($username, $password);

    echo json_encode($verifiedData);
}

function checkEmail($data)
{
    $email = $data['email'];
    if (!empty($email)) {
        header('Content-Type: application/json');
        echo json_encode(ifEmailExists($email));
    } else {
        echo false;
    }
}

function register($data)
{
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
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'capstone.project2022.2023@gmail.com';
            $mail->Password   = 'nxnqxklsnggbkdtc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $senderName = 'Verify Account - Madridejos Community College';
            $senderEmail = 'capstone.project2022.2023@gmail.com';

            //hostimger
            // $mail->isSMTP();
            // $mail->Host = 'smtp.hostinger.com';  // Set the Hostinger SMTP server
            // $mail->SMTPAuth = true;  // Enable SMTP authentication
            // $mail->Username = 'no-reply@madridejoscommunitycollege.com';  // Your Hostinger email address
            // $mail->Password = 'MCCes@2024';  // Your Hostinger email password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
            // $mail->Port = 587;

            // $senderName = 'Verify Account - Madridejos Community College';
            // $senderEmail = 'no-reply@madridejoscommunitycollege.com';
            
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

function fetchYear($data)
{
    $course_id = $data['course_id'];
    $yearLevelByCourse = getYearLevelByCourseId($course_id);
    header('Content-Type: application/json');
    echo json_encode($yearLevelByCourse);
}

function preEnroll($data)
{
    $preEnrollStudents = preEnrollStudents($data);
    header('Content-Type: application/json');
    echo json_encode($preEnrollStudents);
}

function getNotification()
{
    $notification = getNotifications();
    header('Content-Type: application/json');
    echo json_encode($notification);
}

function guidanceLogout()
{
    $response = guidanceLogoutNow();
    header('Content-Type: application/json');
    echo json_encode($response);
}

function acceptNewApplicant($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $response['message'] = "Requirments not met";
            $response['type'] = "danger";
            echo json_encode($response);
            return;
        }

        $response = acceptNewApplicantFunction($value);
        $return[] = $response;
    }
    header('Content-Type: application/json');
    echo json_encode($return);
}

function sendGuidanceForm($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $response['message'] = "Requirments not met";
            $response['type'] = "danger";
            echo json_encode($response);
            return;
        }
        $email = $value['email'];
        $applicant_id = $value['applicant_id'];
        $name = $value['name'];

        $response = sendGuidanceFormFunction($value);
        $responseJson = json_decode($response, true);
        if ($responseJson['status'] = 'success') {
            $system = isset($responseJson['system'][0]) ? $responseJson['system'][0] : [];
            $mail = new PHPMailer(true);
            try {
                // PHPMailer setup
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                // $mail->Username   = !empty($system['email_user']) ? $system['email_user'] : 'capstone.project2022.2023@gmail.com';
                // $mail->Password   = !empty($system['email_pass']) ? $system['email_pass'] : 'nxnqxklsnggbkdtc';
                $mail->Username   = 'capstone.project2022.2023@gmail.com';
                $mail->Password   = 'nxnqxklsnggbkdtc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $senderName = 'Guidance Office - Madridejos Community College';
                $senderEmail = 'capstone.project2022.2023@gmail.com';

                //hostinger
                // $mail->isSMTP();
                // $mail->Host = 'smtp.hostinger.com';  // Set the Hostinger SMTP server
                // $mail->SMTPAuth = true;  // Enable SMTP authentication
                // $mail->Username = 'no-reply@madridejoscommunitycollege.com';  // Your Hostinger email address
                // $mail->Password = 'MCCes@2024';  // Your Hostinger email password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
                // $mail->Port = 587;
    
                // $senderName = 'Guidance Office - Madridejos Community College';
                // $senderEmail = 'no-reply@madridejoscommunitycollege.com';

                $mail->setFrom($senderEmail, $senderName);
                $mail->addAddress($email);
                $mail->Subject = 'MCC Guidance Office Form';

                $domain = isset($system['domain']) ? $system['domain'] : '';
                $link = "$domain/guidance-step/?applicant_id=$applicant_id";

                $mail->isHTML(true);
                $mail->Body = file_get_contents('Layout/accept_mail.html');
                $mail->Body = str_replace('<?= $link ?>', $link, $mail->Body);
                $mail->Body = str_replace('<?= $applicant_id ?>', $applicant_id, $mail->Body);
                $mail->Body = str_replace('<?= $name ?>', $name, $mail->Body);

                $mail->send();
            } catch (Exception $e) {
                $response['error'] = 'Message could not be sent. Mailer Error: ' . $e->getMessage();
                header('HTTP/1.1 500 Internal Server Error');
            }
        }
        $return[] = $response;
    }
    header('Content-Type: application/json');
    echo json_encode($return);   
}

function saveApplicantGuidanceRecord($data) {
    $response = saveApplicantGuidanceRecordFunction($data);
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateApplicantStatus($data) {
    $response = updateApplicantStatusFunction($data);
    header('Content-Type: application/json');
    echo json_encode($response);
}

function sendAdmission($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $response['message'] = "Requirments not met";
            $response['type'] = "danger";
            echo json_encode($response);
            return;
        }
        $email = $value['email'];
        $applicant_id = $value['applicant_id'];
        $name = $value['name'];

        $response = sendAdmissionFunction($value);
        $responseJson = json_decode($response, true);
        if ($responseJson['status'] = 'success') {
            $system = isset($responseJson['system'][0]) ? $responseJson['system'][0] : [];
            $mail = new PHPMailer(true);
            try {
                // PHPMailer setup
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                // $mail->Username   = isset($system['email_user']) ? $system['email_user'] : 'capstone.project2022.2023@gmail.com';
                // $mail->Password   = isset($system['email_pass']) ? $system['email_pass'] : 'nxnqxklsnggbkdtc';
                $mail->Username   = 'capstone.project2022.2023@gmail.com';
                $mail->Password   = 'nxnqxklsnggbkdtc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $senderName = 'Guidance Office - Madridejos Community College';
                $senderEmail = 'capstone.project2022.2023@gmail.com';

                //hostinger
                // $mail->isSMTP();
                // $mail->Host = 'smtp.hostinger.com';  // Set the Hostinger SMTP server
                // $mail->SMTPAuth = true;  // Enable SMTP authentication
                // $mail->Username = 'no-reply@madridejoscommunitycollege.com';  // Your Hostinger email address
                // $mail->Password = 'MCCes@2024';  // Your Hostinger email password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
                // $mail->Port = 587;
    
                // $senderName = 'Guidance Office - Madridejos Community College';
                // $senderEmail = 'no-reply@madridejoscommunitycollege.com';

                $mail->setFrom($senderEmail, $senderName);
                $mail->addAddress($email);
                $mail->Subject = isset($system['email_subject']) ? $system['email_subject'] : '';
                
                $domain = isset($system['domain']) ? $system['domain'] : '';
                $admission = "$domain/admission-schedule?applicant_id=$applicant_id";
                $body = isset($system['email_body']) ? $system['email_body'] : '';

                $mail->isHTML(true);
                $mail->Body = file_get_contents('Layout/email_admission.html');
                $mail->Body = str_replace('<?= $admission ?>', $admission, $mail->Body);
                $mail->Body = str_replace('<?= $applicant_id ?>', $applicant_id, $mail->Body);
                $mail->Body = str_replace('<?= $body ?>', $body, $mail->Body);
                $mail->Body = str_replace('<?= $name ?>', $name, $mail->Body);

                $mail->send();
            } catch (Exception $e) {
                $response['error'] = 'Message could not be sent. Mailer Error: ' . $e->getMessage();
                header('HTTP/1.1 500 Internal Server Error');
            }
        }
        $return[] = $response;
    }
    header('Content-Type: application/json');
    echo json_encode($return);   
}

function addApplicantScores($data) {
    $response = addApplicantScoresFunction($data);
    header('Content-Type: application/json');
    echo json_encode($response);
}

function importCSVScore($data) {
    $response = importCSVScoreFunction($data);
    header('Content-Type: application/json');
    echo json_encode($response);
}

function forgetStudent($data)
{   
    $username = isset($data['username']) ? $data['username'] : null;
    $otp_code = isset($data['otp_code']) ? $data['otp_code'] : null;
    $new_password = isset($data['new_password']) ? $data['new_password'] : null;
    $sendingOtp = isset($data['sendingOtp']) ? $data['sendingOtp'] : false;
    $sendingEmail = isset($data['sendingEmail']) ? $data['sendingEmail'] : null;
    $otp_code_verify = isset($data['otp_code_verify']) ? $data['otp_code_verify'] : null;

    $data = array(
        'username' => $username,
        'otp_code' => $otp_code,
        'new_password' => $new_password,
        'sendingOtp' => $sendingOtp,
        'otp_code_verify' => $otp_code_verify,
    );

    if (!empty($username) || !empty($otp_code) || !empty($new_password) || $sendingOtp) {
        if ($sendingOtp) {
            $email = $sendingEmail;
            $randomNumber = rand(100000, 999999);

            $params = [
                'email' => $email,
                'verified_status' => $randomNumber
            ];

            $response = forgetStudentFuntion($params);

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

                    $senderName = 'Forgot Password - Madridejos Community College';
                    $senderEmail = 'capstone.project2022.2023@gmail.com';

                    //hostinger
                    // $mail->isSMTP();
                    // $mail->Host = 'smtp.hostinger.com';  // Set the Hostinger SMTP server
                    // $mail->SMTPAuth = true;  // Enable SMTP authentication
                    // $mail->Username = 'no-reply@madridejoscommunitycollege.com';  // Your Hostinger email address
                    // $mail->Password = 'MCCes@2024';  // Your Hostinger email password
                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
                    // $mail->Port = 587;
        
                    // $senderName = 'Forgot Password - Madridejos Community College';
                    // $senderEmail = 'no-reply@madridejoscommunitycollege.com';

                    $mail->setFrom($senderEmail, $senderName);
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Madridejos Community College - Verify Account';

                    
                    $mail->isHTML(true);
                    $mail->Body = file_get_contents('Layout/forgot_password.html');
                    $mail->Body = str_replace('<?= $OTP ?>', $randomNumber, $mail->Body);

                    $mail->send();
                } catch (Exception $e) {
                    $response['error'] = 'Message could not be sent. Mailer Error: ' . $e->getMessage();
                    header('HTTP/1.1 500 Internal Server Error');
                }
            }
            echo json_encode($response);
            return;
        }
        if (!empty($username) || !empty($otp_code) || !empty($new_password)) {
            $verifiedData = forgetStudentFuntion($data);
        }
    } else {
        $verifiedData = null;
    }

    echo json_encode($verifiedData);
}

