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
                        
                            
                            $query = "SELECT * FROM academic WHERE status='1' order by academic_id desc ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?><?php
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
                    <?php
                                
        require '../../../database/config.php';
    


        $querys = "SELECT * FROM academic GROUP BY status";
        $querys_run = mysqli_query ($conn, $querys);

        if (mysqli_num_rows($querys_run)>0) {
            
            foreach($querys_run as $rows12)
                ?><?php
        }
                                
        ?>
        <?php
                                
        require '../../../database/config.php';
        

        $querys1 = "SELECT * FROM semester GROUP BY sem_status";
        $querys_run1 = mysqli_query ($conn, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $rows112)
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
                    <?php
        require '../../../database/regis.php';
        require '../../../database/regis2.php';
        require '../../../database/regis3.php';
    ?>
    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 

                       <?php
        $try =  $student['academic_start'];
        
        $query2 = "SELECT * from students order by id_number desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['id_number'];
        $customer_ID = substr($last_id, 5);
        $customer_ID = "$try-$customer_ID";
        if ($last_id == $customer_ID)
        {
            $customer_ID = substr($last_id, 5);
            $customer_ID = str_pad(intval($customer_ID) + 1, strlen($customer_ID), '0', STR_PAD_LEFT);
            $customer_ID = "$try-$customer_ID";
        }
        else{
            $customer_ID = "$try-0001";
        }
    ?>
    <?php endif; ?>
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
    <script src="script.js"></script>
    <!-- end: CSS -->
    <title>Enrollee List - Guidance Office</title>

    <script src="sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="width: 100%;">
    <?php include 'message.php'  ?>

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
        case 'success':
            $statusType = 'success';
            $statusMsg = 'Email Sent Successfull';
            break;
        case 'error':
            $statusType = 'warning';
            $statusMsg = 'Email Not Sent. Please Try Again';
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
    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php';  ?>
    <script src="script.js"></script>
    <script src="new_script.js"></script>
    <script src="enroll.js"></script>
    <script src="total.js"></script>
    <script src="fill_up.js"></script>
    <div class="sidebar-overlay"></div>
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
                                <label> CSV Files | Admission Test Score </label>
                                <input class="form-control" type="file" name="file" />
                            </div>
                            <div class="modal-footer">
                                
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




    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">List Of Students</h5>
                                
                 <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">

                        <div class="card border-0 shadow-sm h-100">
                            
                            <div class="card-header bg-white">
                                Students pre-enroll this academic year/semester
                                <div class="float-end">
                                    <form action="send_mail_all.php" method="post">
                                        <input type="hidden" name="semester" value="<?php echo $semester ?>">
                                        <input type="hidden" name="academic" value="<?php echo $academic ?>">
                                <button name="push_notification" type="submit" style="margin-left: 20px;" class="btn btn-sm btn-primary">Send Enrollment To Students</button>
                                </form>
                            </div>
                        </div>
                        
                            <div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                                <div class="table-responsive">
                        <table id="Mytableid">
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="15%">Gender</th>
                                    <th width="15%">Course</th>
                                    <th width="10%">Year Level</th>
                                    <th width="10%">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                                    
                                    $query1 = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id WHERE  semester_id = '$semester' AND academic = '$academic' ";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count = 0;

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?= $student['lname']; ?>, <?= $student['fname']; ?> <?= $student['mname']; ?></td>
                                                <td><?= $student['gender'];?></td>
                                                <td><?= $student['course_code']; ?></td>
                                                <td><?= $student['year_name']; ?></td>
                                                <td><?= $student['type']; ?></td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                       
                                    }
                                ?>

                                
                            </tbody>
                            
                        </table>

                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable();
                            });
                        </script>
                    <?php endif; ?>
<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
<h2>Pre-Enrollemnt is currently not Available</h2>

<?php endif; ?>

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
   <script src="../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <!-- end: JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
   
    <!-- end: JS -->



</body>

</html>