<?php
    session_start();
    include_once('../../../database/connection.php');

    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();
        try{
            // Hash the password before storing it
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Use prepared statement to prevent SQL injection
            $stmt = $db->prepare("INSERT INTO users (name, username, password, role, address, contact, department, status) 
                                  VALUES (:name, :username, :password, :role, :address, :contact, :department, :status)");

            // Execute the prepared statement with array mapping
            $_SESSION['message'] = ( $stmt->execute(array(
                ':name' => $_POST['name'], 
                ':username' => $_POST['username'], 
                ':password' => $hashedPassword, // Store the hashed password
                ':role' => $_POST['role'], 
                ':address' => $_POST['address'], 
                ':contact' => $_POST['contact'], 
                ':department' => $_POST['department'], 
                ':status' => $_POST['status']
            )) ) ? 'User Added' : 'Something went wrong. Cannot add member';  
         
        } catch(PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        // Close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up add form first';
    }

    header('Location: '. $_SERVER['HTTP_REFERER']);
?>
