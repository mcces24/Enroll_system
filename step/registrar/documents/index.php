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
    <script src="script.js"></script>
    <!-- end: CSS -->
    <title>Documents | Registrar Office - Madridejos Community College</title>
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
                <h5 class="fw-bold mb-0 me-auto">Documents</h5>
                
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
                    <div class="col-12 col-md-5 col-xl-12">
                    <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Students
                            </div>
                            <div class="card-body" style="width: 50%;">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3 search-box">
                                        <input  type="text" autocomplete="off" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Input ID Number here!">
                                        <div class="result"></div>
                                        <button  type="submit" class="btn btn-primary" >Search Students</button>
                                    </div>      
                                    </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-7 col-xl-12">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                    <?php 
                    if(isset($_GET['search']))
                                 {    ?>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                               Results
                            </div>
                            <div class="card-body">
                                
                                
                             
                        <table >
                            
                            
                            
                                <?php 

                                    
                                        $filtervalues = $_GET['search'];

                                        $start = $rows11['academic_start'];
                                        $end = $rows11['academic_end'];
                                        $semester = $rows111['semester_name'];
                                        $query = "SELECT * FROM documents INNER JOIN students ON documents.id_number = students.id_number INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id  INNER JOIN sections s ON students.section_id=s.section_id WHERE (status_type = 'Enroll New Students' OR status_type = 'Enroll Old' OR status_type = 'New Students') AND semester_id = '$semester' AND academic = '$academic' AND CONCAT(documents.id_number) LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                
                                                
                                               
                                       

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                ?>
                                                                       
                        
                                                    
                                                
                                                   
                                                
                                      
                                                <?php include('update_doc.php'); ?>

                                               
                                          
                                                <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Name:</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['lname'] ?>, <?php echo $student['fname'] ?> <?php echo $student['mname'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Year | Course | Section</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['year_name'] ?> <?php echo $student['course_code'] ?> <?php echo $student['sections'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Gender</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['gender'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>NSO</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['nso'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Card</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['card'] ?></p>
                                                    </div>
                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                        <label class="mb-1"><span>Good Moral</span></label>
                                                        <p style="width: 90%;" class="form-control"><?php echo $student['good_moral'] ?></p>
                                                    </div>
                                                </div>
                                                
                                                <tr style="text-align: center;">
                                                
                                                <td hidden><?= $student['id_number']; ?></td>
                                                <td hidden ><?= $student['id_number']; ?></td> 
                                                <td><span hidden></span></td>
                                                <td width="100%"> 
                                                    <a href="#update_<?php echo $student['id_number']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update Document</a>
                                                    
                                                </td>
                                            </tr>
                                                
                                                
                                                <?php
                                            }
                                        }
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="6" style="text-align:center;">No ID Number Found!!</td>
                                                </tr>
                                                
                                            <?php
                                        }
                                    }

                                ?>

                                

                                
                            
                        </table>
                        
                    </form>

                        <?php else: ?>
                       
                        <div class="card border-0 shadow-sm h-100">

                            <div class="card-body">
<h2>Pre-Enrollemnt is currently not Available</h2>
</div>
</div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>

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