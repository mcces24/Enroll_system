<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
    session_start();
    if (isset($_SESSION['SESSION_COR'])) {
        header("Location: ../index.php");
        die();
    }

    include '../../../database/config.php';
    define('ATTEMPT_PATH', dirname(dirname(dirname(__DIR__))) . '/Master/POST/LoginAttempt.php');
    if (file_exists(ATTEMPT_PATH)) {
        include_once ATTEMPT_PATH;
    } else {
        die('Error: Missing files!');
    }
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        // Retrieve email and password from the form
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Plaintext password from the user

        $locationResponse = getUserLocation();
    
        if (!$locationResponse['success']) {
            $msg = "<div class='alert alert-danger'>{$locationResponse['message']}</div>";
        } else {
            $lat = $locationResponse['data']['lat'];
            $lon = $locationResponse['data']['lon'];
            $location = $locationResponse['data']['location'];
        
            // Get complete address
            $addressResponse = getCompleteAddress($lat, $lon);
            if (!$addressResponse['success']) {
                $msg = "<div class='alert alert-danger'>{$addressResponse['message']}</div>";
            } else {
                $completeAddress = $addressResponse['address'];
            }
        }
    
        // Prepare SQL query to fetch user data by username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        // Check if user exists
        if (empty($msg)) {
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
        
                // Verify the password using password_verify()
                if (password_verify($password, $row['password'])) {
                    // Check if the user role is "COR Section"
                    if ($row['role'] == "COR Section") {
                        $id = $row['id'];
        
                        // Update user status to online
                        $query = "UPDATE users SET online = '1' WHERE id = ?";
                        $stmt1 = mysqli_prepare($conn, $query);
                        mysqli_stmt_bind_param($stmt1, "i", $id);
                        mysqli_stmt_execute($stmt1);
        
                        // Set session for the user
                        $_SESSION['SESSION_COR'] = $email;
                        logLoginAttempt($conn, $email, 'cor', 'success', $location, $completeAddress, $lat, $lon);
                        // Redirect to the homepage or dashboard
                        header("Location: ../index.php");
                        exit();
                    } else {
                        // Role mismatch
                        $msg = "<div class='alert alert-info'>Email or password do not match for this portal.</div>";
                    }
                } else {
                    // Incorrect password
                    $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
                }
            } else {
                // No user found with the given email
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
            logLoginAttempt($conn, $email, 'cor', 'failed', $location, $completeAddress, $lat, $lon);
        }
    }

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login | COR Section</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image" href="../../../icon.png">
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
   <link rel="stylesheet" type="text/css" href="../../../loader/styles.css" />
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
                        <h2>Login Now | COR Section</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p style="float: right ;"><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <p style="float: left;"><a href="../../../index.php" style="margin-bottom: 15px; display: block; text-align: right;">Back Home</a></p>
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
