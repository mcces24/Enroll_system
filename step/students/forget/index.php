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
    <title>Forgot Password | Students</title>
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
                        </div>
                    </div>
                    <div class="content-wthree" style="display: flex; flex-direction: column; justify-content: center;">
                        <h2>Forget Password | Students</h2>
                        <p>Madridejos Community College </p>

                        <div style="display: none;" class='alert'></div>

                        <form id="loginForm">
                            <input type="email" class="email" name="username" id="username" placeholder="Enter Your Email" required>

                            <input type="text" class="email" name="otp_code" id="otp_code" placeholder="Enter OTP" >
                            <input type="hidden" class="email" name="otp_code_verify" id="otp_code_verify">

                            <input type="password" class="password" name="new_password" id="new_password" placeholder="Enter New Password" >
                            <input type="password" class="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password">


                            <p style="float: left;"><a href="../login" style="margin-bottom: 15px; display: block; text-align: right;">Back to login</a></p>
                            <!-- <p style="float: right ;"><a href="" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password</a></p> -->
                            <!-- <p style="float: right;"><a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password</a></p> -->
                            <button name="submit" name="submit" class="btn" type="submit">Forgot</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#otp_code").hide();
            $("#new_password").hide();
            $("#confirm_password").hide();

            $('#loginForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                // Get form data
                var formData = {
                    username: $('input[name=username]').val(),
                    otp_code: $('#otp_code').val(),
                    otp_code_verify: $('#otp_code_verify').val(),
                    new_password: $('input[name=new_password]').val(),
                    confirm_password: $('input[name=confirm_password]').val(),
                };

                $('.btn').prop('disabled', true);
                $('.btn').text('Verifying email...');

                sendAjaxRequest(formData)
            });
        });

        function sendAjaxRequest(formData) {
            var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
            //console.log(formData)
            // Send the AJAX request
            $.ajax({
                url: BASE_PATH + '/Master/POST/POST.php',
                type: 'POST',
                data: {
                    type: 'forgetStudent',
                    data: formData 
                },
                success: function(response) {
                    // Handle the response from the server
                    response = JSON.parse(response);
                    //console.log(response);
                    $('.alert').removeClass('alert-danger alert-warning alert-success alert-info');
                    if (formData.new_password != "" || formData.confirm_password != "") {
                        console.log('test 1');
                        if (formData.new_password == formData.confirm_password) {
                            if (response.status == 'success') {
                                $("#otp_code").hide().val('').prop('required', false);;
                                $("#new_password").show().val('').prop('required', true);
                                $("#confirm_password").show().val('').prop('required', true);
                                $('.alert').addClass(`alert-${response.type}`);
                                $('.alert').html(response.message);
                                $('.alert').prop('style', `display: block;`);
                                $('.btn').prop('disabled', false);
                                $('.btn').text('Change Password');   
                                return true;
                            } else {
                                $("#otp_code").show();
                                $("#new_password").hide().val('');
                                $("#confirm_password").hide().val('');
                                $('.alert').html(response.message);
                                $('.alert').prop('style', `display: block;`);
                                $('.alert').addClass(`alert-${response.type}`);
                                $('.btn').prop('disabled', false);
                                $('.btn').text('Verify OTP');
                                return
                            }
                        } else {
                            $("#otp_code").hide().val('');
                            $("#new_password").show();
                            $("#confirm_password").show();
                            $('.alert').html("Password Not Match");
                            $('.alert').prop('style', `display: block;`);
                            $('.alert').addClass(`alert-danger`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Change Password');
                            return
                        }
                    }
                    if (formData.otp_code != "") {
                        if (response.status == 'success') {
                            $("#otp_code_verify").val(formData.otp_code);
                            $("#otp_code").hide().val('').prop('required', false);;
                            $("#new_password").show().val('').prop('required', true);
                            $("#confirm_password").show().val('').prop('required', true);
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Change Password');   
                            return true;
                        } else {
                            $("#otp_code").show();
                            $("#new_password").hide().val('');
                            $("#confirm_password").hide().val('');
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Verify OTP');
                            return
                        }
                    }

                    if (formData.username != null) {
                        if (response.status == 'success') {
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.btn').text('Sending...');
                            $("#username").prop('disabled', true);
                            formData.sendingOtp = true;
                            formData.sendingEmail = formData.username;
                            formData.username = null;
                            sendAjaxRequest(formData);
                            return true;
                        } else {
                            $("#otp_code").hide().val('');
                            $("#new_password").hide().val('');
                            $("#confirm_password").hide().val('');
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Forgot');
                        }
                    }
                
                    if (formData.sendingOtp) {
                        if (response.status == 'success') {
                            console.log('response', response.message);
                            $("#otp_code").show().val('').prop('required', true);
                            $("#username").hide().val('');
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.btn').text('Verify OTP');
                            $('.btn').prop('disabled', false);
                            formData.sendingOtp = false;
                        } else {
                            $("#otp_code").hide().val('');
                            $("#new_password").hide().val('');
                            $("#confirm_password").hide().val('');
                            $('.alert').html(response.message);
                            $('.alert').prop('style', `display: block;`);
                            $('.alert').addClass(`alert-${response.type}`);
                            $('.btn').prop('disabled', false);
                            $('.btn').text('Verify OTP');
                        }
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('Error: ' + textStatus, errorThrown);
                }
                });
        }

    </script>

</body>

</html>
