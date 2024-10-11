<?php
// Check if the file is loaded (e.g., index.php)
if (basename($_SERVER['PHP_SELF']) != 'env.php') {
    // Redirect to index.php if not already there
    header("Location: " . BASE_PATH_URL . "/index.php");
    exit();  // Stop further execution of the script
}

// Define the base directory path
define('BASE_PATH', dirname(__FILE__));
define('BASE_PATH_URL', 'https://madridejoscommunitycollege.com');

// Define Database Constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'u510162695_mcc_es');
define('DB_USER', 'u510162695_mcces');
define('DB_PASSWORD', 'MccAdmin1');
