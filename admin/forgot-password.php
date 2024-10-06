<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->
<?php
                      
                        require '../database/dbcon.php';
                            
                            $query = "SELECT * FROM system  ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
?>

<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include '../database/config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    $query = "SELECT * FROM admin WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email); // 's' indicates the email is a string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
    
          if ($row['email'] === $email) {
              $query = mysqli_query($conn, "UPDATE admin SET code='{$code}' WHERE email='{$email}'");
      
              if ($query) {        
                  echo "<div style='display: none;'>";
                  //Create an instance; passing `true` enables exceptions
                  $mail = new PHPMailer(true);
      
                  try {
                      //Server settings
                      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                      $mail->isSMTP();                                            //Send using SMTP
                      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                      $mail->Username = ($student['email_user']);                     //SMTP username
                      $mail->Password   = ($student['email_pass']);                              //SMTP password
                      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
                      //Recipients
                      $mail->setFrom($student['email_user']);
                      $mail->addAddress($email);
      
                      //Content
                      $mail->isHTML(true);                                  //Set email format to HTML
                      $mail->Subject = 'Forgot Password Link';
                      $domain = $student['domain'];
                      $link = "$domain/admin/change-password.php?reset=$code";
                      $mail->Body    = "Here is the verification link <p>$link</p>";
      
                      $mail->send();
                      echo 'Message has been sent';
                  } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  }
                  echo "</div>";        
                  $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
              }
        } else {
            $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
          }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Forget Password | Admin</title>
     <link rel="icon" type="image" href="../icon.png">
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="loader-wrapper" id="preloader">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
   <link rel="stylesheet" type="text/css" href="../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
          loader.style.display = "none"
        }) 
    </script>

    <!-- form section start -->
    <img class="wave" src="img/wave.png">
   
    <!-- form section start -->
    
    <section class="w3l-mockup-form">
        
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/mcc2.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Forgot Password | Admin</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <button name="submit" class="btn" type="submit">Send Reset Link</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="index.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>
