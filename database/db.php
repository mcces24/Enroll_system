<?php 
include '../env.php';
$conn =  new PDO("mysql:host=$host;dbname=$db_name", "$username", "$password");
?>