    <?php
    session_start();
    require '../../../database/config.php';

    if (!isset($_SESSION['SESSION_BEED'])) {
        header("Location: ../login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_BEED'];
}
?>
<?php
  include_once '../../../database/config.php';
  include_once '../../../database/config2.php';
  $query = "SELECT * FROM course where course_name ='Bachelor of Elementary Education'";
  $result = $db->query($query);
?>
<?php
  include_once '../../../database/config.php';
  include_once '../../../database/config2.php';
  $query1 = "SELECT * FROM course";
  $result1 = $db->query($query1);
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

    			

		        <?php endif; ?>
                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
					 <?php  
					 	
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
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>BEED Portal - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   
    <script src="sweetalert.js"></script>
    <style type="text/css">
       
    
    .result, .result1{
        width: 73%;
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    /* Formatting result items */
    .result p, .result1 p{
        margin: 0;
        padding: 5px 5px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background-color: white;
    }
    .result p:hover, .result1 p:hover{
        background: #f2f2f2;
    }

    </style>


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


        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Accept Students </h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="applicant_id" id="applicant_id">
                        <input type="hidden" name="id_number" id="id_number">


                        
                        <div class="form-group mb-3">
                            <label>Course</label> <?php
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?>  
                            <input style="visibility: hidden;" type="text" name="course_id" id="course_id" onclick="FetchCourse(this.value)" value="<?php echo$row['course_id'] ?>" >
                            <label class="form-control" for="course_id"><?php echo$row['course_name'] ?></label>
                                                    
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?> 
                                                      
                        </div>
                        <div class="form-group mb-3">
                            <label>Year Level</label>
                                                    <select name="year_id" id="year_id" class="form-control" onchange="FetchYear(this.value)"  required>
                                                        <option>Select Course</option>
                                                      </select>
                        </div>

                            <input type="hidden" name="status_type" value="Enroll">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="sections" class="btn btn-primary">Accept</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





   <div class="modal fade" id="editmodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Accept Students </h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="applicant_id" id="applicant_id">
                        <input type="hidden" name="id_number1" id="id_number1">

                        <div class="form-group mb-3">
                            <label class="mb-3">Shift to:</label>
                            <select name="course_id" class="form-control" required>
                                <option value="" selected disabled>Select Course</option>
<?php
                                                if ($result1->num_rows > 0 ) {
                                                    while ($row = $result1->fetch_assoc()) {?>  
                                                           <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_code'] ?></option>
                                                                                
                                                        <?php  
                                                     
                                                    }
                                                    }
                                                    ?> 
                                                      </select>

                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="endorse" class="btn btn-primary">Endorse</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../../assets/mcc2.png">
            <a href="index.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">BEED | Portal</a>
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
                <a href="../index.php">
                    <i class="ri-group-line sidebar-menu-item-icon"></i>
                    Search Applicant
                </a>
                </li>
                <li class="sidebar-menu-item">
                <a href="../shift-students/index.php">
                    <i class="ri-user-shared-line sidebar-menu-item-icon"></i>
                    Shift Students
                </a>
                </li>
            </li>
            
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Study Load</li>
            <li class="sidebar-menu-item has-dropdown">
                <li class="sidebar-menu-item">
                <a href="../import-study-load/index.php">
                    <i class="ri-file-chart-line sidebar-menu-item-icon"></i>
                    Import Study Load
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
                <h5 class="fw-bold mb-0 me-auto">Shift Students</h5>
                
                    
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-5 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Students
                            </div>
                            <div class="card-body" style="width: 50%;">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3 search-box">
                                        <input  type="text" autocomplete="off" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Input ID Number Here...">
                                        <div class="result"></div>
                                        <button  type="submit" class="btn btn-primary" >Search Applicant</button>
                                    </div>      
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Results
                            </div>
                            <div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                                <form action="code.php" method="POST">
                             
                        <table >
                            
                            
                            
                                <?php 

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $start = $rows11['academic_start'];
                                        $end = $rows11['academic_end'];
                                        $semester = $rows111['semester_name'];
                                                                       
                                        $academic = "$start-$end";


                                        $query = "SELECT * FROM students INNER JOIN shift_students s ON students.id_number = s.id_number INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id = y.year_id WHERE semester_id = '$semester' AND academic = '$academic' AND CONCAT(students.id_number) LIKE '%$filtervalues%' AND (status_type = 'Shift Students' OR status_type = 'Shift Clear' OR status_type = 'Shift Accept') AND course_code = 'BEED'";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                ?>
                                                <style type="text/css">
                                                    table tr th, table tr td{
                                                        padding: 20px; 
                                                    }
                                                    @media (max-width: 500px) {
                                                        table tr th, table tr td{
                                                        font-size: 10px;
                                                        padding: 5px;
                                                    }
                                                    }

                                                </style>
                                               <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Fullname</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['fname'] ?> <?php echo $student['mname'] ?> <?php echo $student['lname'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>ID Number</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['id_number'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Gender</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['gender'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Course</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['course_code'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Year</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['year_name'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Shift Status</span></label>
                                                        <?php if ($student['status_type'] == 'Shift Clear') { ?>
                                                        <p style="width: 90%;" class="form-control">Students Cleared</p>
                                                            <?php } elseif ($student['status_type'] == 'Shift Accept') { ?>
                                                        <p style="width: 90%;" class="form-control">Students Accept</p>
                                                        <?php }  else{?>
                                                            <p style="width: 90%;" class="form-control"></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                               
                                                 
                                                 
                                                 <tr style=" text-align: center;" >
                                                
                                                <td hidden><?= $student['id_number']; ?></td>
                                                <td hidden ><?= $student['id_number']; ?></td> 
                                                <td><span hidden>Action</span></td>
                                                <td width="100%"> 
                                                    
                                                    <?php if ($student['status_type'] == 'Shift Students') { ?>
                                                        <button type="button" class="btn btn-primary btn-sm editbtn1">Cleared Students</button>
                                                    <?php } elseif  ($student['status_type'] == 'Shift Clear' OR $student['status_type'] == 'Shift Accept'){ ?>
                                                        <?php
                                                    $query = "SELECT * FROM course where course_name ='Bachelor of Elementary Education'";
                                                $result = $db->query($query);
                                                if ($result->num_rows > 0 ) {
                                                    while ($row = $result->fetch_assoc()) {?> 
                                                        <label class="btn btn-success btn-sm editbtn " for="course_id" style="text-align: ;">Accept Students</label>
                            
                                                         <?php  
                                                     
                                                    }
                                                    }
                                                    ?> 
                                                    <?php } ?>
                                                        
                                                </td>
                                            </tr>
                                                
                                                 </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="6" style="text-align:center;">No Applicant Found!!</td>
                                                </tr>
                                                
                                            <?php
                                        }
                                    }

                                ?>

                                

                                
                            
                        </table>
                        <?php endif; ?>
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                        <h2>Pre-Enrollemnt is currently not Available</h2>
                        <?php endif; ?>
                    </form>

                        
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

   <script src="script.js"></script>
   <script type="text/javascript">
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id_number').val(data[0]);

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

                $('#id_number1').val(data[1]);
                                
            });
        });
    </script>
   
   
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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