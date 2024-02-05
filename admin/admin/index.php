<?php
    session_start();
    

    require '../../database/dbcon.php';
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_EMAIL'];
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

        $querys1 = "SELECT * FROM users WHERE code != '' ORDER BY name LIMIT 1 ";
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

<?php include '../../database/dbcon.php'; ?>
<?php include '../../database/regis.php'; ?>
<?php include '../../database/regis2.php'; ?>
<?php include '../../database/regis3.php'; ?>

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
                                    <?php  include 'dashboard-data.php'; ?>
                            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                           

                    

    			<?php 

                         $select = "SELECT course_code, count(*) as number FROM students INNER JOIN course c on students.course_id=c.course_id INNER JOIN year_lvl y On students.year_id=y.year_id WHERE academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students')  GROUP BY course_code";
                    $results = mysqli_query($conn,$select);
                    ///["King's pawn (e4)", 44],
                    $category = array();
                    while ($data = mysqli_fetch_assoc($results)) {
                        $category[] = "['". $data['course_code']."'," . $data['number'] . "],";
                    }
                ?>
		        <?php   
                $query = "SELECT course_code, count(*) as number FROM students INNER JOIN course c on students.course_id=c.course_id  INNER JOIN year_lvl y On students.year_id=y.year_id WHERE academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students') GROUP BY course_code";  
                 $result09 = mysqli_query($conn, $query);
                 ?>

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
//index.php
require '../../database/dbcon.php';
$rey = "SELECT * FROM students GROUP BY academic ORDER BY academic DESC LIMIT 10";
$result = mysqli_query($conn, $rey);
$chart_data = '';



while($r = mysqli_fetch_array($result))
{
                   require '../../database/dbcon.php';
                        $acad = $r["academic"];
                        $sql1="SELECT * from students WHERE academic = '$acad' AND semester_id = 'First Sem'";
                        $result1=$conn-> query($sql1);
                        $first=0;
                        if ($result1-> num_rows > 0){
                            while ($rs=$result1-> fetch_assoc()) {
                    
                                $first=$first+1;
                               
                            }
                        }

                        $sql1="SELECT * from students WHERE academic = '$acad' AND semester_id = 'Second Sem'";
                        $result1=$conn-> query($sql1);
                        $second=0;
                        if ($result1-> num_rows > 0){
                            while ($rs=$result1-> fetch_assoc()) {
                    
                                $second=$second+1;
                            }
                        }
                        
                        $sql1="SELECT * from students WHERE academic = '$acad' AND semester_id = 'Summer'";
                        $result1=$conn-> query($sql1);
                        $summer=0;
                        if ($result1-> num_rows > 0){
                            while ($rs=$result1-> fetch_assoc()) {
                    
                                $summer=$summer+1;
                            }
                        }

 $chart_data .= "{ academic:'".$acad."', First:".$first.", Second:".$second.", Summer:".$summer."},  ";
}
$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
     <link rel="icon" type="image" href="../../icon.png">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../step/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
    <link rel="stylesheet" href="../../step/assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>ADMIN - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="width: 100%;">
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

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../../step/assets/mcc2.png">
            <a href="index.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="index.php">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Students</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="students/index.php?academic">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                   Enroll Students
                </a>
            	</li>
            </li>
                
            
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">User</li>
            
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="user/index.php?user">
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
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $new_students ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if($code != ''): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="user/index.php?user"
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
                            src="user/uploads/<?php echo $resul['profile'] ?>"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../logout.php">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
            <div class="py-4">
                <!-- start: Summary -->

                <div class="row g-3">
                    <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-12">
                        <div class="card border-0 shadow-sm h-100"> 
                            <div class="card-body">
                               <div class="container" style="width:100%;">
                               <h3 align="center">Total Students Enroll By Academic Year</h3>
                               <br /><br />
                               <div id="chart"></div>
                              </div>
                              <script>
                            Morris.Bar({
                             element : 'chart',
                             data:[<?php echo $chart_data; ?>],
                             xkey:'academic',
                             ykeys:['First', 'Second', 'Summer'],
                             labels:['1st Sem Total Students', '2nd Sem Total Students', 'Summer Class Total Students'],
                             hideHover:'auto',

                            });
                            </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-7 col-xl-7">
                        <div class="card border-0 shadow-sm h-100">
                            
                            <div class="card-body">
                                <h5 align="center">Total Students Enrolled By Course</h5>
                               <br /><br />
                                <div id="barchart">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-5">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 align="center">Total Population Of Students Enrolled By Course</h5>
                               <br /><br />
                                <div id="piechart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Information Technology&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-computer-line summary-icon bg-primary mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsit_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Information Technology&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-computer-line summary-icon bg-indigo mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsit_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Information Technology&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-computer-line summary-icon bg-success mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsit_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Information Technology&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-computer-line summary-icon bg-danger mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsit_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Business Administration Financial Management&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-bank-line summary-icon bg-primary mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsba_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Business Administration Financial Management&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-bank-line  summary-icon bg-indigo mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsba_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Business Administration Financial Management&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-bank-line summary-icon bg-success mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsba_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Business Administration Financial Management&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-bank-line  summary-icon bg-danger mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsba_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Secondary Education - Filipino&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-book-open-line summary-icon bg-primary mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsed_1st?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Secondary Education - Filipino&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-book-open-line summary-icon bg-indigo mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsed_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Secondary Education - Filipino&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-book-open-line summary-icon bg-success mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsed_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Secondary Education - Filipino&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-book-open-line summary-icon bg-danger mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsed_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Elementary Education&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-pencil-ruler-line summary-icon bg-primary mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $beed_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Elementary Education&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-pencil-ruler-line summary-icon bg-indigo mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $beed_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Elementary Education&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-pencil-ruler-line summary-icon bg-success mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $beed_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=Bachelor of Elementary Education&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-pencil-ruler-line summary-icon bg-danger mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $beed_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Hospitality Management&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shirt-line summary-icon bg-primary mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bshm_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Hospitality Management&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shirt-line summary-icon bg-indigo mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bshm_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Hospitality Management&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shirt-line summary-icon bg-success mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bshm_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BS in Hospitality Management&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shirt-line summary-icon bg-danger mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bshm_4th ?></h4>
                        </a>
                    </div>
                </div>
                <!-- end: Summary -->
                <!-- start: Graph -->

                
                <!-- end: Graph -->
            </div>












            <?php endif; ?>
            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 150%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                 <div class="form-group"  style="text-align: center;">

                                <form action="" method="GET">
                                    <div class="input-group">
                                      <div  style="float: left; width: 30%; margin-left: 10%;">
          <?php
            
            $query = "SELECT * FROM academic GROUP BY academic_id ";
            $result = $db->query($query);
            ?>
                        
                        <select style="width: 80%;" style=" text-align: center;" name="academic" id="academic" class="font-weight-bold btn-info btn-sm" required>
                          <option value="<?php if(isset($_GET['academic'])){echo $_GET['academic']; } ?>">Select Academic: <?php if(isset($_GET['academic'])){echo $_GET['academic']; } ?></option>
                            <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {
                                                     echo '<option class="font-weight-bold" value='.$row['academic_start'].'-'.$row['academic_end'].'>'.$row['academic_start'].'-'.$row['academic_end'].'</option>';
                                                    }
                                                    }
                                                    ?>
                        </select>
                    </div>
                                        
                                        <div  style="float: left; width: 30%;">
                              <?php
                                
                                $query = "SELECT * FROM semester GROUP BY semester_id ";
                                $result = $db->query($query);
                                ?>
                        
                        <select style="width: 80%;" name="semester" id="semester" class="font-weight-bold btn-info btn-sm" required>
                          <option value="<?php if(isset($_GET['semester'])){echo $_GET['semester']; } ?>">Select Semester: <?php if(isset($_GET['semester'])){echo $_GET['semester']; } ?></</option>
                            <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {
                                                     echo '<option class="font-weight-bold" value='.$row['semester_name'].'>'.$row['semester_name'].'</option>';
                                                    }
                                                    }
                                                    ?>
                        </select>
                    </div>
                                    <div  style="float: left; width: 20%; ">
                                        <button style="width: 80%;"  type="submit" class="font-weight-bold btn btn-primary btn-sm" >Filter</button>
                                      </div>
                                    </div>
                                    
                                </form>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-4">


                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Total students enrolled by course
                            </div>
                            <div class="card-body">
                               <div class="container" style="width:100%;">
                               <div id="chart"></div>
                              </div>
                              <script>
                            Morris.Bar({
                             element : 'chart',
                             data:[<?php echo $chart_data; ?>],
                             xkey:'academic',
                             ykeys:['First', 'Second', 'Summer'],
                             labels:['1st Sem Total Students', '2nd Sem Total Students', 'Summer Class Total Students'],
                             hideHover:'auto',

                            });
                            </script>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSIT&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsit_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSIT&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsit_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSIT&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsit_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSIT&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>BSIT | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsit_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSBA - FM&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsba_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSBA - FM&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsba_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSBA - FM&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsba_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSBA - FM&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>BSBA | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsba_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSED - Filipino&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bsed_1st?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSED - Filipino&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bsed_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSED - Filipino&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bsed_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSED - Filipino&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>BSED | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bsed_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BEED&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $beed_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BEED&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $beed_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BEED&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $beed_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BEED&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>BEED | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $beed_4th ?></h4>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSHM&year_name=1st Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 1st Year</div>
                            </div>
                            <h4><?php echo $bshm_1st ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSHM&year_name=2nd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 2nd Year</div>
                            </div>
                            <h4><?php echo $bshm_2nd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSHM&year_name=3rd Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 3rd year</div>
                            </div>
                            <h4><?php echo $bshm_3rd ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="students/index.php?course=BSHM&year_name=4th Year"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>BSHM | <?php echo $academic ?> | <?php echo $semester ?> | 4th year</div>
                            </div>
                            <h4><?php echo $bshm_4th ?></h4>
                        </a>
                    </div>
                </div>
                <!-- end: Summary -->
                <!-- start: Graph -->
                
                <!-- end: Graph -->
            </div>
            <?php endif; ?>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../../step/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../step/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../step/assets/js/script.js"></script>
    <!-- end: JS -->


    					<script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawStuff);

                          function drawStuff() {
                            var data = new google.visualization.arrayToDataTable([
                              ['Year Level', 'Total Students'],
                              <?php 
                              foreach ($category as $category){
                                echo $category;
                              }
                                ?>
                                  
                             
                              
                            ]);


                            var options = {

                              title: 'Chess opening moves',
                              
                              legend: { position: 'none' },
                              height: 300,
                              
                              bars: 'vertical', // Required for Material Bar Charts.
                              
                              bar: { groupWidth: "10%" }
                            };

                            var chart = new google.charts.Bar(document.getElementById('barchart'));
                            chart.draw(data, options);
                          };
                        </script>
                        <script type="text/javascript">  
                           google.charts.load('current', {'packages':['corechart']});  
                           google.charts.setOnLoadCallback(drawChart);  
                           function drawChart()  
                           {  
                                var data = google.visualization.arrayToDataTable([  
                                          ['course_code', 'number'],  
                                          <?php  
                                          while($row = mysqli_fetch_array($result09))  
                                          {  
                                               echo "['".$row["course_code"]."', ".$row["number"]."],";  
                                          }  
                                          ?>  
                                     ]);  
                                var options = {  
                                        
                                      is3D:true,  
                                      height: 300,
                                      pieHole: 0.4  
                                     };  
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                                chart.draw(data, options);  
                           }  
                           </script>
</body>

</html>