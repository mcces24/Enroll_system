<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$academicController = new AcademicController($db);

// Function get the active academic year
function getActiveAcademicYear() {
    global $academicController; // Assuming $academicController is declared and accessible

    try {
        $activeAcademicYear = $academicController->getActiveAcademicYear();
        
        // Validate the fetched data
        if (empty($activeAcademicYear) || !isset($activeAcademicYear[0])) {
            throw new Exception("No active academic year found");
        }

        // Return the first element (assuming there's only one active academic year)
        return $activeAcademicYear[0];
    } catch (PDOException $e) {
        // Handle PDOException (database connection issues, etc.)
        echo "PDOException in getActiveAcademicYear(): " . $e->getMessage();
        return false; // or handle the error in another way
    } catch (Exception $e) {
        // Handle other exceptions
        echo "Exception in getActiveAcademicYear(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}

