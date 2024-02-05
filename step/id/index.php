<?php
    session_start();
    require '../../database/config.php';

    if (!isset($_SESSION['SESSION_ID'])) {
        header("Location: login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_ID'];
}
?>
<?php
                              
        require '../../database/config.php';

        $querys1 = "SELECT * FROM students WHERE status_type = 'Enroll' GROUP BY applicant_id DESC LIMIT 1";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $new_applicant)
               $new = $new_applicant['applicant_id'];
                ?>
            <?php
        }
                                
        ?>

        <?php
                                
        require '../../database/config.php';

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
                            
                        
?>

        <?php
                                
        require '../../database/config.php';

        $querys = "SELECT * FROM academic GROUP BY status";
        $querys_run = mysqli_query ($conn, $querys);

        if (mysqli_num_rows($querys_run)>0) {
            
            foreach($querys_run as $rows)
                ?><?php
        }
                                
        ?>
        <?php
                                
        require '../../database/config.php';

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $rows1)
                ?><?php
        }
                                
        ?>
        <?php
                                
                                    require '../../database/config.php';

                                    $querys11 = "SELECT * FROM academic WHERE status='1'";
                                    $querys_run11 = mysqli_query ($conn, $querys11);

                                    if (mysqli_num_rows($querys_run11)>0) {
                                        
                                        foreach($querys_run11 as $rows11)
                                            ?><?php
                                    }
                                                            
                                    ?>
                                    <?php
                                                            
                                    require '../../database/config.php';
                                    $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
                                    $querys_run111 = mysqli_query ($conn, $querys111);

                                    if (mysqli_num_rows($querys_run111)>0) {
                                        foreach($querys_run111 as $rows111)
                                            ?><?php
                                    }
                                                            
                                    ?>
                                    
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
                                
        require '../../database/config.php';
    


        $querys = "SELECT * FROM academic GROUP BY status";
        $querys_run = mysqli_query ($conn, $querys);

        if (mysqli_num_rows($querys_run)>0) {
            
            foreach($querys_run as $rows12)
                ?><?php
        }
                                
        ?>
        <?php
                                
        require '../../database/config.php';
        

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $rows112)
                ?><?php
        }
                                
        ?>

                <?php
                                
        require '../../database/config.php';
        

        $querys11 = "SELECT * FROM academic WHERE status='1'";
        $querys_run11 = mysqli_query ($conn, $querys11);

        if (mysqli_num_rows($querys_run11)>0) {
            
            foreach($querys_run11 as $rows11)
                ?><?php
        }
                                
        ?>
        <?php
                                
        require '../../database/config.php';
        
        $querys111 = "SELECT * FROM semester WHERE sem_status='1'";
        $querys_run111 = mysqli_query ($conn, $querys111);

        if (mysqli_num_rows($querys_run111)>0) {
            foreach($querys_run111 as $rows111)
                ?><?php
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
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <link rel="icon" type="image" href="../../icon.png">
    <!-- end: CSS -->
    <title>New Students | ID Section - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css">
    <script src="sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
<script type="text/javascript" src="asset/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/jquery.signature.css">
  
    <style>
        .kbw-signature { width: 400px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>


</head>

<body style="width: 100%;">
     <?php include('messages.php'); ?>
    
	<div class="loader-wrapper" id="preloader">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
   <link rel="stylesheet" type="text/css" href="../../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
          loader.style.display = "none"
        }) 
    </script>	


    <?php include('edit_delete_modal.php'); ?>  

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../assets/mcc2.png">
            <a href="index.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">ID Section</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
             <hr style="color: ghostwhite;">
        <?php
            $username = $_SESSION['SESSION_ID'];
            $sel = "SELECT * FROM users WHERE role='ID Section' AND online = '1' AND username = '$username'";
            $query = mysqli_query($conn,$sel);
            $resul = mysqli_fetch_assoc($query);
        ?>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Profile</li>
            <div class="sidebar-user text-center">
                <img class="img-90 rounded-circle" src="../../admin/admin/user/uploads/<?php echo $resul['profile'] ?>" alt="">
                  <h6 class="mt-3 f-14 f-w-600"><?php echo $resul['name'] ?></h6>
                <p class="mb-0 font-roboto"><?php echo $resul['department'] ?></p>
                <br>
                <ul>
                    <li><span><span class="counter">Status
                    <p><?php echo $resul['status'] ?></p>
                  </li>
                  <li><span>
                        <span class="counter">Details
                            <p><?php echo $resul['address'] ?> | <?php echo $resul['contact'] ?></p>
                        </span>
                    </span>
                  </li>
                </ul>
              </div>
          <hr style="color: ghostwhite;">

            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Students</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="index.php">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                    New Students
                </a>
                </li>
            </li>
            
            
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="old-students/index.php">
                    <i class="ri-user-3-line sidebar-menu-item-icon"></i>
                    Old Students
                </a>
                </li>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">System</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="login/logout.php?id=<?php echo $resul['id'] ?>">
                    <i class="ri-logout-box-line sidebar-menu-item-icon"></i>
                    Logout
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
                <h5 class="fw-bold mb-0 me-auto">New Students</h5>
                
                    
                    
                
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
           
            <div class="py-4">
                                             <style type="text/css">
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
                                                    }

                                                </style>
                <!-- start: Summary -->
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-5 col-xl-6">
                    <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Applicant
                            </div>
                            <div class="card-body">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3 search-box">
                                        <input  type="text" autocomplete="off" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Input ID Number Here!">
                                        <div class="result"></div>
                                        <button  type="submit" class="btn btn-primary" >Search Applicant</button>
                                    </div>      
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Queuing
                            </div>
                            <div class="card-body">
                                   
                                        <?php 
                                        $date_created = date("Y/m/d");
                                        $query = "SELECT * FROM que WHERE status = '2' AND date_created = '$date_created' ORDER BY id asc LIMIT 1  ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                ?> 
                                                    
                                                    <div id="wrapper">
                                                        <div class="input-group" >
                                                            <input type="text" name="search"  value="Priority No: <?= $student['que_number']; ?>" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                            <textarea hidden  id="content"> Attention priority number <?= $student['que_number']; ?>. Please proceed to ID Office. Attention priority number <?= $student['que_number']; ?>. Please proceed to ID Office. Thank you!</textarea>
                                                            
                                                    <button style="width: 20%;" id="btnArea" class="btn btn-success btn-sm">Call Now</button>
                                                        </div>
                                                        
                                                        <script>
                                                            const content = document.getElementById("content");
                                                            const btnArea = document.getElementById("btnArea");


                                                            btnArea.addEventListener("click", () => {
                                                            var audio = new Audio('audio.mp3');
                                                                audio.play();
                                                                const myInterval = setInterval(myTimer, 1000);
                                                                 
                                                             function myTimer() {
                                                                  var voices = speechSynthesis.getVoices();
                                                                const utterance = new SpeechSynthesisUtterance(content.value);
                                                                utterance.lang = "en-GB";
                                                                window.speechSynthesis.speak(utterance);
                                                                clearInterval(myInterval);
                                                                }
                                                                    });

                                                        </script>
                                                        
                                                        
                                                    </div>
                                                    <?php  
                                                    $date_created = date("Y/m/d");
                                                    $next = $student['que_number'];
                                                    $query1 = "SELECT * FROM que WHERE status = '2' AND date_created = '$date_created' AND que_number != '$next' ORDER BY id asc LIMIT 1  ";
                                        $query_run1 = mysqli_query($conn, $query1);

                                        if(mysqli_num_rows($query_run1) > 0)
                                        {
                                            foreach($query_run1 as $student1)
                                            {
                                                ?> 

                                                 
                                                 <br>
    
                                                                                                     <div id="wrapper">
                                                        <div class="input-group" >
                                                            <input type="text" name="search"  value="Priority No: <?= $student1['que_number']; ?>" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                            <textarea hidden  id="content1"> Attention priority number <?= $student1['que_number']; ?>. Please proceed to ID Office. Attention priority number <?= $student['que_number']; ?>. Please proceed to ID Office. Thank you!</textarea>
                                                            
                                                    <button style="width: 20%;" id="btnArea1" class="btn btn-success btn-sm">Call Next</button>
                                                        </div>
                                                        
                                                        <script>
                                                            const content1 = document.getElementById("content1");
                                                            const btnArea1 = document.getElementById("btnArea1");


                                                            btnArea1.addEventListener("click", () => {
                                                            var audio = new Audio('audio.mp3');
                                                                audio.play();
                                                                const myInterval = setInterval(myTimer, 1000);
                                                                 
                                                             function myTimer() {
                                                                  var voices = speechSynthesis.getVoices();
                                                                const utterance = new SpeechSynthesisUtterance(content1.value);
                                                                utterance.lang = "en-GB";
                                                                window.speechSynthesis.speak(utterance);
                                                                clearInterval(myInterval);
                                                                }
                                                                    });

                                                        </script>
                                                        
                                                        
                                                    </div>
                                                <?php
                                                 }
                                                }
                                                else{?>
                                                    <br>
                                                    <input type="text" name="search"  value="No Priority Number on Que" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                <?php
                                                }
                                                 ?> 
                                                 <?php
                                                 }
                                                }
                                                else{?>
                                                    <input type="text" name="search"  value="No Priority Number on Que" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                <?php
                                                }
                                                 ?>
                                                
                                              
                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Results
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                                
                             
                        <table >
                            
                            
                            
                                <?php 

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];

                                        $start = $rows11['academic_start'];
                                        $end = $rows11['academic_end'];
                                        $semester = $rows111['semester_name'];
                                       
                                        $academic = "$start-$end";

                                        $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id = y.year_id INNER JOIN sections s ON students.section_id = s.section_id WHERE academic = '$academic' AND semester_id = '$semester' AND (status_type = 'ID Done' OR status_type = 'New Students' OR status_type = 'Picture Done' OR status_type = 'Enroll New Students')  AND CONCAT(id_number) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                $id=$student['id'];
                                                $id_number=$student['id_number'];
                                                $query1 = "SELECT * FROM qrcode WHERE student_id = '$id_number'  ";
                            $query_run1 = mysqli_query($conn, $query1);

                            if(mysqli_num_rows($query_run1) > 0)
                            {
                                $qrcode = mysqli_fetch_array($query_run1);
                                ?><?php
                            }
                              ?>
                                                                       
                        
                                                    
                                                
                                                   
                                                
                                                
                                                <form method="post" action="qrcode.php" >
                                                    <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Name</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['lname'] ?>, <?php echo $student['fname'] ?> <?php echo $student['mname'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Gender</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['gender'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>ID Number</span></label>
                                                        <p style="width: 90%;color: red;" class="form-control"><?php echo $student['id_number'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Course</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['course_name'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Year Level</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['year_name'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Section</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['sections'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>QR Code</span></label>
                                                        <p style="width: 90%; text-align: center;" class="form-control">
                                                            <?php if($student['status_type'] == "New Students"): ?>

                                                      <input type="submit" name="sbt-btn" value="Generate QR Code" class="btn btn-success btn-sm" />
                                                    <?php endif; ?>
                                                <?php if($student['status_type'] == "ID Done" OR $student['status_type'] == "Picture Done" OR $student['status_type'] == "Enroll New Students"): ?>
                                                        <img width="150px" src="images/<?php echo $qrcode['qrimage']; ?>">
                                                    <?php endif; ?>
                                                    </div>
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Picture</span></label>
                                                        <p style="width: 90%; text-align: center;" class="form-control"><?php if($student['status_type'] == "ID Done"): ?>
                                                     <a href="#id_<?php echo $student['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Upload Image</a>
                                                     <?php else: ?>
                                                    <?php endif; ?>
                                                        <?php if($student['status_type'] == "Picture Done" OR $student['status_type'] == "Enroll New Students"): ?>
                                                        <img src="uploads/<?php echo $qrcode['picture']; ?>" width="150px" height="150px" style="border:1px solid #333333;">
                                                       <?php endif;?>
                                                    </p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Signature</span></label>
                                                        <p  style="width: 90%; text-align: center; " class="form-control">
                                                        <?php if($student['status_type'] == "Picture Done"): ?>
                                                     

                                                     <a href="signature.php?id=<?php echo $student['id']; ?>&id_number=<?php echo $filtervalues ?>" class="btn btn-info btn-sm"> Signature</a>
                                                   
                                                     <?php endif; ?>
                                                     <?php if($student['status_type'] == "Enroll New Students"): ?>
                                                        <img style="border: 1px solid black;" width="250px" height="150px" src="upload/<?php echo $qrcode['signature']; ?>">
                                                        <?php endif;?>
                                                    </p>
                                                    </div>
                                                </div>


                                               
                                                   
                                                   <tr style="text-align: center;">
                                                

                                                <td><span hidden></span></td>
                                                <td width="100%"> 
                                                     

                                                     <?php if($student['status_type'] == "New Students" OR $student['status_type'] == "Picture Done" OR $student['status_type'] == "ID Done" OR $student['status_type'] == "Enroll New Students"): ?>
                                                      <a href="print_temp_id/temp_id.php?id=<?= $student['id']; ?>"  data-toggle="modal "  target="_blank" class="btn btn-sm btn-success" >Print Temporary ID</a>
                                                      
                                                      <?php endif; ?>
                                                      <?php if($student['status_type'] == "Picture Done" OR $student['status_type'] == "ID Done" OR $student['status_type'] == "Enroll New Students"): ?>
                                                      <a href="#id_<?php echo $student['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update Image</a>
                                                       <?php endif; ?>

                                                      <?php if($student['status_type'] == "Enroll New Students"): ?>
                                                     <a href="print_id/id.php?id_number=<?= $student['id_number']; ?>"  data-toggle="modal "  target="_blank" class="btn btn-sm btn-success" >Print School ID</a>
                                                    <?php endif; ?>
                                                    </td>
                                                    
                                                </tr>
                                                
                                                 
                                                 

                                                
                                                <input type="hidden" name="student_id" value="<?= $student['id'];?>">
                                                <input type="hidden" name="id_number" value="<?= $student['id_number'];?>">
                                                <input type="hidden" name="fname" value="<?= $student['fname'];?>">
                                                <input type="hidden" name="mname" value="<?= $student['mname'];?>">
                                                <input type="hidden" name="lname" value="<?= $student['lname'];?>">
                                                <input type="hidden" name="address" value="<?= $student['address'];?>">
                                                <input type="hidden" name="guardian" value="<?= $student['guardian'];?>">
                                                <input type="hidden" name="guardian_address" value="<?= $student['guardian_address'];?>">
                                                <input type="hidden" name="contact" value="<?= $student['contact'];?>">
                                                <input type="hidden" name="email" value="<?= $student['email'];?>">
                                                <input type="hidden" name="status_type" value="ID Done">
                                                

                                           
                                                
                                                </form>
                                                <?php include('edit_delete_modal.php'); ?>

                                                
                                              
                                                
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="6" style="text-align:center;">No ID Number Found!!</td>
                                                </tr>
                                                
                                            <?php
                                        }
                                    }

                                ?>

                                

                                
                            
                        </table>
                        
                    

                        <?php else: ?>
                       
                        <h2>Pre-Enrollemnt is currently not Available</h2>
                        <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <br>

                



                <!-- end: Graph -->
            </div>
            <!-- end: Content -->
        </div>
    </main>


    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>


    <!-- end: JS -->

</body>

</html>