<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "u524183941_mcces";
$dbPassword = "MccAdmin1";
$dbName     = "u524183941_mcc_es";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}