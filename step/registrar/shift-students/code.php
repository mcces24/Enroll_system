<?php
session_start();
require '../../../database/dbcon.php';

$query6 = "SELECT * FROM system  ";
$query_run6 = mysqli_query($conn, $query6);

if(mysqli_num_rows($query_run6) > 0){
    $student4 = mysqli_fetch_array($query_run6);
    }
else{ 
    echo "<h4>No Such Id Found</h4>";
}
use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

if(isset($_POST['edit']))
{   
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $section_id = mysqli_real_escape_string($conn, $_POST['section_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE students SET section_id='$section_id', status_type='Enroll Old Students' WHERE id_number='$id_number' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $query2 = "SELECT * FROM student_acc WHERE id_number = '$id_number' ";
        $query_run2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($query_run2) > 0){
            foreach($query_run2 as $students){

                $_SESSION['message'] = "Students Enroll Successfully";
                $_SESSION['message_icon'] = "success";
                header('Location: '. $_SERVER['HTTP_REFERER']);
                exit(0);
              
              
            }
          }
          else{

                $pass = substr(str_shuffle(MD5(microtime())), 0, 10);
                $query3 = "INSERT INTO student_acc (id_number, pass) VALUES ('$id_number', '$pass')";
                $query_run3 = mysqli_query($conn, $query3);

                //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
                

                //Load Composer's autoloader
                require 'vendor/autoload.php';

                $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username = ($student4['email_user']);                     //SMTP username
                $mail->Password   = ($student4['email_pass']);                              //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($student4['email_user']);
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Thank You For Choosing MCC';
                $mail->Body    = "<h4>Thank you for enrolling in Madridejos Community College</h4>
                                <p>Here is you account in students portal:</p>
                                <p><h4>User: $id_number</h4></p>
                                <p><h4>Pass: $pass</h4><</p>";

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

                $_SESSION['message'] = "Students Enroll Successfully";
                $_SESSION['message_icon'] = "success";
                header('Location: '. $_SERVER['HTTP_REFERER']);
                exit(0);
          }
    
    }
    else
    {
        $_SESSION['message'] = "Error Enrolling";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}






?>
