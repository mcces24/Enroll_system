 <?php
$template = array(
    array(
      'Applicant ID',
      'Admission Score',
   ),
);

// Set headers to force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="AdmissionTestScoreTemplate.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Write template data to CSV
foreach ($template as $row) {
    fputcsv($output, $row);
}

// Close output stream
fclose($output);
