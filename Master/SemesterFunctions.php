<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$semesterController = new SemesterController($db);

// Function get the active academic year
function getActiveSemester() {
    global $semesterController; // Assuming $semesterController is declared and accessible

    try {
        $activeSemester = $semesterController->getActiveSemester();
        
        // Validate the fetched data
        if (empty($activeSemester) || !isset($activeSemester[0])) {
            throw new Exception("No active semester found");
        }

        // Optionally, you can perform further validation on specific fields

        // Return the first element (assuming there's only one active semester)
        return $activeSemester[0];
    } catch (PDOException $e) {
        // Handle PDOException (database connection issues, etc.)
        echo "PDOException in getActiveSemester(): " . $e->getMessage();
        return false; // or handle the error in another way
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in getActiveSemester(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}
