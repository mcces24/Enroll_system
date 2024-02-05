<?php
    session_start();
    require '../../../database/config.php';

    if (!isset($_SESSION['SESSION_REGISTRAR'])) {
        header("Location: ../login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_REGISTRAR'];
}
?>
<?php


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
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Old Students | Registrar Office - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
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
    
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2" style="margin-left: -260px;">
            <!-- start: Navbar -->
            
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
                <div class="row g-3 mt-2" style="left: 0px;">
                    
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
                                                    @media print{
                                                        @page{
                                                            size: landscape;
                                                        }
                                                        body{
                                                            size: A4;
                                                        }
                                                        .card{
                                                            margin-top: -50px;
                                                        }
                                                    }

                                                </style>
                    
                    





                    <?php  
                                if(isset($_GET['course']) AND isset($_GET['year_name'])){?>
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0">
                            <div style="height: 100%; margin: 0 auto;">
                                <img src="mcc-back.png">
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
                                                
                                        <?php }
                                        
                                          } else 
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
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>


    <!-- end: JS -->

</body>

</html>

<script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function(){ window.close() },750)
    });
</script>