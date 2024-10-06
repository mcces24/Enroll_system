<?php

$msg = "";

include '../database/config.php';

if (isset($_GET['reset'])) {
    $reset_code = mysqli_real_escape_string($conn, $_GET['reset']);
    
    // Use prepared statements for security
    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE code = ?");
    mysqli_stmt_bind_param($stmt, 's', $reset_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['submit'])) {
            // Use password_hash to hash the password securely
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

            if ($password === $confirm_password) {
                // Hash the password securely with password_hash()
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                
                // Prepare the update query using a prepared statement
                $update_stmt = mysqli_prepare($conn, "UPDATE admin SET password = ?, code = '' WHERE code = ?");
                mysqli_stmt_bind_param($update_stmt, 'ss', $hashed_password, $reset_code);
                $query = mysqli_stmt_execute($update_stmt);

                if ($query) {
                    header("Location: index.php");
                    exit();  // It's a good practice to call exit after redirection
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Invalid reset link.</div>";
    }
} else {
    header("Location: forgot-password.php");
    exit();  // Use exit after redirecting
}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Change Password | Admin</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image" href="../../icon.png">
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
<!--     <img class="wave2" src="img/wave2.png"> -->
    <!-- form section start -->
    
    <section class="w3l-mockup-form">
<!--         <div class="img">
            <img src="img/undraw_programming_re_kg9v.svg">
        </div>
        <div class="img2">
            <img src="img/undraw_progressive_app_m-9-ms.svg">
        </div> -->
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
                        <h2>Change Password | Admin</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Change Password</button>
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
