<?php
    session_start();
    require '../../../database/config.php';

    if (!isset($_SESSION['SESSION_BEED'])) {
        header("Location: ../login/");
        die();
    }
else{
  $username = $_SESSION['SESSION_BEED'];
}


include_once '../../../database/config.php';
include_once '../../../database/config2.php';
  $query = "SELECT * FROM semester Order by semester_name";
  $result = $db->query($query);

include_once '../../../database/config.php';
include_once '../../../database/config2.php';
  $query1 = "SELECT * FROM semester Order by semester_name";
  $result1 = $db->query($query1);
?>


<?php

include('../../../database/database_connection.php');

$course = '';
$query = "SELECT DISTINCT course_name FROM course ORDER BY course_name ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $course .= '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';
}

?>
<?php

include('../../../database/database_connection.php');

$semester = '';
$query = "SELECT DISTINCT semester_name FROM semester ORDER BY semester_name ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $semester .= '<option value="'.$row['semester_name'].'">'.$row['semester_name'].'</option>';
}

?>
<?php

include('../../../database/database_connection.php');

$year = '';
$query = "SELECT DISTINCT year_name FROM year_lvl ORDER BY year_name ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $year .= '<option value="'.$row['year_name'].'">'.$row['year_name'].'</option>';




$section = '';
$query = "SELECT DISTINCT sections FROM sections INNER JOIN year_lvl y ON sections.year_id = y.year_id WHERE year_name ='$year' ORDER BY sections ASC";
$statement = $connect->prepare($query);}
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $section .= '<option value="'.$row['sections'].'">'.$row['sections'].'</option>';
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" type="image" href="../../../icon.png">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Study Load | BEED - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   
    <script src="sweetalert.js"></script>


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

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../../assets/mcc2.png">
            <a href="./" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">BEED | Portal</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
        <hr style="color: ghostwhite;">
        <?php 
            $username = $_SESSION['SESSION_BEED'];
            $sel = "SELECT * FROM users WHERE role='BEED Portal' AND online = '1' AND username='$username'";
            $query = mysqli_query($conn,$sel);
            $resul = mysqli_fetch_assoc($query);
        ?>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Profile</li>
            <div class="sidebar-user text-center">
                <img class="img-90 rounded-circle" src="../../../admin/admin/user/uploads/<?php echo $resul['profile'] ?>" alt="">
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
                <a href="../">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                    Search Applicant
                </a>
                </li>
                <li class="sidebar-menu-item">
                <a href="../shift-students/">
                    <i class="ri-user-shared-line sidebar-menu-item-icon"></i>
                    Shift Students
                </a>
                </li>
            </li>
            
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Study Load</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="./">
                    <i class="ri-file-chart-line sidebar-menu-item-icon"></i>
                    Import Study Load
                </a>
                </li>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">System</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="../login/logout?id=<?php echo $resul['id'] ?>">
                    <i class="ri-logout-box-line sidebar-menu-item-icon"></i>
                    Logout
                </a>
                </li>
            </li>

            
        </ul>
    </div>
    <div class="sidebar-overlay"></div>















     <div class="modal fade" id="editmodal_fees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> IMPORT FEES </h5>
                </div>
                
                            <form action="importData.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                
                                <div class="form-group">
                                    
                                    <label> Semester </label>
                                <select class="form-control" name="semester_id1" id="semester_id1" data-serialize class="happyforms-select" onchange="FetchSemester1(this.value)" required>
                                  <option selected disabled class="happyforms-placeholder-option">Select Semester</option>
                                  <option value="First Sem" class="happyforms-placeholder-option">First Sem</option>
                                  <option value="Second Sem" class="happyforms-placeholder-option">Second Sem</option>
                                  <option value="Summer" class="happyforms-placeholder-option">Summer</option>
                              
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Course </label>
                                        
                                        <?php
          include_once '../../../database/config.php';
          include_once '../../../database/config2.php';
          $query = "SELECT * FROM course WHERE course_name = 'Bachelor of Elementary Education'";
          $result = $db->query($query);
        ?>
                                        <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?>  
                            <input style="visibility: hidden;" type="text" name="course_id1" id="course_id1" onclick="FetchCourse1(this.value)" value="<?php echo$row['course_id'] ?>" >
                            <label class="form-control" for="course_id1"><?php echo$row['course_name'] ?></label>
                                                    
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?>             
                                      
                                  </div>
                                  <div class="form-group">
                                    <label> Year Level </label>
                                  <select class="form-control" name="year_id1" id="year_id1" data-serialize class="happyforms-select" onchange="FetchYear1(this.value)" required>
                                    <option  value="" class="happyforms-placeholder-option">Select Year Level</option>
                                </select>
                            </div>
                              <div class="form-group">
                                <label> CSV Files </label>
                                <input class="form-control" type="file" name="file" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                
                                <input type="submit" class="btn btn-sm btn-primary" name="importSubmit_fees" value="IMPORT">
                            </div>
                            </div>
                            </form>
                            <script type="text/javascript">

          function FetchCourse1(id){
            $('#year_id1').html('');
            $('#section_id1').html('<option>Select Section</option>');
            $.ajax({
              type:'post',
              url: 'ajaxdata.php',
              data : { course_id : id},
              success : function(data){
                 $('#year_id1').html(data);
              }

            })
          }

          function FetchYear1(id){ 
            $('#section_id1').html('');
            $.ajax({
              type:'post',
              url: 'ajaxdata.php',
              data : { year_id : id},
              success : function(data){
                 $('#section_id1').html(data);
              }

            })
          }
        </script>
                        
            </div>
        </div>
    </div>
    <!-- end: Sidebar -->

     <div class="modal fade" id="editmodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> IMPORT STUDY LOAD </h5>
                </div>
                
                            <form action="importData.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                
                                <div class="form-group">
                                    <label> Semester </label>
                                <select class="form-control" name="semester_id" id="semester_id" data-serialize class="happyforms-select" onchange="FetchSemester(this.value)" required>
                                  <option selected disabled class="happyforms-placeholder-option">Select Semester</option>
                                  <option value="First Sem" class="happyforms-placeholder-option">First Sem</option>
                                  <option value="Second Sem" class="happyforms-placeholder-option">Second Sem</option>
                                  <option value="Summer" class="happyforms-placeholder-option">Summer</option>
                              
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Course </label>
                                        <?php
          include_once '../../../database/config.php';
          include_once '../../../database/config2.php';
          $query = "SELECT * FROM course WHERE course_name = 'Bachelor of Elementary Education'";
          $result = $db->query($query);
        ?>
                                        <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?>  
                            <input style="visibility: hidden;" type="text" name="course_id" id="course_id" onclick="FetchCourse(this.value)" value="<?php echo$row['course_id'] ?>" >
                            <label class="form-control" for="course_id"><?php echo$row['course_name'] ?></label>
                                                    
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?>            
                                      
                                  </div>
                                  <div class="form-group">
                                    <label> Year Level </label>
                                  <select class="form-control" name="year_id" id="year_id" data-serialize class="happyforms-select" onchange="FetchYear(this.value)" required>
                                    <option  value="" class="happyforms-placeholder-option">Select Year Level</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Section </label>
                                <select class="form-control" name="section_id" id="section_id" data-serialize class="happyforms-select" required>
                                    <option  value="" class="happyforms-placeholder-option">Select Section</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label> CSV Files </label>
                                <input class="form-control" type="file" name="file" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                
                                <input type="submit" class="btn btn-sm btn-primary" name="importSubmit" value="IMPORT/UPDATE">
                            </div>
                            </div>
                            </form>
                            <script type="text/javascript">

          function FetchCourse(id){
            $('#year_id').html('');
            $('#section_id').html('<option>Select Section</option>');
            $.ajax({
              type:'post',
              url: 'ajaxdata.php',
              data : { course_id : id},
              success : function(data){
                 $('#year_id').html(data);
              }

            })
          }

          function FetchYear(id){ 
            $('#section_id').html('');
            $.ajax({
              type:'post',
              url: 'ajaxdata.php',
              data : { year_id : id},
              success : function(data){
                 $('#section_id').html(data);
              }

            })
          }
        </script>
                        
            </div>
        </div>
    </div>
    <?php
// Load the database configuration file
include_once '../../../database/dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'success';
            $statusMsg = 'Study load has been imported successfully.';
            break;
        case 'err':
            $statusType = 'warning';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'warning';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
    <script>
          swal({
                title: "<?php echo $statusMsg; ?>",
                text: "Have a nice day!",
                icon: "<?php echo $statusType; ?>",
                button: "OKAY",
              });
        </script>

<?php } ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Study Load | Fees</h5>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 150%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Subjects | Schedule | Study Load

                                
                                <?php
                                                    $query = "SELECT * FROM course where course_name ='Bachelor of Elementary Education'";
                                                $result = $db->query($query);
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?>  
                            <input style="visibility: hidden;" type="button" name="course_id" id="course_id" onclick="FetchCourse(this.value)" value="<?php echo $row['course_id'] ?>" >
                            <label class="btn btn-sm float-end btn-success editbtn1" for="course_id">Import Study Load</label>
                          
                                                    
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?>
                            
                            </div>
                            
                            <div class="card-body">

                                
                                    
                                        
                                         <div class="form-group">
                                          <select name="filter_semester" id="filter_semester" class="form-control" required>
                                         <?php echo $semester; ?>
                                          </select>
                                         </div>
                                         
                                        
                                         <div class="form-group">
                                            <input type="text" name="filter_course" id="filter_course" class="form-control" value="Bachelor of Elementary Education" readonly>
                                         </div>
                                         
                                         <div class="form-group">
                                          <select name="filter_year" id="filter_year" class="form-control" required>
                                           <option value="">Select Year</option>
                                           <?php echo $year; ?>
                                          </select>
                                         </div>
                                        <div class="form-group">
                                            <input type="text" name="filter_section" id="filter_section" class="form-control" placeholder="Please input Section" required>
                                         </div>
                                         
                                         
                                         
                                            <div class="form-group">
                                                  <button  type="button" name="filter" id="filter" class=" btn btn-info">Search</button>
                                            </div>
                                        
                                        
                                
                                 
                                 <br>
                             </div>
                             <div class="card-body">
         <div class="table-responsive">
            <style type="text/css">
                                    .card-body .form-group{
                                        width: 20%;
                                        padding: 4px;
                                        margin: 0 auto;
                                        float: left;
                                    }
                                    .card-body .form-group button{
                                        width: 100px
                                    }
                                    .form-group .form-control   {
                                        
                                    }

                                                    
                                                    .table-responsive td{
                                                        font-size: 14px;
                                                    }
                                                    @media (max-width: 600px) {
                                                        .table-responsive {
                                                        font-size: 10px;
                                                        
                                                        padding: 10px;
                                                        text-align: center;
                                                    }
                                                    .table-responsive td{
                                                        padding: 100px;
                                                    }
                                                   .card-body .form-group{
                                        width: 100%;
                                        padding: 4px;
                                        margin: 0 auto;
                                    }
                                    .form-group button{
                                        width: 100%;
                                        
                                    }
                                    .form-group .form-control, .form-group button{
                                        font-size: 10px;
                                    }
                                                    }

                                                </style>
                        <table id="customer_data" class="" style="width: 100%;">
                            <thead class="la">
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Unit</th>
                                    <th>Lab Unit</th>
                                    <th>Days</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Instructor</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Sections</th>
                                </tr>
                            </thead>
                        </table>

                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        </div>

                        
                            </div>
                        </div>


                        <div class="col-12 col-md-7 col-xl-8" style="width: 150%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Fees


                                <?php
                                                    $query = "SELECT * FROM course where course_name ='Bachelor of Elementary Education'";
                                                $result = $db->query($query);
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?>  
                            <input style="visibility: hidden;" type="button" name="course_id1" id="course_id1" onclick="FetchCourse1(this.value)" value="<?php echo $row['course_id'] ?>" >
                            <label class="btn btn-sm float-end btn-success editbtn_fees" for="course_id1">Import Fees</label>
                          
                                                    
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?> 
                            
                            </div>
                            
                             <div class="card-body">
         <div class="table-responsive">
            <style type="text/css">
                                    .card-body .form-group{
                                        width: 20%;
                                        padding: 4px;
                                        margin: 0 auto;
                                        float: left;
                                    }
                                    .card-body .form-group button{
                                        width: 100px
                                    }
                                    .form-group .form-control   {
                                        
                                    }

                                                    
                                                    .table-responsive{
                                                        font-size: 15px;
                                                    }
                                                    @media (max-width: 600px) {
                                                        .table-responsive {
                                                        font-size: 10px;
                                                        
                                                        padding: 10px;
                                                        text-align: center;
                                                    }
                                                    .table-responsive td{
                                                        padding: 100px;
                                                    }
                                                   .card-body .form-group{
                                        width: 100%;
                                        padding: 4px;
                                        margin: 0 auto;
                                    }
                                    .form-group button{
                                        width: 100%;
                                        
                                    }
                                    .form-group .form-control, .form-group button{
                                        font-size: 10px;
                                    }
                                                    }

                                                </style>
                                                <div class="table-responsive">
                        <table id="Mytableid" style="width: 100%; text-align: center;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="15%">Course</th>
                                    <th width="10%">Year Level</th>
                                    <th width="20%">Semester</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                <?php  
                                    
                                    
                                    $query1 = "SELECT * FROM fees INNER JOIN course c ON fees.course_id=c.course_id INNER JOIN year_lvl y ON fees.year_id=y.year_id WHERE course_name = 'Bachelor of Elementary Education' ORDER BY year_name ";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count = 0;

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                             
                                            <tr>
                                                <td><?= $student['course_code']; ?></td>
                                                <td><?= $student['year_name']; ?></td>
                                                <td><?= $student['semester_id']; ?></td>
                                                <td><button data-id='<?php echo $student['fees_id']; ?>' class="userinfo btn btn-sm btn-success">View Fees</button></td>
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
                    <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body1').html(response); 
                            $('#empModal1').modal('show'); 
                        }
                    });
                });
            });
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
             <div class="modal fade" id="empModal1" role="dialog">
                <div class="modal-dialog">
                    <form action="update_fees.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Fees</h4>
                        </div>
                        <div class="modal-body1" style="width: 95%; margin: 0 auto;">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                
                            <input type="submit" class="btn btn-sm btn-primary" name="update_fees" value="Save Changes">
                        </div>
                    </div>
                </form>
                </div>
        </div>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable();
                            });
                        </script>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
   
    

    <script src="script.js"></script>
    <script>
        function formToggle(ID){
            var element = document.getElementById(ID);
            if(element.style.display === "none"){
                element.style.display = "block";
            }else{
                element.style.display = "none";
            }
        }
        </script>
        <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(filter_semester = '', filter_course = '', filter_year = '', filter_section = '')
  {
   var dataTable = $('#customer_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data:{
      filter_semester:filter_semester, filter_course:filter_course, filter_year:filter_year, filter_section:filter_section
     }
    }
   });
  }
  
  $('#filter').click(function(){
   var filter_semester = $('#filter_semester').val();
   var filter_course = $('#filter_course').val();
   var filter_year = $('#filter_year').val();
   var filter_section = $('#filter_section').val();
   if(filter_semester != '' && filter_course != '' && filter_year != '' && filter_section != '')
   {
    $('#customer_data').DataTable().destroy();
    fill_datatable(filter_semester, filter_course, filter_year, filter_section);
   }
   else
   {
    alert('Select Both filter option');
    $('#customer_data').DataTable().destroy();
    fill_datatable();
   }
  });
  
  
 });
 
</script>
<script type="text/javascript">
        $(document).ready(function () {

            $('.editbtn1').on('click', function () {

                $('#editmodal1').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#applicant_id1').val(data[0]);
                $('#exam_remarks').val(data[4]);
                $('#findings').val(data[5]);
                
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.editbtn_fees').on('click', function () {

                $('#editmodal_fees').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#fees_id').val(data[0]);
                $('#exam_remarks').val(data[4]);
                $('#findings').val(data[5]);
                
            });
        });
    </script>
     <script type="text/javascript">
        $(document).ready(function () {

            $('.view_fees').on('click', function () {

                $('#view_fees').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#fees_id').val(data[0]);
                $('#exam_remarks').val(data[4]);
                $('#findings').val(data[5]);
                
            });
        });
    </script>
     <script src="../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <!-- end: JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    

</body>

</html>