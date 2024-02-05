<?php
    session_start();
    require '../../database/config.php';

    if (!isset($_SESSION['SESSION_STUDENTS'])) {
        header("Location: login/index.php");
        die();
    }
else{
  $username = $_SESSION['SESSION_STUDENTS'];
}
?>

<?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM students INNER JOIN year_lvl y ON students.year_id = y.year_id INNER JOIN sections s ON students.section_id = s.section_id INNER JOIN course c ON students.course_id = c.course_id WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student1 = mysqli_fetch_array($query_run);
                                ?><?php
                            }
                            
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
    <link rel="icon" type="image" href="../../icon.png">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- end: CSS -->
    <title>Study Load | Students - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    
   
    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
            font-size: 10px;
            text-align: center;
            margin: 5%;
        }
        #invoice{
            width: 90%;
            margin: 5%;
        }
        @media print{
                                                        @page{
                                                            size: landscape;
                                                        }
                                                        body{
                                                            size: A4;
                                                        }
                                                        .card{
                                                            margin-top: -50px;
                                                        }
                                                    }
    </style>


</head>

<body style="width: 90%;" onload = "autoClick();">

       
   
    <div id="invoice">
    <?php 

                                    
                                    
                                        $id1 =  $student1['id'];
                                        $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id = y.year_id INNER JOIN sections s ON students.section_id = s.section_id WHERE id = '$id1'  ";
                                        $query_run = mysqli_query($conn, $query);
                                        $count = 0;

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                $id=$student['id'];
                                                
                                                $query1 = "SELECT * FROM qrcode WHERE student_id = '$id'  ";
                            $query_run1 = mysqli_query($conn, $query1);

                            if(mysqli_num_rows($query_run1) > 0)
                            {
                                $qrcode = mysqli_fetch_array($query_run1);
                                ?><?php
                            }
                              ?>

    <?php
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
                                    

                                ?>
                                <div style="height: 100%; margin: 0 auto; text-align: center;">
                                <img src="mcc-back.png">
                            </div>
    <table id="Mytableid" class="table table-bordered" style="text-align: center;">
      <thead>
        <tr>
            <th colspan="7">Study Load</th>
        </tr>
        <tr>
            <th>SUBJECT CODE</th>
            <th>SUBJECT DESCRIPTION</th>
            <th>UNITS</th>
            <th>DAYS</th>
            <th>TIME</th>
            <th>ROOM</th>
            <th>INSTRUCTOR</th>
        </tr>
      </thead>
      <tbody>
<?php


require '../../database/regis.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$section_id1 = $student['section_id'];
$semester_id1 = $student['semester_id'];
$sql = "SELECT subject_code, subject_name, units, days, time_sched, room, instructor FROM subjects WHERE section_id=$section_id1 AND semester_id = '$semester_id1' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>

    
    <tr>
      <td><?php echo  $row["subject_code"] ?></td>
      <td><?php echo  $row["subject_name"] ?></td>
      <td><?php echo  $row["units"] ?></td>
      <td><?php echo  $row["days"] ?></td>
      <td><?php echo  $row["time_sched"] ?></td>
      <td><?php echo  $row["room"] ?></td>
      <td><?php echo  $row["instructor"] ?></td>
    </tr>

    
    
<?php  }
 }   else {
  echo "No Subject Added. Please contact Admin!!";
}
?>
                                

                                
                            </tbody>
                        </table>
                    </div>
                        <button id="download-button" class="btn btn-sm btn-success">Download as PDF</button>
                         <a class="btn btn-sm btn-success" id="download">Download as Image</a>

</body>

</html>
<script>
            const button = document.getElementById('download-button');

            function generatePDF() {
                // Choose the element that your content will be rendered to.
                const element = document.getElementById('invoice');
                // Choose the element and save the PDF for your user.
                html2pdf().from(element).save();
            }

            button.addEventListener('click', generatePDF);
        </script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
     <script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#invoice");

        $("#download").on('click', function(){

          html2canvas(element, {
            onrendered: function(canvas) {
              var imageData = canvas.toDataURL("image/jpg");
              var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
              $("#download").attr("download", "image.jpg").attr("href", newData);
            }
          });

        });
      });
    </script>