<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "u510162695_mcc_es";
$dbPassword = "McAdmin1";
$dbName     = "u510162695_mcc_es";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}