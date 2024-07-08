<?php
// Database configuration
include '../env.php';

// Create database connection
$db = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}