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

        $querys1 = "SELECT * FROM students WHERE status_type = 'Enroll' GROUP BY applicant_id DESC LIMIT 1";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $new_applicant)
               $new = $new_applicant['applicant_id'];
                ?>
            <?php
        }
        else{
            $new = 'None';
        }
                                
        ?>

        <?php
                                
        require '../../../database/config.php';

        $querys1 = "SELECT * FROM students WHERE status_type = 'Pre Old Students' GROUP BY id_number DESC LIMIT 1";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $old_applicant)
               $old = $old_applicant['id_number'];
                ?>
            <?php
        }
        else{
            $old = 'None';
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
    <link rel="icon" type="image" href="../../../icon.png">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="script.js"></script>
    <!-- end: CSS -->
    <title>System | Registrar Office - Madridejos Community College</title>
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

    <?php include('message.php'); ?>
    <?php include('add_modal.php'); ?>


    <?php include('update_doc.php'); ?>
    

    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php'  ?>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Enrollment Manage | Rate Per Unit</h5>
                
                <?php include '../inc/dropdown.php' ?>
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
                    <div class="col-12 col-md-7 col-xl-4" >
                        <form action="code.php" method="POST">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Academic <a href="#academic" class="btn btn-sm btn-success float-end" data-bs-toggle="modal"> Add New Academic Year </a>
                        </h4>
                            </div>
                            <div class="card-body">
                                <table id="Mytableid" class="table table-bordered table-striped">
                            
                            <tbody>
                                <tr>
                                                <td colspan="4" style="text-align: center;">Academic Year</td>
                                                <td colspan="2" style="text-align: center;">Status</td>
                                                <td colspan="2" style="text-align: center;">Action</td>
                                                
                                            </tr>
                                <?php 
                                    $query1 = "SELECT * FROM academic ORDER BY academic_start ASC LIMIT 4";

                                    $query_run1 = mysqli_query($conn, $query1);

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            ?>
                                            
                                            
                                            <tr style="text-align: center;">
                                                
                                                <input type="hidden" name="academic_id" value="<?= $student['academic_id']; ?>">
                                                <input type="hidden" name="status" value="0">
                                                <input type="hidden" name="status1" value="1">
                                                <td colspan="4" width="50%"><?= $student['academic_start']; ?> - <?= $student['academic_end']; ?></td>
                                                

                                                <td colspan="2">
                                                <?php if(in_array($student['status'],array('1'))): ?>
                                                    
                                                    <a class="btn btn-primary btn-sm" href="code.php?id=<?= $student['academic_id']; ?>&status=0">ACTIVE</a>
                                                    <?php endif; ?>
                                                

                                                <?php if(in_array($student['status'],array('0'))): ?>
                                                    
                                                    <a class="btn btn-danger btn-sm" href="code.php?id=<?= $student['academic_id']; ?>  &status=1">NOT ACTIVE</a>
                                                    <?php endif; ?>
                                                    
                                                </td>
                                                
                                                <td colspan="2"><a class="btn btn-warning btn-sm" href='delete.php?id=<?= $student['academic_id']; ?>'><span class="ri-delete-bin-line"></span></a></td>
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
                    <div class="col-12 col-md-5 col-xl-4" >
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Semester
                            </div>
                            <div class="card-body">
                                  <table id="Mytableid" class="table table-bordered table-striped">
                            
                            </thead>
                            <tbody>
                                <tr>
                                                <td colspan="1" style="text-align: center;">Semester</td>
                                                <td colspan="1" style="text-align: center;">Status</td>
                                                
                                            </tr>
                                <?php 
                                    $query = "SELECT * FROM semester";

                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($sem = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            
                                            
                                            <tr style="text-align: center;">
                                                
                                                
                                                <td width="50%"><?= $sem['semester_name']; ?></td>
                                                <td>
                                                <?php if(in_array($sem['sem_status'],array('1'))): ?>
                                                    
                                                    <a class="btn btn-primary btn-sm" href="code.php?sem_id=<?= $sem['semester_id']; ?>&sem_status=0">ACTIVE</a>
                                                    <?php endif; ?>
                                                

                                                <?php if(in_array($sem['sem_status'],array('0'))): ?>
                                                    
                                                    <a class="btn btn-danger btn-sm" href="code.php?sem_id=<?= $sem['semester_id']; ?>&sem_status=1">NOT ACTIVE</a>
                                                    <?php endif; ?>
                                                </td>
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
                    <div class="col-12 col-md-5 col-xl-4" >
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Students Type
                            </div>
                            <div class="card-body">
                                  <table id="Mytableid" class="table table-bordered table-striped">
                            
                            </thead>
                            <tbody>
                                <tr>
                                                <td colspan="1" style="text-align: center;">Semester</td>
                                                <td colspan="1" style="text-align: center;">Status</td>
                                                
                                            </tr>
                                <?php 
                                    $query = "SELECT * FROM enroll";

                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($sem = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            
                                            
                                            <tr style="text-align: center;">
                                                
                                                
                                                <td width="50%"><?= $sem['enroll_name']; ?></td>
                                                <td>
                                                <?php if(in_array($sem['status'],array('1'))): ?>
                                                    
                                                    <a class="btn btn-primary btn-sm" href="code.php?enroll_id=<?= $sem['enroll_id']; ?>&status=0">ACTIVE</a>
                                                    <?php endif; ?>
                                                

                                                <?php if(in_array($sem['status'],array('0'))): ?>
                                                    
                                                    <a class="btn btn-danger btn-sm" href="code.php?enroll_id=<?= $sem['enroll_id']; ?>&status=1">NOT ACTIVE</a>
                                                    <?php endif; ?>
                                                </td>
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
                </form>
                <div class="col-12 col-md-7 col-xl-4" >
                        <form action="code.php" method="POST">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Rate per Unit 
                        </h4>
                            </div>
                            <div class="card-body">
                                <table id="Mytableid" class="table table-bordered table-striped">
                                
                            <tbody>
                                <tr>
                                                <td colspan="1" style="text-align: center;">Unit Rate</td>
                                                <td colspan="1" style="text-align: center;">Action</td>
                                                
                                            </tr>
                                <?php 
                                    $query1 = "SELECT * FROM rate ";

                                    $query_run1 = mysqli_query($conn, $query1);

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            ?>
                                            
                                            
                                            <tr style="text-align: center;">
                                                <td><input style="text-align: center;" type="text" name="units_rate" class="form-control" value="<?= $student['units_rate']; ?>"></td>
                                                <td><button name="rate" class="btn btn-success btn-sm">Save</button></td>
                                                <input type="hidden" name="Id" value="<?= $student['Id']; ?>">
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
                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-4" >
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Lab Unit Rate
                            </div>
                            <div class="card-body">
                                  <table id="Mytableid" class="table table-bordered table-striped">
                            
                            </thead>
                            <tbody>
                                <tr>
                                                <td colspan="1" style="text-align: center;">Lab Unit Rate</td>
                                                <td colspan="1" style="text-align: center;">Action</td>
                                                
                                            </tr>
                                <?php 
                                    $query = "SELECT * FROM rate";

                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($lab = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            <form action="code.php" method="POST">
                                            
                                            <tr style="text-align: center;">
                                                <td><input style="text-align: center;" type="text" name="lab_rate1" class="form-control" value="<?= $lab['lab_rate']; ?>"></td>
                                                <td><button name="lab_rate" class="btn btn-success btn-sm">Save</button></td>
                                                <input type="hidden" name="Id" value="<?= $lab['Id']; ?>">
                                            </tr>
                                        </form>
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
                    <div class="col-12 col-md-5 col-xl-4" >
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                EXPORT CSV FOR MCC PRINTING
                            </div>
                            <div class="card-body">
                                  <table id="Mytableid" class="table table-bordered table-striped">
                            
                            </thead>
                            <tbody>
                                <tr>
                                               
                                                <td colspan="1" style="text-align: center;">Action</td>
                                                
                                            </tr>
                                <?php 
                                    $query = "SELECT * FROM rate";

                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($lab = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            <form action="code.php" method="POST">
                                            
                                            <tr style="text-align: center;">
                                                
                                                <td><a href="exportData.php" class="btn btn-success btn-sm"> Export CSV</a></td>
                                                <input type="hidden" name="Id" value="<?= $lab['Id']; ?>">
                                            </tr>
                                        </form>
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