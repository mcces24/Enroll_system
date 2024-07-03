<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$enroll = new EnrollController($db);

// Function get the active academic year
function getActiveEnroll() {
    global $enroll; // Assuming $enroll is declared and accessible

    try {
        $activeEnroll = $enroll->getActiveEnroll();
        
        // Validate the fetched data
        if (empty($activeEnroll) || !isset($activeEnroll[0])) {
            throw new Exception("No active enrollments found");
        }

        // Return the first element (assuming there's only one active enrollment)
        return $activeEnroll[0];
    } catch (PDOException $e) {
        // Handle PDOException (database connection issues, etc.)
        //echo "PDOException in getActiveEnroll(): " . $e->getMessage();
        return false; // or handle the error in another way
    } catch (Exception $e) {
        // Handle other exceptions
        //echo "Exception in getActiveEnroll(): " . $e->getMessage();
        return false; // or handle the error in another way
    }
}
