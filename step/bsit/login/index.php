<?php
session_start();
if (isset($_SESSION['SESSION_BSIT'])) {
    header("Location: ../");
    die();
}

include '../../../database/config.php';
define('ATTEMPT_PATH', dirname(__DIR__) . '/Master/POST/LoginAttempt.php');
if (file_exists(ATTEMPT_PATH)) {
    include_once ATTEMPT_PATH;
} else {
    die('Error: Configuration file not found.');
}
$msg = "";

if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");

        if ($query) {
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        }
    } else {
        header("Location: ./");
    }
}

if (isset($_POST['submit'])) {
    // Get the email and password from POST
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // This is the plain text password from the user

    // Prepare SQL to select user by email
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {  // Assuming 'password' field contains the hashed password

            // Check if the user has the appropriate role
            if ($row['role'] == "BSIT Portal") {
                $id = $row['id'];
                
                // Update the user's online status
                $query = "UPDATE users SET online = '1' WHERE id = ?";
                $stmt1 = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt1, "i", $id);
                mysqli_stmt_execute($stmt1);

                // Set session and redirect the user
                $_SESSION['SESSION_BSIT'] = $email;
                header("Location: ../");
                exit;
            } else {
                $msg = "<div class='alert alert-info'>Email or password do not match for this portal.</div>";
            }
        } else {
            // Password does not match
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    } else {
        // No user found with the provided email
        $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login | BSIT Portal</title>
    <link rel="icon" type="image" href="../../../icon.png">
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
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
    <link rel="stylesheet" type="text/css" href="../../../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none"
        })
    </script>
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
                        <h2>Login Now | BSIT Portal</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p style="float: right ;"><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <p style="float: left;"><a href="../../../" style="margin-bottom: 15px; display: block; text-align: right;">Back Home</a></p>
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>
