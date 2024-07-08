<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$guidanceController = new GuidanceController($db);

function isGuidanceLogin() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $isLogin = $guidanceController->isGuidanceLogin();
    // Process $isLogin or return whatever logic you need
    return $isLogin;
}

function loginGuidanceUser($username, $password) {
    global $guidanceController; // Use global to access the variable declared outside the function

    try {
        $getLoginResponse = $guidanceController->login($username, $password);
        return $getLoginResponse;
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in getLoginUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function getGuidanceLoginData(){
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->getGuidanceLoginData();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function getNotifications() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->getNotifications();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function guidanceLogoutNow() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->logout();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function home() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->home();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function newApplicant() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->newApplicant();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function acceptNewApplicantFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->acceptNewApplicantController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}





