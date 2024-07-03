<?php 
$db = db_conn();
// Assuming $db is your PDO database connection
$qrcodeController = new QrcodeController($db);

// Function get the active academic year
// function getCourse($params = array()) {
//     global $qrcodeController; // Assuming $academicController is declared and accessible

//     try {
//         $qrCode = $qrcodeController->getQrcodeData($params);
        
//         // Validate the fetched data
//         if (empty($qrCode) || !isset($qrCode)) {
//             throw new Exception("No active academic year found");
//         }

//         // Return the first element (assuming there's only one active academic year)
//         return $qrCode;
//     } catch (PDOException $e) {
//         // Handle PDOException (database connection issues, etc.)
//         //echo "PDOException in getActiveAcademicYear(): " . $e->getMessage();
//         return false; // or handle the error in another way
//     } catch (Exception $e) {
//         // Handle other exceptions
//         //echo "Exception in getActiveAcademicYear(): " . $e->getMessage();
//         return false; // or handle the error in another way
//     }
// }

