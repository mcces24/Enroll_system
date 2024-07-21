 <?php
$template = array(
    array(
      'Subject Code',
      'Subject Name',
      'Units',
      'Laboratory Units',
      'Days',
      'Time',
      'Room',
      'Instructor',
   ),
);

// Set headers to force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="SubjectsCSVTemplate.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Write template data to CSV
foreach ($template as $row) {
    fputcsv($output, $row);
}

// Close output stream
fclose($output);
