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

        $querys1 = "SELECT * FROM users WHERE code !='' ORDER BY name LIMIT 1 ";
        $querys_run1 = mysqli_query ($conn, $querys1);

        $code = '';

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
    <link rel="stylesheet" href="../../../step/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../step/assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Students | Admin - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
     <link rel="icon" type="image" href="../../../icon.png">
    
   
    <script src="sweetalert.js"></script>
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
                <a href="index.php?academic">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                   Enroll Students
                </a>
                </li>
            </li>
                
            
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">User</li>
            
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="../user/index.php?user">
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
                <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
                <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $new_students; ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if($code != ""): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="../user/index.php?user"
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
                            src="../user/uploads/<?php echo $resul['profile'] ?>"
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
                                                    table tr th, table tr td{
                                                        padding: 20px; 
                                                    }
                                                    @media (max-width: 500px) {
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
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Filter Student
                            </div>
                            <div class="card-body" style="">
                                <form action="" method="GET" style="">
                                    <?php 
                                    if(isset($_GET['course']) AND isset($_GET['year_name']))
                                    {

                                     ?>
                                     <style type="text/css">
                                         .mb-3{
                                            float: left;
                                         }
                                         .label{
                                            text-align: center;
                                         }
                                         @media (max-width: 600px){
                                             .mb-3 .btn{
                                               width: 100%;

                                             } 
                                         }
                                     </style>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Course:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-2">
                                            <select name="course" id="course" class="form-control" required>
                                            
                                            <option value="<?php if(isset($_GET['course'])){echo $_GET['course']; } ?>"> Course: <?php if(isset($_GET['course'])){echo $_GET['course']; } ?></option>
                                             <?php echo $course ?>
                                              </select>
                                        </div>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Year Level:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-2">
                                            <select name="year_name" id="year_name" class="form-control" required>
                                            
                                            <option value="<?php if(isset($_GET['year_name'])){echo $_GET['year_name']; } ?>"> Year: <?php if(isset($_GET['year_name'])){echo $_GET['year_name']; } ?></option>
                                             <?php echo $year ?>
                                              </select>
                                        </div>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Section:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-2" >
                                            <input type="text" name="section" required value="<?php if(isset($_GET['section'])){echo $_GET['section']; } ?>" class="form-control" placeholder="Input Section Here.">
                                        </div>
                                        
                                        <div class=" mb-3 col-12 col-md- col-xl-3" >
                                            <button type="submit" class="btn btn-primary float-end col-xl-9" >Search</button>
                                        </div>
                                    
                                           
                                    </form>
                                <form action="" method="GET" style="">
                                    <?php 
                                }
                                    else
                                    {

                                     ?>
                                     <style type="text/css">
                                         .mb-3{
                                            float: left;
                                         }
                                         .label{
                                            text-align: center;
                                         }
                                         @media (max-width: 600px){
                                             .mb-3 .btn{
                                               width: 100%;

                                             } 
                                         }
                                     </style>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Academic:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-3">
                                            <select name="academic" id="academic" class="form-control" required>
                                            
                                            <option value="<?php if(isset($_GET['academic'])){echo $_GET['academic']; } ?>"> Academic: <?php if(isset($_GET['academic'])){echo $_GET['academic']; } ?></option>
                                             <?php echo $academics ?>
                                              </select>
                                        </div>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Semester:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-3" style="float: left; ">
                                            <select name="semester" id="semester" class="form-control" required>
                                            <option value="<?php if(isset($_GET['semester'])){echo $_GET['semester']; } ?>"> Semester: <?php if(isset($_GET['semester'])){echo $_GET['semester']; } ?></option>
                                             <?php echo $semesters ?>
                                              </select>
                                        </div> 
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Course:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-3" >
                                            <select name="course" id="course" class="form-control" required>
                                            <option value="<?php if(isset($_GET['course'])){echo $_GET['course']; } ?>">Course: <?php if(isset($_GET['course'])){echo $_GET['course']; } ?></option>
                                             <?php echo $course ?>
                                              </select>
                                        </div> 
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Year Level:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-3" >
                                            <select name="year" id="year" class="form-control" required>
                                            <option value="<?php if(isset($_GET['year'])){echo $_GET['year']; } ?>">Year: <?php if(isset($_GET['year'])){echo $_GET['year']; } ?></option>
                                             <?php echo $year ?>
                                              </select>
                                        </div>
                                        <div class="label mb-3 col-12 col-md-7 col-xl-1">
                                           <span>Section:</span>
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-3" >
                                            <input type="text" name="section" required value="<?php if(isset($_GET['section'])){echo $_GET['section']; } ?>" class="form-control" placeholder="Input Section Here.">
                                        </div>
                                        <div class=" mb-3 col-12 col-md-7 col-xl-4" >
                                            <button type="submit" class="btn btn-primary float-end col-xl-9" >Search</button>
                                        </div>
                                    <?php } ?>
                                           
                                    </form>
                            </div>
                        </div>
                    </div>
                    <style type="text/css">
                                                    table{
                                                        width: 100%;
                                                    }
                                                    table tr th, table tr td{
                                                        padding: 0px; 
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
                    <?php  
                                if(isset($_GET['academic']) AND isset($_GET['semester']) AND isset($_GET['course']) AND isset($_GET['year']) AND isset($_GET['section'])){?>
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Results
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive" style="text-align: center;">
                                    <h5>OFFICIAL LIST</h5>
                                    <h5><?php if(isset($_GET['semester'])){echo $_GET['semester']; } ?></h5>
                                    <h6><?php if(isset($_GET['academic'])){echo $_GET['academic']; } ?></h6>
                                    <?php if(isset($_GET['course'])){echo $_GET['course']; } ?>
                                    <?php if(isset($_GET['year'])){echo $_GET['year']; } ?> 
                                    <?php if(isset($_GET['section'])){echo $_GET['section']; } ?>
                                            <table class="table-bordered">
                                                <thead>
                                                    <th>Seq No.</th>
                                                    <th>ID Number</th>
                                                   <th>Last Name</th>
                                                   <th>First Name</th>
                                                   <th>Middle Name</th>
                                                   <th>Course</th>
                                                    <th>Year</th>
                                                   <th>Gender</th>
                                                </thead>
                                <?php
                                
                                    $academic = $_GET['academic'];
                                    $semester = $_GET['semester'];
                                    $course = $_GET['course'];
                                    $year = $_GET['year'];
                                    $section = $_GET['section'];
                                    
                                    $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id INNER JOIN sections s ON students.section_id=s.section_id WHERE academic = '$academic' AND semester_id = '$semester' AND course_name = '$course' AND year_name = '$year' AND sections = '$section' ORDER BY gender DESC ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {   
                                            $seq = 0;
                                            
                                            while($student = mysqli_fetch_array($query_run))
                                            {   
                                            
                                               if ($student) {
                                                   $seq=$seq+1;
                                               }
                                               
                                                
                                    ?>
                                                <tbody>
                                                    
                                                        <td><?= $seq;?></td>
                                                        <td><?= $student['id_number'];?></td>
                                                        <td><?= $student['lname'];?></td>
                                                        <td><?= $student['fname'];?></td>
                                                        <td><?= $student['mname'];?></td>
                                                        <td><?= $student['course_code'];?></td>
                                                        <td><?= $student['year_name'];?></td>
                                                        <td><?= $student['gender'];?></td>
                                                    </tr>
                                                </tbody>
                                            
                                        <?php }?>
                                        <br>
                                        <a href="student-list.php?course=<?php echo $course ?>&year_name=<?php echo $year ?>&section=<?php echo $section ?>" class="btn float-end btn-success btn-sm label mb-3 col-12 col-md-7 col-xl-1" target="_blank">Print List</a><?php
                                        
                                          } else 
                                             echo '<tr><td colspan = "8"> No Students Found Please Enter Valid Section</td></tr>';
                                         }?>
                                
                            </table>

                        </div>
                    





                    <?php  
                                if(isset($_GET['course']) AND isset($_GET['year_name'])){?>
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Results
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive" style="text-align: center;">
                                    <h5>OFFICIAL LIST</h5>
                                    <h5><?php echo $semester ?></h5>
                                    <h6><?php echo $academic ?></h6>
                                    <?php if(isset($_GET['course'])){echo $_GET['course']; } ?>
                                    <?php if(isset($_GET['year_name'])){echo $_GET['year_name']; } ?> 
                                    <?php  
                                if(isset($_GET['course']) AND isset($_GET['year_name']) AND isset($_GET['section'])){?>
                                    <?php if(isset($_GET['section'])){echo $_GET['section']; } ?>
                                <?php } ?>
                                            <table class="table-bordered">
                                                <thead>
                                                    <th>Seq No.</th>
                                                    <th>ID Number</th>
                                                   <th>Last Name</th>
                                                   <th>First Name</th>
                                                   <th>Middle Name</th>
                                                   <th>Course</th>
                                                    <th>Year</th>
                                                   <th>Gender</th>
                                                </thead>
                                <?php
                                
                                    
                                    $course = $_GET['course'];
                                    $year_name = $_GET['year_name'];
                                 
                                if(isset($_GET['course']) AND isset($_GET['year_name']) AND isset($_GET['section'])){
                                    $section = $_GET['section'];
                                 }
                                     if(isset($_GET['course']) AND isset($_GET['year_name']) AND isset($_GET['section'])){
                                    $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id INNER JOIN sections s ON students.section_id=s.section_id WHERE academic = '$academic' AND semester_id = '$semester' AND course_name = '$course' AND year_name = '$year_name' AND sections = '$section' ORDER BY gender DESC ";
                                        $query_run = mysqli_query($conn, $query);
                                        } 
                                        else{
                                            $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id INNER JOIN sections s ON students.section_id=s.section_id WHERE academic = '$academic' AND semester_id = '$semester' AND course_name = '$course' AND year_name = '$year_name'  ORDER BY gender DESC ";
                                        }
                                        
                                        $query_run = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {   
                                            $seq = 0;
                                            
                                            while($student = mysqli_fetch_array($query_run))
                                            {   
                                            
                                               if ($student) {
                                                   $seq=$seq+1;
                                               }
                                               
                                                
                                    ?>
                                                <tbody>
                                                    <tr> 
                                                        <td><?= $seq;?></td>
                                                        <td><?= $student['id_number'];?></td>
                                                        <td><?= $student['lname'];?></td>
                                                        <td><?= $student['fname'];?></td>
                                                        <td><?= $student['mname'];?></td>
                                                        <td><?= $student['course_code'];?></td>
                                                        <td><?= $student['year_name'];?></td>
                                                        <td><?= $student['gender'];?></td>
                                                    </tr>
                                                </tbody>

                                                
                                        <?php }?>
                                        <br>
                                        <a href="student-list.php?course=<?php echo $course ?>&year_name=<?php echo $year_name ?>&section=<?php echo $section ?>" class="btn float-end btn-success btn-sm label mb-3 col-12 col-md-7 col-xl-1" target="_blank">Print List</a>
                                         <?php } else 
                                             echo '<tr><td colspan = "8"> No Students Found Please Enter Valid Section</td></tr>';
                                         }?>


                                
                            </table>
                        </div>
                    
                            </div>
                        </div>
                    </div>
                </div>



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


    <!-- end: JS -->

</body>

</html>