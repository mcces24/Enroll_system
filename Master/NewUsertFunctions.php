<?php
header("Access-Control-Allow-Origin: *");
$db = db_conn();
// Assuming $db is your PDO database connection
$newUserController = new NewUserController($db);

function getLoginUserId() {
    global $newUserController; // Use global to access the variable declared outside the function
    $userId = $newUserController->getLoginUserId();
    // Process $isLogin or return whatever logic you need
    return $userId;
}

function getLoginEmail() {
    global $newUserController; // Use global to access the variable declared outside the function
    $userId = $newUserController->getLoginEmail();
    // Process $isLogin or return whatever logic you need
    return $userId;
}

// Function to check if a student is logged in
function isStudentLogin() {
    global $newUserController; // Use global to access the variable declared outside the function
    $isLogin = $newUserController->isStudentLogin();
    // Process $isLogin or return whatever logic you need
    return $isLogin;
}

function getVerifiedData($verify) {
    global $newUserController; // Use global to access the variable declared outside the function

    try {
        $getVerifiedData = $newUserController->verifiedData($verify);
        return $getVerifiedData;
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in getVerifiedData(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function getLoginUser($username, $password) {
    global $newUserController; // Use global to access the variable declared outside the function

    try {
        $getVerifiedData = $newUserController->login($username, $password);
        return $getVerifiedData;
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in getLoginUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function ifEmailExists($email) {
    global $newUserController; // Use global to access the variable declared outside the function

    try {
        $getVerifiedData = $newUserController->ifEmailExists($email);
        return $getVerifiedData;
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in ifEmailExists(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function createNewUser($params = array()) {
    global $newUserController; // Use global to access the variable declared outside the function

    try {
        $getVerifiedData = $newUserController->addNewUser($params);
        return $getVerifiedData;
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in createNewUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}
