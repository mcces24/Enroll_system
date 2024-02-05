                          
        
        
        
<?php
require_once '../../../database/connection.php';
require_once 'phpqrcode/qrlib.php';
$path = '../images/';
$qrcode = $path.time().".png";
$qrimage = time().".png";

if(isset($_REQUEST['sbt-btn']))
{
$id_number = $_REQUEST['id_number'];
$fname = $_REQUEST['fname'];
$mname = $_REQUEST['mname'];
$lname = $_REQUEST['lname'];
$address = $_REQUEST['address'];
$guardian = $_REQUEST['guardian'];
$guardian_address = $_REQUEST['guardian_address'];

$text = "
ID Number:  $id_number
Name: $lname, $fname $mname
Address: $address
Guardian: $guardian, $guardian_address
";

$student_id = $_REQUEST['student_id'];
$id_number = $_REQUEST['id_number'];

require '../../../database/config.php';

        $querys1 = "SELECT * FROM qrcode WHERE student_id = '$student_id'";
        $querys_run1 = mysqli_query ($cons, $querys1);

        if (mysqli_num_rows($querys_run1)>0) {
            foreach($querys_run1 as $rows1)
                ?><?php
        }
                                




$id = $rows1['student_id'];


	if($student_id==$id)
    {  
        $query = mysqli_query($connection,"UPDATE qrcode SET qrimage='$qrimage', picture='temporary.png' WHERE student_id ='$id_number'");
        $query2 = mysqli_query($connection,"INSERT into students set status_type='Enroll Old Students' WHERE id ='$student_id'");
        $_SESSION['message'] = "Exam Results Added  Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $query2 = mysqli_query($connection,"UPDATE students set status_type='Enroll Old Students' WHERE id ='$student_id'");
        $query1 = mysqli_query($connection,"INSERT into qrcode set student_id='$id_number', qrimage='$qrimage', picture='temporary.png'");
        $_SESSION['message'] = "Exam Results Added  Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
  }

QRcode :: png($text, $qrcode, 'H', 4, 4);
echo "<img src='".$qrcode."'>";

?>