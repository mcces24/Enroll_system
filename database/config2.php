<?php 

include '../env.php';

$db = new mysqli($host,$username,$password,$db_name);

if ($db->connect_error) {
     die("Connection Failed". $db->connect_error);
}
 ?>