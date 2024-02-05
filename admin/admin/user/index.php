
<?php
    session_start();
    

    require '../../../database/dbcon.php';
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_EMAIL'];
}



include_once '../../../database/database_connection.php';

$course = '';
$query = "SELECT DISTINCT course_name FROM course ORDER BY course_name DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $course .= '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';
}

?>
<?php

include_once '../../../database/database_connection.php';

$semesters = '';
$query = "SELECT DISTINCT semester_name FROM semester ORDER BY semester_name ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $semesters .= '<option value="'.$row['semester_name'].'">'.$row['semester_name'].'</option>';
}

?>
<?php

include_once '../../../database/database_connection.php';

$academics = '';
$query = "SELECT DISTINCT academic_start, academic_end FROM academic ORDER BY status DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $academics .= '<option value="'.$row['academic_start'].'-'.$row['academic_end'].'">'.$row['academic_start'].'-'.$row['academic_end'].'</option>';
}

?>
<?php

include_once '../../../database/database_connection.php';

$year = '';
$query = "SELECT DISTINCT year_name FROM year_lvl ORDER BY year_name ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $year .= '<option value="'.$row['year_name'].'">'.$row['year_name'].'</option>';
}

?>
<?php
                                
        require '../../../database/config.php';

        $querys1 = "SELECT * FROM users WHERE code != '' ORDER BY name LIMIT 2 ";
        $querys_run1 = mysqli_query ($conn, $querys1);

        $code = 0;

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $pass)
               $code = $pass['code'];
                ?>
            <?php
        }
                                
        ?>

        <?php
                                
        require '../../../database/config.php';

        $querys1 = "SELECT * FROM students WHERE status_type = 'Old Students' GROUP BY id_number DESC LIMIT 1";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $old_applicant)
               $old = $old_applicant['id_number'];
                ?>
            <?php
        }
                                
        ?>

<?php
                        
                            
                            $query = "SELECT * FROM academic WHERE status='1' order by academic_id desc ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?><?php
                            }
                            else

                        
?>

        <?php
                                
        require '../../../database/config.php';

        $querys = "SELECT * FROM academic GROUP BY status";
        $querys_run = mysqli_query ($conn, $querys);

        if (mysqli_num_rows($querys_run)>0) {
            
            foreach($querys_run as $rows)
                ?><?php
        }
                                
        ?>
        <?php
                                
        require '../../../database/config.php';

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $rows1)
                ?><?php
        }
                                
        ?>
        <?php
                                
                                    require '../../../database/config.php';

                                    $querys11 = "SELECT * FROM academic WHERE status='1'";
                                    $querys_run11 = mysqli_query ($conn, $querys11);

                                    if (mysqli_num_rows($querys_run11)>0) {
                                        
                                        foreach($querys_run11 as $rows11)
                                            ?><?php
                                    }
                                                            
                                    ?>
                                    <?php
                                                            
                                    require '../../../database/config.php';
                                    $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
                                    $querys_run111 = mysqli_query ($conn, $querys111);

                                    if (mysqli_num_rows($querys_run111)>0) {
                                        foreach($querys_run111 as $rows111)
                                            ?><?php
                                    }
                                                            
                                    ?>
                                    <?php  include '../dashboard-data.php'; ?>
                            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 

		        <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
					 <?php  
					 	$count_not = 0;
					 	$count_fail = 0;
					 	$count_new = 0;
					 	$count = 0;
					 ?>
					<?php endif; ?>


                    <?php
                      
                        require '../../../database/dbcon.php';
                            
                            $query = "SELECT * FROM system  ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?><?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
?>
<?php 

if (isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                        require '../../../database/dbcon.php';
                            
                            $query = "SELECT * FROM users WHERE username='{$email}' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $e_mail = mysqli_fetch_array($query_run);
                                ?><?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
             } 

     ?>

<?php



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include '../../../database/config.php';
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE username='{$email}'");

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

                

                $password = $e_mail['password'];
                 $username = $e_mail['username'];
                  $role = $e_mail['role'];
                   $name = $e_mail['name'];
                $link = "$domain/admin/change-password.php?reset=$code";
                $mail->Body    = "Hi $name! 
                                <p>Here is your Password or New Password for $role</p>
                                <p>Username: $username</p>
                                <p>Password: $password</p>

                                <p>Thank You! If the new password does't work. Please contact School President.</p>
                ";

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
     <link rel="icon" type="image" href="../../../icon.png">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../../step/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../step/assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>User | Admin - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body style="width: 100%;">
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

  

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../../../step/assets/mcc2.png">
            <a href="index.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="../index.php">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Students</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="../students/index.php?academic">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                   Enroll Students
                </a>
                </li>
            </li>
                
            
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">User</li>
            
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="index.php?user">
                    <i class="ri-settings-3-line sidebar-menu-item-icon"></i>
                  User Setting
                </a>
                </li>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">User | Staff</h5>
                <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $new_students; ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if($code != ''): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="index.php?users"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Forgot Password Request</div>
                                    <span class="fs-7">User Forget Passwword : <?php echo $pass['username'] ?></span>
                                    <span class="fs-7">From : <?php echo $pass['role'] ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $new_students; ?></span>
                            </a>
                        </div>
                        <?php else: ?>
                        <h5 class="p-3 bg-indigo text-light">No Notification</h5>
                        <?php endif; ?>
                    </div>
                <div class="dropdown me-3 d-none d-sm-block">
                    
                    
                </div>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php 
                            $sel = "SELECT * FROM admin";
                            $query = mysqli_query($conn,$sel);
                            $resul = mysqli_fetch_assoc($query);
                        ?>
                        <span class="me-2 d-none d-sm-block"><?php echo $resul['name'] ?></span>
                        <img class="navbar-profile-image"
                            src="uploads/<?php echo $resul['profile'] ?>"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../../logout.php">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
           
            <div class="py-4">
                                             <style type="text/css">
                                                    table thead tr th, table tbody tr td{
                                                        padding: 5px; 
                                                    }
                                                    @media (max-width: 500px) {
                                                        table thead tr th, table tbody tr td{
                                                        font-size: 15px;
                                                        padding: 0px;
                                                    }
                                                    .card-body table .btn{
                                                        font-size: 15px;
                                                    }
                                                    .card-header .btn{
                                                        font-size: 15px;
                                                    }
                                                    }

                                                </style>
                <!-- start: Summary -->
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               List Of User
                               <a href="#edit1_" class="btn btn-success btn-sm float-end" data-bs-toggle="modal"> Add New User</a>
                            </div>
                            <div class="card-body" style="">
                                <div class="table-responsive">
                                    

                                     
                                     <table class="" id="Mytableid" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                    <th>Picture</th>
                                </tr>
                            </thead>
                            <tbody class="data-list">
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($row = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            <tr style="text-align: center;">
                                             
                                                <td>
                                                        <?php if($row['profile'] != ""): ?>
                                                        <img src="uploads/<?php echo $row['profile']; ?>" width="50px" height="50px" style="border-radius: 50%;">
                                                       <?php else: ?>
                                                    
                                                        <?php endif; ?>
                                                    </td>
                                                <td style="text-align:left"><?= $row['name']; ?></td>
                                                <td ><?= $row['role']; ?></td>
                                                <td ><?= $row['username']; ?></td>
                                                <td><a href="#view_<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-eye-line "></i></a></td>
                                                <td>
                                                    
                                                    <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"><i class="ri-edit-2-line "></i> </a>
                                                    <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal"> <i class="ri-delete-bin-line "></i> </a>
                                                    <?php  
                                                        $code = $row['code'];
                                                    ?>
                                                    <?php if ($code != ''): ?>
                                                        <form action="" method="post">
                                                        <input type="hidden" name="email" value="<?php echo $row['username']; ?>">
                                                        
                                                            
                                                        <button name="submit" class="btn btn-info btn-sm" type="submit"><i class="ri-mail-send-line "></i></button></form>
                                                        
                                                    <?php endif ?>
                                                </td>
                                                <td><a href="#id_<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"><i class="ri-camera-line "></i></a><td>

                                                <?php include('edit_delete_modal.php'); ?>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                                        
                                   
                                           
                                    </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Admin
                            </div>
                            <div class="card-body" style="">
                                <div class="table-responsive">
                                    

                                     
                                     <table class="" id="Mytableid" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="data-list">
                                <?php 
                                    $query = "SELECT * FROM admin";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($row1 = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            <tr style="text-align: center;">
                                             
                                                <td>
                                                        <?php if($row1['profile'] != ""): ?>
                                                        <img src="uploads/<?php echo $row1['profile']; ?>" width="50px" height="50px" style="border-radius: 50%;">
                                                       <?php else: ?>
                                                    
                                                        <?php endif; ?>
                                                    </td>
                                                <td style="text-align:left"><?= $row1['name']; ?></td>
                                                <td ><?= $row1['email']; ?></td>
                                                
                                                <td><a href="#viewadmin_<?php echo $row1['id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-eye-line "></i></a></td>
                                                
                                                <td><a href="#idadmin_<?php echo $row1['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"><i class="ri-camera-line "></i></a><td>

                                                <?php include('edit_delete_modal.php'); ?>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                                        
                                   
                                           
                                    </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <style type="text/css">
                                                    table{
                                                        width: 100%;
                                                    }
                                                    table tr th, table tr td{
                                                        padding: 20px; 
                                                    }
                                                    @media (max-width: 600px) {
                                                        table tr th, table tr td{
                                                        font-size: 15px;
                                                        padding: 10px;
                                                    }
                                                    .card-body table .btn{
                                                        font-size: 15px;
                                                    }
                                                    .card-header .btn{
                                                        font-size: 15px;
                                                    }
                                                    table tr th, table tr td {
                                                        font-size: 12px;
                                                    }
                                                    }

                                                </style>
                   
                    



                <!-- end: Graph -->
            </div>
            
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../../../step/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../../step/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../step/assets/js/script.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable();
                            });
                        </script>

    <!-- end: JS -->

</body>

</html>