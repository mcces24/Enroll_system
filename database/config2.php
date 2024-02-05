<?php 
	$host = 'localhost';
$username = 'u524183941_mcces';
$pass = 'MccAdmin1';
$db = 'u524183941_mcc_es';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
     die("Connection Failed". $db->connect_error);
}
 ?>