<?php
// Load the database configuration file
include_once '../../../database/dbConfig.php';
session_start();

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
                $semester_id = mysqli_real_escape_string($conn, $_POST['semester_id']);
                $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
                $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
                $section_id = mysqli_real_escape_string($conn, $_POST['section_id']);
                $academic_year = mysqli_real_escape_string($conn, $_POST['academic_year']);
                $subject_code   = $line[0];
                $subject_name  = $line[1];
                $units  = $line[2];
                $lab_unit = $line[3];
                $days = $line[4];
                $time_sched = $line[5];
                $room = $line[6];
                $instructor = $line[7];

                $prevQueryConnect = "SELECT * FROM subject_connects WHERE subject_code = '$subject_code' AND section_id = $section_id AND academic_year = '$academic_year' ";
                $prevResultConnect = $db->query($prevQueryConnect);

                if ($prevResultConnect->num_rows > 0) {
                    // Update member data in the database
                    $db->query("UPDATE subject_connects SET days = '$days', time_sched = '$time_sched', room = '$room', instructor = '$instructor' WHERE subject_code = '$subject_code' AND academic_year = '$academic_year' AND course_id = '$course_id' ");
                } else {
                    // Insert member data in the database
                    $db->query("INSERT INTO subject_connects (subject_code, days, time_sched, room, instructor, academic_year, section_id, course_id) 
                    VALUES ('" . $subject_code . "', '" . $days . "', '" . $time_sched . "', '" . $room . "', '" . $instructor . "', '" . $academic_year . "', '" . $section_id . "', '" . $course_id . "')");
                }
            }

            // Close opened CSV file
            fclose($csvFile);
           $_SESSION['status'] = 'success';
           $_SESSION['type'] = 'success';
           $_SESSION['message'] = 'Subject Uploaded Successfully!';
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['type'] = 'error';
            $_SESSION['message'] = 'Subject Not Updloaded!';
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['type'] = 'error';
        $_SESSION['message'] = 'Subject Not Updloaded!';
    }
    header("Location: ./");
}

if (isset($_POST['importSubmit_fees'])) {

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
                $semester_id = mysqli_real_escape_string($conn, $_POST['semester_id1']);
                $course_id = mysqli_real_escape_string($conn, $_POST['course_id1']);
                $year_id = mysqli_real_escape_string($conn, $_POST['year_id1']);
                $library   = $line[0];
                $computer  = $line[1];
                $school_id  = $line[2];
                $athletic = $line[3];
                $admission = $line[4];
                $development = $line[5];
                $guidance = $line[6];
                $handbook = $line[7];
                $entrance = $line[8];
                $registration = $line[9];
                $medical = $line[10];
                $cultural = $line[11];
                $nstp = $line[11];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT fees_id FROM fees WHERE semester_id = '$semester_id' AND course_id = '$course_id' AND year_id = '$year_id'";
                $prevResult = $db->query($prevQuery);

                if ($prevResult->num_rows > 0) {
                    // Update member data in the database
                    $db->query("UPDATE fees SET library = '$library',computer = '$computer',school_id = '$school_id',athletic = '$athletic',admission = '$admission',development = '$development',guidance = '$guidance',handbook = '$handbook',entrance = '$entrance',registration = '$registration',medical = '$medical',cultural = '$cultural',nstp = '$nstp', ");
                } else {
                    // Insert member data in the database
                    $db->query("INSERT INTO fees (library, computer, school_id, athletic, admission, development, guidance, handbook, entrance, registration, medical, cultural, nstp, semester_id, course_id, year_id) VALUES ('" . $library . "', '" . $computer . "', '" . $school_id . "', '" . $athletic . "', '" . $admission . "', '" . $development . "', '" . $guidance . "', '" . $handbook . "', '" . $entrance . "', '" . $registration . "', '" . $medical . "', '" . $cultural . "', '" . $nstp . "', '" . $semester_id . "', '" . $course_id . "', '" . $year_id . "')");
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