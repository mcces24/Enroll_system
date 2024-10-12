<?php
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
                // Output directory in a "hacker" style
                echo "\033[32m[DIR]  $path\033[0m\n"; // Green for directories
                // Recursively call the function for the subdirectory
                listFiles($path);
            } else {
                // Output the file path in a "hacker" style
                echo "\033[31m[FILE] $path\033[0m\n"; // Red for files
            }
        }
    }
}

// Start scanning from the current directory
listFiles(__DIR__);
?>
