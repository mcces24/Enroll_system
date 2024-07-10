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

function acceptedApplicantFunction() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->acceptedApplicantController();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function sendGuidanceFormFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->sendGuidanceFormController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}

function getAppicantByApplicantIdFunction($applicantId, $params = array()) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->getAppicantByApplicantIdController($applicantId, $params);
    // Process $isLogin or return whatever logic you need
    return $response;
}

function saveApplicantGuidanceRecordFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->saveApplicantGuidanceRecordController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}

function updateApplicantStatusFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->updateApplicantStatusController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}

function applicantAdmissionFunction() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->applicantAdmissionController();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function sendAdmissionFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->sendAdmissionController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}

function applicantGuidanceFormDataFunction() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->applicantGuidanceFormDataController();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function applicantScoresFunction() {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->applicantScoresController();
    // Process $isLogin or return whatever logic you need
    return $response;
}

function addApplicantScoresFunction($data) {
    global $guidanceController; // Use global to access the variable declared outside the function
    $response = $guidanceController->addApplicantScoresController($data);
    // Process $isLogin or return whatever logic you need
    return $response;
}




