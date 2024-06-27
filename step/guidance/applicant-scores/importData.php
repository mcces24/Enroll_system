<?php
// Load the database configuration file
include_once '../../../database/dbConfig.php';
include_once '../../../database/dbcon.php';


if (isset($_POST['importSubmit'])) {

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
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


                if ($prevResult->num_rows > 0) {
                    // Update member data in the database
                    $db->query("UPDATE admission_score SET comp = '$comp', com_cate = '$com_cate', reas = '$reas', reas_cat = '$reas_cat', verbal = '$verbal', verbal_stanine = '$verbal_stanine', verbal_percen = '$verbal_percen', verbal_cat = '$verbal_cat', quan = '$quan', quan_cat = '$quan_cat', figu = '$figu', figu_cat = '$figu_cat', nonver = '$nonver', nonver_stanine = '$nonver_stanine', nonver_percen = '$nonver_percen', nonver_cat = '$nonver_cat', total_raw = '$total_raw', total_stanine = '$total_stanine', total_percen = '$total_percen', total_cat = '$total_cat', age = '$age'  WHERE applicant_id = '$line[0]' ");
                } else {
                    // Insert member data in the database
                    $db->query("INSERT INTO admission_score (applicant_id, comp, com_cate, reas, reas_cat, verbal, verbal_stanine, verbal_percen, verbal_cat, quan, quan_cat, figu, figu_cat, nonver, nonver_stanine, nonver_percen, nonver_cat, total_raw, total_stanine, total_percen, total_cat, age) VALUES ('$applicant_id', '$comp', '$com_cate', '$reas', '$reas_cat', '$verbal', '$verbal_stanine', '$verbal_percen', '$verbal_cat', '$quan', '$quan_cat', '$figu', '$figu_cat', '$nonver', '$nonver_stanine', '$nonver_percen', '$nonver_cat', '$total_raw', '$total_stanine', '$total_percen', '$total_cat', '$age')");
                }
            }

            // Close opened CSV file
            fclose($csvFile);
            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
    header("Location: ./" . $qstring);
}

if (isset($_POST['addscore'])) {
    $applicant_id  = $_POST['applicant_id'];
    $comp = mysqli_real_escape_string($conn, $_POST['comp']);
    $com_cate = mysqli_real_escape_string($conn, $_POST['com_cate']);
    $reas = mysqli_real_escape_string($conn, $_POST['reas']);
    $reas_cat = mysqli_real_escape_string($conn, $_POST['reas_cat']);
    $verbal = mysqli_real_escape_string($conn, $_POST['verbal']);
    $verbal_stanine = mysqli_real_escape_string($conn, $_POST['verbal_stanine']);
    $verbal_percen = mysqli_real_escape_string($conn, $_POST['verbal_percen']);
    $verbal_cat = mysqli_real_escape_string($conn, $_POST['verbal_cat']);
    $quan = mysqli_real_escape_string($conn, $_POST['quan']);
    $quan_cat = mysqli_real_escape_string($conn, $_POST['quan_cat']);
    $figu = mysqli_real_escape_string($conn, $_POST['figu']);
    $figu_cat = mysqli_real_escape_string($conn, $_POST['figu_cat']);
    $nonver = mysqli_real_escape_string($conn, $_POST['nonver']);
    $nonver_stanine = mysqli_real_escape_string($conn, $_POST['nonver_stanine']);
    $nonver_percen = mysqli_real_escape_string($conn, $_POST['nonver_percen']);
    $nonver_cat = mysqli_real_escape_string($conn, $_POST['nonver_cat']);
    $total_raw = mysqli_real_escape_string($conn, $_POST['total_raw']);
    $total_stanine = mysqli_real_escape_string($conn, $_POST['total_stanine']);
    $total_percen = mysqli_real_escape_string($conn, $_POST['total_percen']);
    $total_cat = mysqli_real_escape_string($conn, $_POST['total_cat']);
    $age   = mysqli_real_escape_string($conn, $_POST['age']);

    $checkID = "SELECT applicant_id FROM students WHERE applicant_id = '$applicant_id'";
    $results = $db->query($checkID);
    if ($results->num_rows > 0) {
        $checkApp = "SELECT applicant_id FROM admission_score WHERE applicant_id = '$applicant_id'";
        $checkResults = $db->query($checkApp);
        if ($checkResults->num_rows > 0) {
            $qstring = '?status=exits';
        } else {
            $db->query("INSERT INTO admission_score (applicant_id, comp, com_cate, reas, reas_cat, verbal, verbal_stanine, verbal_percen, verbal_cat, quan, quan_cat, figu, figu_cat, nonver, nonver_stanine, nonver_percen, nonver_cat, total_raw, total_stanine, total_percen, total_cat, age) VALUES ('$applicant_id', '$comp', '$com_cate', '$reas', '$reas_cat', '$verbal', '$verbal_stanine', '$verbal_percen', '$verbal_cat', '$quan', '$quan_cat', '$figu', '$figu_cat', '$nonver', '$nonver_stanine', '$nonver_percen', '$nonver_cat', '$total_raw', '$total_stanine', '$total_percen', '$total_cat', '$age')");
            $qstring = '?status=addsuccess';
        }
    } else {
        $qstring = '?status=notfound';
    }

    header("Location: ./" . $qstring);
}
