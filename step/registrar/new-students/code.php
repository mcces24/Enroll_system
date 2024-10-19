<?php
session_start();
require '../../../database/dbcon.php';

$query6 = "SELECT * FROM system  ";
$query_run6 = mysqli_query($conn, $query6);

if (mysqli_num_rows($query_run6) > 0) {
    $student4 = mysqli_fetch_array($query_run6);
} else {
    echo "<h4>No Such Id Found</h4>";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['edit'])) {
    $applicant_id = mysqli_real_escape_string($conn, $_POST['applicant_id']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $section_id = mysqli_real_escape_string($conn, $_POST['section_id']);
    $nso = mysqli_real_escape_string($conn, $_POST['nso']);
    $card = mysqli_real_escape_string($conn, $_POST['card']);
    $good_moral = mysqli_real_escape_string($conn, $_POST['good_moral']);
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $status_type = mysqli_real_escape_string($conn, $_POST['status_type']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $subjects = mysqli_real_escape_string($conn, $_POST['subjects']);

    //$query1 = "UPDATE que SET status='2' WHERE student_id='$student_id' ";
    //$query_run1 = mysqli_query($conn, $query1);
    $stmt = $conn->prepare("UPDATE que SET status=? WHERE id=?");
    $status = 2; // Assuming status is an integer
    $stmt->bind_param("ii", $status, $student_id);

    if (!$stmt->execute()) {
        $_SESSION['message'] = "There's an error:" . $stmt->error;
        $_SESSION['message_icon'] = "warning";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }

    $stmt->close();

    $query2 = "UPDATE documents SET id_number='$id_number', nso='$nso', card='$card', good_moral='$good_moral' WHERE applicant_id='$applicant_id' ";
    $query_run2 = mysqli_query($conn, $query2);


    $query = "UPDATE students SET type='$type', section_id='$section_id', id_number='$id_number', status_type='$status_type' WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if ($type == 'Irregular') {
            $queryInsert = "INSERT INTO selected_subject (id_number, subject_codes) VALUES (?, ?)";

            if ($stmt = $conn->prepare($queryInsert)) {
                // Bind parameters (assuming id_number is an integer and subject_codes is a string)
                $stmt->bind_param("ss", $id_number, $subjects);

                $stmt->execute();

                echo "New record created successfully";

                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        }
        // $query2 = "SELECT * FROM student_acc WHERE id_number = '$id_number' ";
        // $query_run2 = mysqli_query($conn, $query2);

        // if (mysqli_num_rows($query_run2) > 0) {
        //     foreach ($query_run2 as $students) {

                $_SESSION['message'] = "Applicant Enroll Successfully";
                $_SESSION['message_icon'] = "success";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit(0);
        //     }
        // } else {

            // $pass = substr(str_shuffle(MD5(microtime())), 0, 10);
            // $query3 = "INSERT INTO student_acc (id_number, pass) VALUES ('$id_number', '$pass')";
            // $query_run3 = mysqli_query($conn, $query3);

            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function


            //Load Composer's autoloader
            // require 'vendor/autoload.php';

            // $mail = new PHPMailer(true);

            // try {
            //     //Server settings
            //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            //     $mail->isSMTP();                                            //Send using SMTP
            //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            //     $mail->Username = ($student4['email_user']);                     //SMTP username
            //     $mail->Password   = ($student4['email_pass']);                              //SMTP password
            //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //     //Recipients
            //     $mail->setFrom($student4['email_user']);
            //     $mail->addAddress($email);

            //     //Content
            //     $mail->isHTML(true);                                  //Set email format to HTML
            //     $mail->Subject = 'Thank You For Choosing MCC';
            //     $mail->Body    = "<h4>Thank you for enrolling in Madridejos Community College</h4>
            //                     <p>Here is your id number.</p>
            //                     <p><h4>$id_number</h4></p>";

            //     $mail->send();
            //     echo 'Message has been sent';
            // } catch (Exception $e) {
            //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // }

            // $_SESSION['message'] = "Applicant Enroll Successfully";
            // $_SESSION['message_icon'] = "success";
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            // exit(0);
        //}
    } else {
        $_SESSION['message'] = "Error Enrolling";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}


if (isset($_POST['add'])) {


    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
    $sections = mysqli_real_escape_string($conn, $_POST['sections']);
    $section_code = mysqli_real_escape_string($conn, $_POST['section_code']);

    $query = "INSERT INTO sections (sections, year_id, section_code) VALUES ('$sections', '$year_id', '$section_code')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "New Section Added";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    } else {
        $_SESSION['message'] = "Error Adding Section";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}
