 <?php
$template = array(
    array(
      'Library',
      'Computer',
      'School ID',
      'Athletic',
      'Admission',
      'Development',
      'Guidance',
      'Handbook',
      'Entrance',
      'Registration',
      'Medical',
      'Cultural',
      'NSTP',
   ),
);

// Set headers to force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="FeesTemplate.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Write template data to CSV
foreach ($template as $row) {
    fputcsv($output, $row);
}

// Close output stream
fclose($output);
