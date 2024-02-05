<?php
// Load the database configuration file
include_once '../../../database/dbConfig.php';
include_once '../../../database/dbcon.php';


if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                require '../../../database/dbcon.php';
                $applicant_id   = $line[0];
                $comp   = $line[1];
                $com_cate   = $line[2];
                $reas   = $line[3];
                $reas_cat   = $line[4];
                $verbal   = $line[5];
                $verbal_stanine   = $line[6];
                $verbal_percen   = $line[7];
                $verbal_cat   = $line[8];
                $quan   = $line[9];
                $quan_cat   = $line[10];
                $figu   = $line[11];
                $figu_cat   = $line[12];
                $nonver   = $line[13];
                $nonver_stanine   = $line[14];
                $nonver_percen   = $line[15];
                $nonver_cat   = $line[16];
                $total_raw   = $line[17];
                $total_stanine   = $line[18];
                $total_percen   = $line[19];
                $total_cat   = $line[20];
                $age   = $line[21];
                
                
                $code = 'Applicant';
                $query = mysqli_query($conn, "UPDATE students SET status_type='$code' WHERE applicant_id = '$line[0]'");
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT admission_id FROM admission_score WHERE applicant_id = '$line[0]'";
                $prevResult = $db->query($prevQuery);

                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE admission_score SET comp = '$comp', com_cate = '$com_cate', reas = '$reas', reas_cat = '$reas_cat', verbal = '$verbal', verbal_stanine = '$verbal_stanine', verbal_percen = '$verbal_percen', verbal_cat = '$verbal_cat', quan = '$quan', quan_cat = '$quan_cat', figu = '$figu', figu_cat = '$figu_cat', nonver = '$nonver', nonver_stanine = '$nonver_stanine', nonver_percen = '$nonver_percen', nonver_cat = '$nonver_cat', total_raw = '$total_raw', total_stanine = '$total_stanine', total_percen = '$total_percen', total_cat = '$total_cat', age = '$age'  WHERE applicant_id = '$line[0]' ");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO admission_score (applicant_id, comp, com_cate, reas, reas_cat, verbal, verbal_stanine, verbal_percen, verbal_cat, quan, quan_cat, figu, figu_cat, nonver, nonver_stanine, nonver_percen, nonver_cat, total_raw, total_stanine, total_percen, total_cat, age) VALUES ('$applicant_id', '$comp', '$com_cate', '$reas', '$reas_cat', '$verbal', '$verbal_stanine', '$verbal_percen', '$verbal_cat', '$quan', '$quan_cat', '$figu', '$figu_cat', '$nonver', '$nonver_stanine', '$nonver_percen', '$nonver_cat', '$total_raw', '$total_stanine', '$total_percen', '$total_cat', '$age')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            $qstring = '?status=succ';
            
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
     header("Location: index.php".$qstring);
}


?>


