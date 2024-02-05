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

        $querys1 = "SELECT * FROM students WHERE status_type = 'Old Students' GROUP BY id_number DESC LIMIT 1";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="../../../icon.png">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Subjects | Registrar Office - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <?php include('edit_delete_modal.php'); ?>  

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
                <h5 class="fw-bold mb-0 me-auto">Select Subjects</h5>
                <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $new_students+$old_students; ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="../new-students/index.php?search=<?php echo $new ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">New Students</div>
                                    <span class="fs-7">Latest Applicant Enroll : <?php echo $new ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $new_students; ?></span>
                            </a>
                            <a href="../old-students/index.php?search=<?php echo $old ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Old Students</div>
                                    <span class="fs-7">Latest Pre-enroll Old Students: <?php echo $old ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $old_students; ?></span>
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
			                $sel = "SELECT * FROM users WHERE role='Registrar Office' AND online = '1'";
			                $query = mysqli_query($conn,$sel);
			                $resul = mysqli_fetch_assoc($query);
			            ?>
                        <span class="me-2 d-none d-sm-block"><?php echo $resul['name'] ?></span>
                        <img class="navbar-profile-image"
                            src="../../../admin/admin/user/uploads/<?php echo $resul['profile'] ?>"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../login/logout.php?id=<?php echo $resul['id'] ?>">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
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
                    <div class="col-12 col-md-5 col-xl-12">
                    <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Section Subject
                                
                                <button type="button" name="bulk_email" class="btn btn-sm float-end btn-info email_button" id="bulk_email" data-action="bulk">Add Selected Selected</button>
                            
                            
                                <a style="margin-right: 20px" href="subjects-vefify.php?id_number=<?php echo $_GET['id_number'] ?>" class="btn btn-primary btn-sm float-end">Proceed</a>
                           
                            </div>

                            <div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                                <div class="table-responsive">
                        <table id="Mytableid" >
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="10%">Code</th>
                                    <th width="20%">Name</th>
                                    <th width="%">Units</th>
                                    <th width="5%">Days</th>
                                    <th width="10%">Time</th>
                                    <th width="5%">Room</th>
                                    <th width="20%">Instructor</th>
                                    <th width="5%"></th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $id_number = $_GET['id_number'];
                                    $section = $_GET['section'];
                                    
                                    $query1 = "SELECT * FROM subjects WHERE section_id = '$section'  ORDER BY subject_id ASC";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count = 0;
                                    

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?= $student['subject_code']; ?></td>
                                                <td><?= $student['subject_name']; ?></td>
                                                <td><?= $student['units']; ?></td>
                                                <td><?= $student['days']; ?></td>
                                                <td><?= $student['time_sched']; ?></td>
                                                <td><?= $student['room']; ?></td>
                                                <td><?= $student['instructor']; ?></td>
                                                <td>
                                                <?php  
                                                    echo '
                            <input type="checkbox" onclick="return myfun()" id="'.$id_number.'" name="single_select" class="single_select" data-email="'.$id_number.'" data-name="'.$student["subject_id"].'" checked />
                        
                                                    ';
                                                ?></td>
                                                
                                                <td>
                                                    <form action="" method="post">
                                                    <input type="hidden" class="email" name="email" value="<?= $student['subject_id']; ?>" required>
                                                    <input type="hidden" class="code" name="code" value="try" required>

                                                    
                                                    <?php
                                                        
                                                        
                                                            $count = $count + 1;
                                                            echo '
                                                            
                                                                
                                                                <button type="button" name="email_button" class="btn btn-info btn-sm email_button" id="'.$count.'" data-email="'.$id_number.'" data-name="'.$student["subject_id"].'" data-app="'.$student["subject_id"].'" data-action="single">Add Subject</button>
                                                                
                                                            
                                                            ';
                                                        
                                                        ?>
                                                    </form>
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid").DataTable({
                                    "pageLength": 25
                                });
                            });
                        </script>
                    <?php endif; ?>
<?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
<h2>Pre-Enrollemnt is currently not Available</h2>

<?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-12">
                    <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                All Subjects
                            </div>

                            <div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                                <div class="table-responsive">
                        <table id="Mytableid1">
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="10%">Code</th>
                                    <th width="20%">Name</th>
                                    <th width="%">Units</th>
                                    <th width="5%">Days</th>
                                    <th width="10%">Time</th>
                                    <th width="5%">Room</th>
                                    <th width="20%">Instructor</th>
                                   
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $id_number = $_GET['id_number'];
                                    $section = $_GET['section'];
                                    
                                    $query1 = "SELECT * FROM subjects WHERE section_id != '$section'  ORDER BY subject_id ASC";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count2 = 0;
                                    

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?= $student['subject_code']; ?></td>
                                                <td><?= $student['subject_name']; ?></td>
                                                <td><?= $student['units']; ?></td>
                                                <td><?= $student['days']; ?></td>
                                                <td><?= $student['time_sched']; ?></td>
                                                <td><?= $student['room']; ?></td>
                                                <td><?= $student['instructor']; ?></td>
                                                
                                                
                                                <td>
                                                    <form action="" method="post">
                                                    <input type="hidden" class="email" name="email" value="<?= $student['subject_id']; ?>" required>
                                                    <input type="hidden" class="code" name="code" value="try" required>

                                                    
                                                    <?php
                                                        
                                                        
                                                            $count2 = $count2 + 1;
                                                            echo '
                                                            
                                                                
                                                                <button type="button" name="email_button1" class="btn btn-info btn-sm email_button1" id="'.$student["subject_id"].'" data-email1="'.$id_number.'" data-name1="'.$student["subject_id"].'" data-app1="'.$student["subject_id"].'" data-action1="single1">Add Subject</button>
                                                                
                                                            
                                                            ';
                                                        
                                                        ?>
                                                    </form>
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                        <script>
                            jQuery(document).ready(function(){
                                jQuery("#Mytableid1").DataTable({
                                    "pageLength": 10
                                });
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
   <script src="../../assets/js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="script.js"></script>
    <script src="new_script.js"></script>
    <script src="enroll.js"></script>
    <script src="total.js"></script>
    <!-- end: JS -->

    <script>
$(document).ready(function(){
    $('.email_button').click(function(){
        $(this).attr('disabled', 'disabled');
        var id  = $(this).attr("id");
        var action = $(this).data("action");
        var email_data = [];
        if(action == 'single')
        {
            email_data.push({
                email: $(this).data("email"),
                name: $(this).data("name")
                
            });
        }
        else
        {
            $('.single_select').each(function(){
                if($(this).prop("checked") == true)
                {
                    email_data.push({
                        email: $(this).data("email"),
                        name: $(this).data('name')
                        
                    });
                } 
            });
        }

        $.ajax({
            url:"send_mail.php",
            method:"POST",
            data:{email_data:email_data},
            beforeSend:function(){
                $('#'+id).html('Adding Subject');
                $('#'+id).addClass('btn-warning');
            },
            success:function(data){
                if(data == 'ok')
                {
                    $('#'+id).text('Accepted Successful');
                    $('#'+id).removeClass('btn-danger');
                    $('#'+id).removeClass('btn-info');
                    $('#'+id).addClass('btn-success');
                }
                else if (data == '') {
                    $('#'+id).text(data);
                    $('#'+id).text('No Applicant Selected');
                    $('#'+id).removeClass('btn-danger');
                    $('#'+id).removeClass('btn-info');
                    $('#'+id).addClass('btn-info');
                }
                else
                {
                    $('#'+id).text(data);
                    
                }
                $('#'+id).attr('disabled', false);

            }
        })

    });
});
</script>
<script>
$(document).ready(function(){
    $('.email_button1').click(function(){
        $(this).attr('disabled', 'disabled');
        var id  = $(this).attr("id");
        var action = $(this).data("action1");
        var email_data = [];
        if(action == 'single1')
        {
            email_data.push({
                email: $(this).data("email1"),
                name: $(this).data("name1")
                
            });
        }
        else
        {
            $('.single_select1').each(function(){
                if($(this).prop("checked") == true)
                {
                    email_data.push({
                        email: $(this).data("email1"),
                        name: $(this).data('name1')
                        
                    });
                } 
            });
        }

        $.ajax({
            url:"send_mail1.php",
            method:"POST",
            data:{email_data:email_data},
            beforeSend:function(){
                $('#'+id).html('Adding Subject');
                $('#'+id).addClass('btn-warning');
            },
            success:function(data){
                if(data == 'ok')
                {
                    $('#'+id).text('Accepted Successful');
                    $('#'+id).removeClass('btn-danger');
                    $('#'+id).removeClass('btn-info');
                    $('#'+id).addClass('btn-success');
                }
                else if (data == '') {
                    $('#'+id).text(data);
                    $('#'+id).text('No Applicant Selected');
                    $('#'+id).removeClass('btn-danger');
                    $('#'+id).removeClass('btn-info');
                    $('#'+id).addClass('btn-info');
                }
                else
                {
                    $('#'+id).text(data);
                    
                }
                $('#'+id).attr('disabled', false);

            }
        })

    });
});
</script>

 
</body>

</html>