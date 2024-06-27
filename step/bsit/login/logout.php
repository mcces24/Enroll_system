<?php
include '../../../database/config.php';
session_start();
unset($_SESSION["SESSION_BSIT"]);


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "UPDATE users SET online='0' WHERE id='$id' ";
	$result1 = mysqli_query($conn, $query);
	if ($result1) {
		header("Location: ./");
	}
}

?>