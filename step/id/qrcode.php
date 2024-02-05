<?php
require_once '../../database/connection.php';
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
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

$status_type = $_REQUEST['status_type'];
$student_id = $_REQUEST['student_id'];
$id_number = $_REQUEST['id_number'];




$query1 = mysqli_query($connection,"UPDATE students SET status_type='Picture Done' WHERE id='$student_id'");

$query = mysqli_query($connection,"INSERT INTO qrcode set student_id='$id_number', qrimage='$qrimage', picture='temporary.png'");
	if($query_run)
    {
        $_SESSION['message'] = "Exam Results Added  Successfully";
        $_SESSION['message_icon'] = "success";
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $_SESSION['message'] = "Exam Results Error";
        $_SESSION['message_icon'] = "error";
        header('Location: '. $_SERVER['HTTP_REFERER']);
        
    }
  }

QRcode :: png($text, $qrcode, 'H', 4, 4);
echo "<img src='".$qrcode."'>";

?>