<?php 
	$host = 'localhost';
$username = 'u510162695_mcces';
$pass = 'MccAdmin1';
$db = 'u510162695_mcc_es';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
     die("Connection Failed". $db->connect_error);
}
 ?>
