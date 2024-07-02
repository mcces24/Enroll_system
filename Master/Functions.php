<?ph
header("Access-Control-Allow-Origin: *");
session_start();

//include Model
$functionDIR = BASE_PATH . '/Master/';
$phpFilesFunctions = glob($functionDIR . '*.php');
foreach ($phpFilesFunctions as $phpFilesFunction) {
    include_once $phpFilesFunction;
}


// Function to get the active academic year
// function getActiveAcademicYear() {
//     global $studentController; // Use global to access the variable declared outside the function
//     $activeAcademicYear = $studentController->getActiveAcademicYear();
//     // Process $activeAcademicYear or return whatever logic you need
//     return $activeAcademicYear;
// }
