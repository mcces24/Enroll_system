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
                        $sql="SELECT * from students  WHERE status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        
                    
                        $sql="SELECT * from students  WHERE status_type='Form Done' AND academic = '$academic' AND semester_id = '$semester'";
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
                        $sql="SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
                        $result=$conn-> query($sql);
                        $count_accept=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count_accept=$count_accept+1;
                            }
                        }
                        
                    ?>
                

                <?php endif; ?>


                    <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('0'))): ?>
                     
                        <?php 
                        $count_new = 0;
                        $count = 0; 
                        $count_accept = 0;
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
    
    <!-- end: CSS -->
    <title>Passed not Enrolled - Guidance Office</title>

    <script src="sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image" href="../../../icon.png">
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
    <?php include '../inc/navbar.php';  ?>
    <script src="script.js"></script>
    <script src="new_script.js"></script>
    <script src="enroll.js"></script>
    <script src="total.js"></script>
    <script src="fill_up.js"></script>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Passed But Not Enrolled Applicant</h5>
                <div class="dropdown me-3  d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php echo $count+$count_new; ?></span></i>
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
                                <span class="badge bg-primary rounded-pill"><?php echo $count_new ?></span>
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
                
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                List of of applicant who passed but not enrolled
                        </div>
                            <div class="card-body">
                                <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?> 
                                <div class="table-responsive">
                        <table id="Mytableid">
                            <thead style="text-align: center;">
                                <tr>
                                    <th width="15%">App Number</th>
                                    <th width="20%">Full Name</th>
                                    <th width="10%">Gender</th>
                                    <th width="15%">Address</th>
                                    <th width="15%">School Graduated</th>
                                    <th width="10%">Admission Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $start = $rows11['academic_start'];
                                    $end = $rows11['academic_end'];
                                    $semester = $rows111['semester_name'];
                                   
                                    $academic = "$start-$end";
                                    
                                    $query1 = "SELECT * FROM students INNER JOIN admission_score a on students.applicant_id = a.applicant_id where status_type='Applicant' AND academic = '$academic' AND semester_id = '$semester'";

                                    $query_run1 = mysqli_query($conn, $query1);
                                    $count = 0;

                                    if(mysqli_num_rows($query_run1) > 0)
                                    {
                                        while($student = mysqli_fetch_array($query_run1))
                                        {
                                            
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?= $student['applicant_id']; ?></td>
                                                <td style="text-align:left"><?= $student['fname'];?> <?= $student['mname'];?> <?= $student['lname'];?></td>
                                                <td><?= $student['gender']; ?></td>
                                                
                                                <td><?= $student['address']; ?></td>
                                                <td><?= $student['school_graduated']; ?></td>
                                                <td><?= $student['total_cat']; ?></td>
                                                

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
    <script src="../../assets/js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
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
                $('#'+id).html('Accepting Request');
                $('#'+id).addClass('btn-danger');
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
function select_all(){
    if(jQuery('#delete').prop("checked")){
        jQuery('input[type=checkbox]').each(function(){
            jQuery('#'+this.id).prop('checked',true);
        });
    }else{
        jQuery('input[type=checkbox]').each(function(){
            jQuery('#'+this.id).prop('checked',false);
        });
    }
}

function delete_all(){
    var check=confirm("Are you sure?");
    if(check==true){
        jQuery.ajax({
            url:'delete.php',
            type:'post',
            data:jQuery('#frm').serialize(),
            success:function(result){
                jQuery('input[type=checkbox]').each(function(){
                    if(jQuery('#'+this.id).prop("checked")){
                        jQuery('#box'+this.id).remove();
                    }
                });
            }
        });
    }
}
</script>   
</body>

</html>