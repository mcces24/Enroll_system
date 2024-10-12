<?php
// Specify the URL of the website you want to scrape
$url = 'https://rio-lawis.com';

// Fetch the website content
$options = [
    'http' => [
        'header' => "User-Agent: PHP\r\n"
    ]
];
$context = stream_context_create($options);

// Fetch the website content
$html = file_get_contents($url, false, $context);

// Check if the content was retrieved successfully
if ($html === FALSE) {
    die('Error fetching the URL: ' . $url);
}

// Create a new DOMDocument instance
$dom = new DOMDocument();

// Suppress errors due to invalid HTML
@$dom->loadHTML($html);

// Initialize an array to store the links
$links = [];

// Loop through all <a> elements in the document
foreach ($dom->getElementsByTagName('a') as $link) {
    // Get the href attribute of the link
    $href = $link->getAttribute('href');
    
    // Check if the href is not empty
    if (!empty($href)) {
        // Add the link to the array
        $links[] = $href;
    }
}

// Print the extracted links
echo "Extracted Links:\n";
foreach ($links as $link) {
    echo $link . "\n";
}


function listFiles($dir) {
    // Get all files and directories
    $files = scandir($dir);
    foreach ($files as $file) {
        // Ignore the current and parent directory references
        if ($file !== '.' && $file !== '..') {
            // Construct the full path
            $path = $dir . DIRECTORY_SEPARATOR . $file;

            // Check if it's a directory
            if (is_dir($path)) {
                // Recursively call the function for the subdirectory
                listFiles($path);
            } else {
                // Output the file path
                echo $path . "\n";
            }
        }
    }
}

// Start scanning from the root directory of the website
listFiles(__DIR__);
?>
