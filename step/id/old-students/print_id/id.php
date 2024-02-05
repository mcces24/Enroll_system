<?php
    session_start();
    require '../../../../database/config.php';

    if (!isset($_SESSION['SESSION_ID'])) {
        header("Location: ../../login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_ID'];
}
?>
<?php
require '../../../../database/config.php';
                        if(isset($_GET['id_number']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id_number']);
                            $query = "SELECT * FROM students INNER JOIN course ON students.course_id = course.course_id WHERE id_number='$student_id' ORDER BY id DESC LIMIT 1 ";
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
                        }
                        ?>
<?php
require '../../../../database/config.php';
                        if(isset($_GET['id_number']))
                        {
                            $student_id1 = mysqli_real_escape_string($conn, $_GET['id_number']);
                            $query1 = "SELECT * FROM qrcode WHERE student_id='$student_id' ";
                            $query_run1 = mysqli_query($conn, $query1);

                            if(mysqli_num_rows($query_run1) > 0)
                            {
                                $qrcode = mysqli_fetch_array($query_run1);
                                ?><?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                        <?php
require '../../../../database/config.php';
                        
                            
                            $query1 = "SELECT * FROM academic WHERE status ='1' ";
                            $query_run1 = mysqli_query($conn, $query1);

                            if(mysqli_num_rows($query_run1) > 0)
                            {
                                $semester = mysqli_fetch_array($query_run1);
                                $start=$semester['academic_start'];
                                $end=$semester['academic_end'];
                                $start_plus1 = $start + 1;
                                $end_plus1 = $end + 1;
                                $start_plus2 = $start + 2;
                                $end_plus2 = $end + 2;
                                $start_plus3 = $start + 3;
                                $end_plus3 = $end + 3;
                                
                                ?><?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        
                        ?>
<!doctype html>
<html>
  <head>
    <title>School ID</title>
    <meta charset="UTF-8">
    <meta name="description" content="Your site's description should be here">
    <meta name="keywords" content="Your site's keywords should be here">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image" href="../../../../icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="style.css"> 
    
    <style type="text/css">
      .t{}
    </style>
    <!--[if IE 6]>
	<style type="text/css">
		* html .group {
			height: 1%;
		}
	</style>
  <![endif]--> 
    <!--[if IE 7]>
	<style type="text/css">
		*:first-child+html .group {
			min-height: 1px;
		}
	</style>
  <![endif]--> 
    <!--[if lt IE 9]> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script> 
  <![endif]--> 
  </head>
  <body class="">
    
    <div class="box">
    <div class="global_container_" style="align-content: center;">
      <img class="bunakan-madridejos-cebu" src="images/bunakan_madridejos_cebu.png" alt="" width="885" height="569">
      <div class="id-no-2020-0742-smart-object-group">
        <p class="student">STUDENT</p>
        <div class="row-2 group">
          <p class="t"><?=$student['id_number'];?></p>
          <div class="rectangle1-holder" style="">
            <img class="text" style="width: 220px; height: 220px; margin-top: 0px; margin-left: " src="../../uploads/<?php echo $qrcode['picture']; ?>">
          </div>
        </div>
        <p class="text-2" style="margin-top: 10px; font-size:35px; position:absolute; width: 400px; text-align:center; "><?=$student['fname'];?> <?php 

        $letter=$student['mname'];
        if ($letter != "") {
          // code...
        
        $mname=$letter[0];
        echo "$mname.";}?> <?=$student['lname'];?>
         
        </p>

        <p class="bsit" style="margin-top: 155px; position: absolute; width: 400px;  text-align: center;"><?=$student['course_code'];?></p>
      </div>
      <div class="school-year-smart-object-group group">
        <div class="col">
          <img class="text-3" src="images/dr_floripis_a_montecillo.png" alt="Dr. Floripis A. Montecillo" width="200" height="10" title="Dr. Floripis A. Montecillo">
          <img class="text-4" src="images/college_president.png" alt="College President" width="110" height="8" title="College President">
        </div>
        <div class="col-4">
          <div class="row group">
            <img class="qrcode" src="../../images/<?php echo $qrcode['qrimage']; ?>" alt="" width="141" height="141">
            <img class="in-case1" src="images/in_case1.png" alt="" width="284" height="120">
            <div class="contact">
              <p><?=$student['guardian'];?></p>
              <p><?=$student['guardian_address'];?></p>
              <p><?=$student['contact'];?></p>
            </div>
          </div>
          <div class="wrapper-5">
            
            
            <img class="school-year" src="images/school_year.png"  width="403" height="199">
            <div class="layer-holder">
              <img class="logo" src="images/1611648445561_copy.png">
              <img class="signature" src="images/signature.jpg" alt="" width="249" height="84">
              <img style="position: relative; bottom: 80px" class="signature" src="../../upload/<?php echo $qrcode['signature']; ?>" alt="" width="249" height="84">

            </div>

            <img class="birtdate" src="images/birtdate.png" alt="" width="242" height="35">
            <div class="birtdate1">
              <p><?=$student['date_of_birth'];?></p>
            </div>
            <div class="academic" >
              <p><?=$semester['academic_start'];?>-<?=$semester['academic_end'];?></p>
              <p><?php echo $start_plus1;?>-<?php echo $end_plus1;?></p>
              <p><?php echo $start_plus2;?>-<?php echo $end_plus2;?></p>
              <p><?php echo $start_plus3;?>-<?php echo $end_plus3;?></p>
              
            </div>
          </div>
          <img class="this-is-non-transferable-and-must-be-carried-at-all-times-when" src="images/this_is_non-transferable_.png" alt="" width="380" height="77">
        </div>
      </div>

    </div>
    </div>
    <button id="dw_bt">Download School ID</button>
  </body>
  <script type="text/javascript" src="dom-to-image.js"></script>
    <script type="text/javascript">
        var ticket = document.getElementsByClassName("box")[0];
        var download_button = document.getElementById("dw_bt");

        download_button.addEventListener("click",()=>{
                domtoimage.toPng(ticket).then((data)=>{
                    var link = document.createElement("a");
                    link.download = "<?php echo $student['id_number'];?>_id.png";
                    link.href = data;
                    link.click();
                });
        });
    </script>
</html>