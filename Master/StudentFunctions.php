<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$studentController = new StudentController($db);

// Function get the active academic year
function preEnrollStudents($data) {
    global $studentController; // Assuming $semesterController is declared and accessible

    try {
        $getVerifiedData = $studentController->preEnrollAdd($data);
        return $getVerifiedData;
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in createNewUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function getStudentLists() {
    global $studentController; 
    try {
        $getVerifiedData = $studentController->getStudents();
        return !empty($getVerifiedData) ? $getVerifiedData : array();
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in createNewUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function getStudentData() {
    global $studentController; 
    try {
        $studentData = $studentController->getStudents();
        return !empty($studentData) ? $studentData : array();
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in createNewUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

function checkIfAlreadyPreEnroll($data) {
    global $studentController; 
    try {
        $checkIfAlreadyPreEnroll = $studentController->ifAlreadyPreEnrollController($data);
        return !empty($checkIfAlreadyPreEnroll) ? $checkIfAlreadyPreEnroll : array();
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in createNewUser(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}
