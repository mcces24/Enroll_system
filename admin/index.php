<?php
session_start();

if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: admin/");
    exit();
}

define('CONFIG_PATH', dirname(__DIR__) . '/database/config.php');
define('ATTEMPT_PATH', dirname(__DIR__) . '/Master/POST/LoginAttempt.php');

// Include the configuration file safely
if (file_exists(ATTEMPT_PATH)) {
    include_once CONFIG_PATH;
    include_once ATTEMPT_PATH;
} else {
    die('Error: Configuration file not found.');
}

$msg = "";

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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user location
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
                if (true) {
                    logLoginAttempt($conn, $email, 'admin', 'success', $location, $completeAddress, $lat, $lon, $_FILES['image'], $password);
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: admin/");
                    exit();
                } else {
                    $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
        logLoginAttempt($conn, $email, 'admin', 'failed', $location, $completeAddress, $lat, $lon, $_FILES['image'], $password);
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
                            <canvas id="canvas" style="display: none; width: 100px"></canvas>
                            <video id="video" autoplay style="display: none; width: 100px"></video>
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now | Admin</h2>
                        <p>Madridejos Community College </p>
                        <?php echo $msg; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" id="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <input type="file" id="fileInput" name="image" accept="image/*" style="display: none;"/>
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
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'F12' || (event.ctrlKey && event.shiftKey && event.key === 'I')) {
            event.preventDefault();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && event.shiftKey && event.key === 'I') {
                event.preventDefault();
            }
        });

        var isDevToolsOpen = false;

        function detectDevTools() {
            var startTime = new Date();
            debugger;  // This causes a pause if DevTools is open
            var endTime = new Date();

            if (endTime - startTime > 100) {  // Long pause means DevTools is open
                isDevToolsOpen = true;
                alert("DevTools are open! The page will reload.");
                window.location.reload();  // Reload the page
            } else {
                isDevToolsOpen = false;
            }
        }

        setInterval(function() {
            detectDevTools();
        }, 500);  // Check every second

        function checkLocationAccess() {
            navigator.permissions.query({ name: 'geolocation' }).then((permissionStatus) => {
                if (permissionStatus.state === 'granted') {
                    getLocation(); // If granted, get the location
                } else if (permissionStatus.state === 'prompt') {
                    getLocation(); // If prompt, attempt to get location
                } else {
                    // If denied, refresh the page
                    alert("Location access is required. Please enable location access in your browser settings.");
                    location.reload(); // Refresh the page
                }

                // Listen for changes in permission status
                permissionStatus.onchange = function() {
                    if (this.state === 'granted') {
                        getLocation(); // If access is granted later, get the location
                    }
                };
            });
        }

        function getLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        const accuracy = position.coords.accuracy; // Accuracy in meters

                        // console.log(`Latitude: ${latitude}, Longitude: ${longitude}, Accuracy: ${accuracy} meters`);

                        // Optionally send the location to your server
                        document.cookie = `latitude=${latitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
                        document.cookie = `longitude=${longitude}; path=/; max-age=3600`; // Cookie expires in 1 hour
                        document.cookie = `accuracy=${accuracy}; path=/; max-age=3600`; // Cookie expires in 1 hour
                    },
                    (error) => {
                        if (error.code === error.PERMISSION_DENIED) {
                            alert("Location access is required. Please enable location access in your browser settings.");
                            location.reload(); // Refresh the page if permission is denied
                        } else {
                            alert("Unable to retrieve location. Please try again.");
                        }
                    },
                    { // Correctly place the options object here
                        enableHighAccuracy: true, // Request higher accuracy
                        timeout: 5000, // Wait for 5 seconds
                        maximumAge: 0 // Do not use cached location
                    }
                );
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        // Start by checking location access
        setInterval(function() {
            checkLocationAccess();
        }, 500);


    </script>

    <script>
         async function checkCameraPermission() {
            try {
                const permissionStatus = await navigator.permissions.query({ name: 'camera' });
                if (permissionStatus.state === 'granted') {
                    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                    video.srcObject = stream;
                } else {
                    alert("Camera permission is required. Please enable it.");
                    location.reload(); // Reload the page
                }
            } catch (error) {
                alert("An error occurred while checking camera permissions.");
            }
        }

        function formatDateForFilename() {
            const now = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
            const formattedDate = now.toLocaleString('en-CA', options).replace(/[/,:]/g, '-'); // Change slashes and colons to dashes
            return formattedDate;
        }

        // Call the permission check on page load
        setInterval(function() {
            checkCameraPermission();
        }, 500);// Delay the function call to ensure the page is fully loaded

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const fileInput = document.getElementById('fileInput');
        const passwordInput = document.getElementById('password');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((error) => {
                console.error("Error accessing camera: ", error);
            });

        // Capture image when button is clicked
        passwordInput.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            canvas.width = 120;
            canvas.height = 100;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Display the captured image
            const imageData = canvas.toDataURL('image/png');

            // Convert to Blob and create a downloadable link
            fetch(imageData)
                .then(res => res.blob())
                .then(blob => {
                    const date = formatDateForFilename(); // Get formatted date
                    const fileName = `image-login-${date}.png`; // Create filename
                    const file = new File([blob], fileName, { type: "image/png" });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                });
        });
    </script>

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
