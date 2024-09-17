<?php
session_start();

require_once('../../../database/db.php');

if (isset($_POST['image'])) {
    $get_id = $_REQUEST['id'];

    // Move the uploaded file
    $uploadDirectory = "../uploads/";
    $uploadFile = $uploadDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
        $location1 = $_FILES["image"]["name"];

        try {
            // Set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement with placeholders
            $sql = "UPDATE qrcode SET picture = :picture WHERE student_id = :student_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':picture', $location1);
            $stmt->bindParam(':student_id', $get_id);

            // Execute the query
            if ($stmt->execute()) {
                $_SESSION['message'] = "Image Upload/Update Successfully";
                $_SESSION['messages_icon'] = 'success';
            } else {
                $_SESSION['message'] = "Image Upload/Update Failed";
                $_SESSION['messages_icon'] = 'error';
            }

            // Redirect back to the referring page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (PDOException $e) {
            // Handle PDO exceptions
            $_SESSION['message'] = "Database error: " . $e->getMessage();
            $_SESSION['messages_icon'] = 'error';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $_SESSION['message'] = "Failed to upload image";
        $_SESSION['messages_icon'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
