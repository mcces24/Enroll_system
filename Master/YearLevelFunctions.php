<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$yearLevelController = new YearLevelController($db);

function getYearLevel() {
    global $yearLevelController; // Assuming $academicController is declared and accessible

    try {
        $yearLevel = $yearLevelController->getYearLevel();
        
        // Validate the fetched data
        if (empty($yearLevel) || !isset($yearLevel)) {
            throw new Exception("No active academic year found");
        }

        // Return the first element (assuming there's only one active academic year)
        return $yearLevel;
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

function getYearLevelByCourseId($courseId) {
    global $yearLevelController; // Assuming $academicController is declared and accessible

    try {
        $yearLevel = $yearLevelController->getYearLevelByCourse($courseId);
        
        // Validate the fetched data
        if (empty($yearLevel) || !isset($yearLevel)) {
            throw new Exception("No active academic year found");
        }

        // Return the first element (assuming there's only one active academic year)
        return $yearLevel;
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

