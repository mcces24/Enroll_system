<?php
session_start();

require_once('../../database/db.php');

if (isset($_POST['image'])) {
    $get_id = $_REQUEST['id'];
    $id_number = $_REQUEST['id_number'];

    // Move the uploaded file
    $uploadDirectory = "uploads/";
    $uploadFile = $uploadDirectory . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
        $location1 = $_FILES["image"]["name"];

        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute the update statement
            $sql = "UPDATE qrcode SET picture = :picture WHERE student_id = :id_number";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':picture', $location1);
            $stmt->bindParam(':id_number', $id_number);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Image Upload/Update Successfully";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['message'] = "Image Upload/Update Failed";
                $_SESSION['messages_icon'] = 'error';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } catch (PDOException $e) {
            // Handle PDO exception
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
