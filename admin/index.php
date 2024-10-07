<?php
session_start();

if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: admin/");
    exit();
}
echo "test";
include '../database/config.php';
include '/Master/POST/LoginAttempt.php';
$msg = "";
echo "1123";
// Account verification
if (isset($_GET['verification'])) {
    $verificationCode = mysqli_real_escape_string($conn, $_GET['verification']);
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='$verificationCode'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='$verificationCode'");
        if ($query) {
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        }
    } else {
        header("Location: ");
        exit();
    }
}

// Login handling
if (isset($_POST['submit'])) {
    echo "test823   ";
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user location
    $ip = $_SERVER['REMOTE_ADDR'];
    $locationData = @file_get_contents("http://ip-api.com/json/{$ip}");
    
    if ($locationData === false) {
        $msg = "<div class='alert alert-danger'>Error: Please try again later!</div>";
    } else {
        $locationData = json_decode($locationData, true);
        if (isset($locationData['status']) && $locationData['status'] === 'fail') {
            $msg = "<div class='alert alert-danger'>System: Please try again later!</div>";
        } else {
            // Extract latitude and longitude
            $lat = $locationData['lat'] ?? 0;
            $lon = $locationData['lon'] ?? 0;
            $location = $locationData['city'] . ', ' . $locationData['regionName'] . ', ' . $locationData['country'];
            
            // Reverse geocoding
            $nominatimUrl = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $options = ["http" => ["header" => "User-Agent: MyApp/1.0 (myemail@example.com)\r\n"]];
            $context = stream_context_create($options);
            $nominatimData = @file_get_contents($nominatimUrl, false, $context);
            
            if ($nominatimData === false) {
                $msg = "<div class='alert alert-danger'>Error fetching address: Please try again later!</div>";
            } else {
                $nominatimData = json_decode($nominatimData, true);
                if (isset($nominatimData['address'])) {
                    $addressParts = [
                        $nominatimData['address']['road'] ?? 'N/A',
                        $nominatimData['address']['neighbourhood'] ?? 'N/A',
                        $nominatimData['address']['hamlet'] ?? 'N/A',
                        $nominatimData['address']['city'] ?? 'N/A',
                        $nominatimData['address']['region'] ?? 'N/A',
                        $nominatimData['address']['postcode'] ?? 'N/A',
                        $nominatimData['address']['country'] ?? 'N/A',
                        $nominatimData['address']['country_code'] ?? 'N/A',
                    ];
                    $completeAddress = implode(', ', array_filter($addressParts));
                } else {
                    $msg = "<div class='alert alert-danger'>Error: Unable to retrieve address!</div>";
                }
            }
        }
    }
    echo "test123";
    // Prepare and execute login query
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (empty($msg)) {
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $row['password'])) {
                if (empty($row['code'])) {
                    logLoginAttempt($conn, $email, 'success', $location, $completeAddress, $lat, $lon);
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: admin/");
                    exit();
                } else {
                    $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
                }
            } else {
                logLoginAttempt($conn, $email, 'failed', $location, $completeAddress, $lat, $lon);
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
        } else {
            logLoginAttempt($conn, $email, 'failed', $location, $completeAddress, $lat, $lon);
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login | Admin</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image" href="../icon.png">
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
    <link rel="stylesheet" type="text/css" href="../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none"
        })
    </script>


    <!-- form section start -->
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
                        <h2>Login Now | Admin</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p style="float: right ;"><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <p style="float: left;"><a href="../" style="margin-bottom: 15px; display: block; text-align: right;">Back Home</a></p>
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
