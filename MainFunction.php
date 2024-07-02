<?php
include 'env.php';

//include Model
$modelDIR = BASE_PATH . '/Master/Model/';
$phpFilesModels = glob($modelDIR . '*.php');
foreach ($phpFilesModels as $phpFileModel) {
    include_once $phpFileModel;
}

//include Controller
$controllerDIR = BASE_PATH . '/Master/Controller/';
$phpFilesControllers = glob($controllerDIR . '*.php');
foreach ($phpFilesControllers as $phpFilesController) {
    include_once $phpFilesController;
}
//iclude fucntion
$fuctionDIR = BASE_PATH . '/Master/';
include_once $fuctionDIR . 'Functions.php';


function db_conn() {
    $database = new Database();
    $db = $database->connect();
    
    // Check if the connection is successful
    if ($db === false) {
        // Handle connection error (you can log, throw an exception, etc.)
        // For example, throwing an exception:
        throw new Exception("Database connection failed");
    }
    
    return $db;
}