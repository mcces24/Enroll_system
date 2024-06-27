<?php

// Load the database configuration file 
require '../../../database/config.php';

// Fetch records from database 
$query = $conn->query("SELECT * FROM students INNER JOIN student_acc s ON students.id_number = s.id_number INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id = y.year_id ORDER BY students.id ASC");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "CSV_MCC_PRINTING.csv";
    // Create a file pointer 
    $f = fopen('php://memory', 'w');
    // Set column headers 
    $fields = array('FIRST NAME', 'LAST NAME', 'MIDDLE NAME', 'COURSE', 'YEAR', 'CONTACT', 'EMAIL', 'ID NUMBER', 'PASSWORD', 'TYPE', 'QR CODE');
    fputcsv($f, $fields, $delimiter);
    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $query->fetch_assoc()) {
        $id_number = $row['id_number'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $address = $row['address'];
        $guardian = $row['guardian'];
        $guardian_address = $row['guardian_address'];
        $qr_code = "ID Number:  $id_number
Name: $lname, $fname $mname
Address: $address
Guardian: $guardian, $guardian_address";
        $lineData = array($row['fname'], $row['lname'], $row['mname'], $row['course_code'], $row['year_name'], $row['contact'], $row['email'], $row['id_number'], md5($row['pass']), '2', $qr_code);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file 
    fseek($f, 0);

    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer 
    fpassthru($f);
}
exit;
