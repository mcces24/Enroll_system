<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$courseController = new CourseController($db);

// Function get the active academic year
function getCourse() {
    global $courseController; // Assuming $academicController is declared and accessible

    try {
        $course = $courseController->getCourse();
        
        // Validate the fetched data
        if (empty($course) || !isset($course)) {
            throw new Exception("No active academic year found");
        }

        // Return the first element (assuming there's only one active academic year)
        return $course;
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

