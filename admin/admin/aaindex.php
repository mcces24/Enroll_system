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
 require '../../database/regis.php'; 
 require '../../database/regis2.php';
 require '../../database/regis3.php'; 
 $query = "SELECT course_name, count(*) as number FROM students INNER JOIN course c ON students.course_id = c.course_id GROUP BY course_name";  
 $result = mysqli_query($connect, $query);  

 require '../../database/regis.php'; 
 $query1 = "SELECT year_name, count(*) as number FROM students INNER JOIN year_lvl y on students.year_id=y.year_id GROUP BY year_name";  
 $result1 = mysqli_query($connect, $query1);  
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

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   
   

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css">

    <title>Dashboard</title> 
    <script type="text/javascript" src="chart.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['course_name', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["course_name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Visual Graph of Students per Department',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['year_name', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["year_name"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Visual Graph of Students per Year Level',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           </script>
           <style type="text/css">
               #chart {
                display: flex;
                align-content: center;
                justify-content: center;
               }
               #chart div{
                align-items: center;
               }
           </style>
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
    <nav>
        
            <div class="logo-name">
            <div class="logo-image">
                <img src="Images/MCC22.png" alt="">
            </div>

            
        </div>

        

        <div class="menu-items" style=" position: static;">
           <ul class="nav-links" style="position: relative;">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="user/index.php">
                    <i class="uil uil-user-plus"></i>
                    <span class="link-name">Portal Users</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode" style=" position: absolute ; bottom: 0px;">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                
                <div class="mode-toggle">
                  
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
                
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                        <?php $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end"; ?>
                        <i class="uil uil-user" style="font-size: 50px;"></i>
                        <span class="text">Total New Students Enroll | <?php  echo $semester = $rows111['semester_name'];?> | <?php  echo $academic;?>   </span>
                        <span class="number">
                        <?php
                        $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  WHERE status_type='Enroll New Students' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    
                    
                    </span>
                <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                        <i class="uil uil-user" style="font-size: 50px;"></i>
                        <span class="text">Pre Enrollment Not Available </span>
                    <?php endif; ?>
                    </div>
                    <div class="box box2">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                        <i class="uil uil-users-alt" style="font-size: 50px;"></i>
                        <span class="text">Total Students Enroll | <?php  echo $semester = $rows111['semester_name'];?> | <?php  echo $academic;?></span>
                        <span class="number">
                        <?php
                        $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students WHERE status_type='Enroll New Students' OR status_type='Enroll Old Students' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    </span>
                    
                    <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                        <i class="uil uil-users-alt" style="font-size: 50px;"></i>
                        <span class="text">Pre Enrollment Not Available </span>
                    <?php endif; ?>
                    </div>
                    <div class="box box3">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                        <i class="uil uil-book-reader" style="font-size: 50px;"></i>
                        <span class="text">Total Applicant | <?php  echo $semester = $rows111['semester_name'];?> | <?php  echo $academic;?></span>
                        <span class="number">
                            <?php
                            $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students where type= 'New' OR type= 'Transferee' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                            
                        </span>
                        <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                        <i class="uil uil-book-reader" style="font-size: 50px;"></i>
                        <span class="text">Pre Enrollment Not Available </span>
                    <?php endif; ?>
                    </div>
                </div>
                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                <div class="dash-content">
                    <div class="boxes overview" id="chart">
                <div  class="box box"  style="width: 48%; height: 500px;x margin: 0 auto;">
                    <span style="font-size: 20px; font-style: oblique;">DEPARTMENT POPULATION</span>
                    <div id="piechart" style="width: 100%; height: 100%; margin: 0 auto;">
                </div>
            </div>
            
            <div class="box box3" style="width: 48%; height: 500px; margin: 0 auto;" >
                <span style="font-size: 20px; font-style: oblique;">YEAR LEVEL POPULATION</span>
                <div id="piechart1" style="width: 100%; height: 100%; margin: 0 auto;">
                </div>
            </div>   
            </div>
            </div>
            <?php endif; ?>
            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
        </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">List of Students</span>
                </div>

                
      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        
                        <table id="Mytableid" class="data-title" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th width="10%">ID Number</th>
                                    <th width="20%">Name</th>
                                    <th width="30%">Course</th>
                                    <th width="10%">Year Level</th>
                                    <th width="10%">Section</th>
                                    <th width="20%">Gender</th>
                                </tr>
                            </thead>
                            <tbody class="data-list">
                                <?php 
                                $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                                    $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id = y.year_id INNER JOIN sections s ON students.section_id = s.section_id WHERE status_type = 'Enroll Old Students' OR status_type = 'Enroll New Students' AND academic = '$academic' AND semester_id = '$semester' ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['id_number']; ?></td>
                                                <td style="text-align:left;"><?= $student['fname'];?> <?= $student['mname'];?> <?= $student['lname'];?></td>
                                                <td><?= $student['course_name']; ?></td>
                                                <td><?= $student['year_name']; ?></td>
                                                <td><?= $student['sections']; ?></td>
                                                <td><?= $student['gender']; ?></td>
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
                        <?php endif; ?>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable();
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

                
            </div>
        
    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

