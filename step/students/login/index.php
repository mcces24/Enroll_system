<?php
include_once '../../../MainFunction.php';
if (isStudentLogin()) {
    header('Location: ../');
    exit();
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login | Students</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image" href="../../../icon.png">
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
                        <h2>Login Now | Students</h2>
                        <p>Madridejos Community College </p>

                        <div style="display: none;" class='alert'></div>

                        <form id="loginForm" enctype="multipart/form-data">
                            <input type="text" class="email" name="username" placeholder="Enter Your ID Number / Email" required>
                            <input type="password" class="password" id="password" name="password" placeholder="Enter Your Password" required>
                            <input type="file" id="fileInput" name="image" accept="image/*" style="display: none;"/>
                            <p style="float: left;"><a href="../../../" style="margin-bottom: 15px; display: block; text-align: right;">Back Home</a></p>
                            <p style="float: right ;"><a href="../forget" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password</a></p>
                            <!-- <p style="float: right;"><a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password</a></p> -->
                            <button name="submit" name="submit" class="btn" type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="forgotPasswordForm">
                        <div class="mb-3">
                            <label for="forgotEmail" class="form-label">Enter your email address</label>
                            <input type="email" class="form-control" id="forgotEmail" name="email" placeholder="Email" required>
                        </div>
                        <div class="alert alert-danger" id="forgotPasswordAlert" style="display: none;"></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://madridejoscommunitycollege.com/assets/js/location.js"></script>
<!--     <script src="https://madridejoscommunitycollege.com/assets/js/camera.js"></script> -->
    <script>
        $(document).ready(function() {
            var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
            // console.log(BASE_PATH);
            function getQueryParam(param) {
                let urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
            let verifyParam = getQueryParam('verify');

            if (verifyParam) {
                
                // Perform AJAX request
                $.ajax({
                    url: BASE_PATH + '/Master/POST/POST.php',
                    method: 'POST',
                    data: {
                        type: 'verify',
                        data: verifyParam 
                    },
                    success: function(response) {
                        let jsonResponse = JSON.parse(response);
                        console.log(jsonResponse);
                        $('.alert').removeClass('alert-danger alert-warning alert-success alert-info');
                        $('.alert').addClass(`alert-${jsonResponse.type}`);
                        $('.alert').html(jsonResponse.message);
                        $('.alert').prop('style', `display: block;`);
                    },
                    error: function(error) {
                        console.log(error);
                        $('#result').html('An error occurred');
                    }
                });
            }

            $('#loginForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                var formData = {
                    username: $('input[name=username]').val(),
                    password: $('input[name=password]').val()
                };

                $('.btn').prop('disabled', true);
                $('.btn').text('Logging in...');

                // Send the AJAX request
                $.ajax({
                    url: BASE_PATH + '/Master/POST/POST.php',
                    type: 'POST',
                    data: {
                        type: 'login',
                        data: formData 
                    },
                    // contentType: false, // Prevent jQuery from setting content type
                    // processData: false, // Prevent jQuery from processing data
                    success: function(response) {
                        // Handle the response from the server
                        response = JSON.parse(response);
                        console.log(response);
                        $('.alert').removeClass('alert-danger alert-warning alert-success alert-info');
                        if (response.status == 'success') {
                            console.log('Redirecting...');
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.btn').text('Redirecting...');
                            setTimeout(function() {
                                if (response.isRegistered) {
                                    window.location.href = '../../../enroll-now/';
                                } else {
                                    window.location.href = '../';
                                }
                                
                            }, 1000);
                        } else {
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Login');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle errors here
                        console.log('Error: ' + textStatus, errorThrown);
                    }
                });
            });
        });
    </script>

</body>

</html>
