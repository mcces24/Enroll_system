    <?php
    session_start();
    require '../../../database/config.php';

    if (!isset($_SESSION['SESSION_GUIDANCE'])) {
        header("Location: ../login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_GUIDANCE'];
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
                            <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                            <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        
                    ?>
                    <?php
                                    $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count_accept=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count_accept=$count_accept+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  WHERE status_type='Enroll New Students' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count_new=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count_new=$count_new+1;
                            }
                        }
                        
                    ?>

                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students INNER JOIN admission_score a ON students.applicant_id = a.applicant_id  WHERE total_cat='Low Average'  AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count_fail=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $count_fail=$count_fail+1;
                            }
                        }
                        
                    ?>
                    <?php
                        			$start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                        $sql="SELECT * from students  WHERE status_type='Applicant'  AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count_not=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    			
                                $count_not=$count_not+1;
                            }
                        }
                        
                    ?>

    			<?php 

			             $select = "SELECT total_cat, count(*) as number FROM students INNER JOIN admission_score a ON students.applicant_id = a.applicant_id INNER JOIN course c on students.course_id=c.course_id INNER JOIN year_lvl y On students.year_id=y.year_id WHERE academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students')  GROUP BY total_cat";
			        $results = mysqli_query($conn,$select);
			        ///["King's pawn (e4)", 44],
			        $category = array();
			        while ($data = mysqli_fetch_assoc($results)) {
			            $category[] = "['". $data['total_cat']."'," . $data['number'] . "],";
			        }
		        ?>
		        <?php   
				$query = "SELECT total_cat, count(*) as number FROM students INNER JOIN admission_score a ON students.applicant_id = a.applicant_id INNER JOIN course c on students.course_id=c.course_id  INNER JOIN year_lvl y On students.year_id=y.year_id WHERE academic = '$academic' AND semester_id = '$semester' AND (status_type = 'Enroll New Students' OR status_type = 'Enroll Old Students') GROUP BY total_cat";  
				 $result = mysqli_query($conn, $query);
				 ?>

		        <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
					 <?php  
					 	$count_not = 0;
					 	$count_fail = 0;
					 	$count_new = 0;
					 	$count = 0;
                        $count_accept = 0;
					 ?>
					<?php endif; ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="icon" type="image" href="../../../icon.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Guidance Office - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <?php include '../inc/navbar.php';  ?>

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
    
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
                <div class="dropdown me-3  d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><span id="total"></span></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                    	<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="../new-applicant/index.php"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Pre-Enrolled Applicant</div>
                                    <span class="fs-7">For Academic <?php echo $academic; ?>, <?php echo $semester; ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><span id="accept"></span></span>
                            </a>
                            <a href="../applicant-info/index.php"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Applicant Form</div>
                                    <span class="fs-7">Total Number of New Applicant who filled the form</span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><span id="enroll"></span></span>
                            </a>
                        </div>
                    	<?php else: ?>
                    	<h5 class="p-3 bg-indigo text-light">No Notification</h5>
                    	<?php endif; ?>
                    </div>
                    
                </div>
                <?php include '../inc/dropdown.php' ?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                <div class="row g-3">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../passed-and-enroll/index.php"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-user-add-line summary-icon bg-primary mb-2"></i>
                                <div>Pass and Enrolled</div>
                            </div>
                            <h4>Total: <?php echo $count_new ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../passed-not-enroll/index.php"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-user-line summary-icon bg-indigo mb-2"></i>
                                <div>Pass but not Enrolled</div>
                            </div>
                            <h4>Total: <?php echo $count_not ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../not-pass/index.php"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-user-unfollow-line summary-icon bg-success mb-2"></i>
                                <div>Failed to Passed </div>
                            </div>
                            <h4>Total: <?php echo $count_fail ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../accepted-applicant/index.php"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-group-line summary-icon bg-danger mb-2"></i>
                                <div>Pre-enrolled Applicant</div>
                            </div>
                            <h4>Total: <?php echo $count ?></span></h4>
                        </a>
                    </div>
                </div>
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-7">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Applicant Population based on Admission Test Score
                            </div>
                            <div class="card-body">
                                <div id="barchart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-5">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Applicant Percentage based on Admission Test Score
                            </div>
                            <div class="card-body">
                                <div id="piechart"></div>
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
    <script src="script.js"></script>
    <script src="new_script.js"></script>
    <script src="enroll.js"></script>
    <script src="total.js"></script>
    <script src="fill_up.js"></script>
    <!-- end: JS -->


    					<script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawStuff);

                          function drawStuff() {
                            var data = new google.visualization.arrayToDataTable([
                              ['Category', 'Total Students'],
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
				                          ['year_name', 'number'],  
				                          <?php  
				                          while($row = mysqli_fetch_array($result))  
				                          {  
				                               echo "['".$row["total_cat"]."', ".$row["number"]."],";  
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