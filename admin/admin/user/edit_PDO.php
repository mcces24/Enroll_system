<?php
session_start();
require_once ('../../../database/db.php');

if (isset($_POST['image'])) {
    $get_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure id is an integer
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
    
    // Check if the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
        $location1 = basename($_FILES["image"]["name"]);

        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL query to prevent SQL injection
        $sql = "UPDATE users SET profile = :profile WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':profile', $location1);
        $stmt->bindParam(':id', $get_id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Image uploaded/updated successfully.";
        } else {
            $_SESSION['message'] = "Failed to update image.";
            $_SESSION['message_icon'] = 'error'; // Added for potential use in frontend alerts
        }
    } else {
        $_SESSION['message'] = "Failed to upload image.";
        $_SESSION['message_icon'] = 'error'; // Added for potential use in frontend alerts
    }

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>



<?php

require_once ('../../../database/db.php');


if(isset($_POST['imageadmin']))
{
$get_id=$_GET['id'];
echo $get_id;

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);         
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE admin SET profile ='$location1' WHERE id = '$get_id' ";

$conn->exec($sql);
$query_run = mysqli_query($conn, $sql);
if($query_run)
    {
        $_SESSION['message'] = "Image Upload/Update Successfully";
        
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $_SESSION['messages'] = "Image Upload/Update Successfully";
        $_SESSION['messages_icon'] = 'success';
        header('Location: '. $_SERVER['HTTP_REFERER']);        
    }
}
?>
