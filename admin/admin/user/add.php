<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();
        try{
            //use prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO users (name, username, password, role, address, contact, department, status) VALUES (:name, :username, :password, :role, :address, :contact, :department, :status)");
            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ( $stmt->execute(array(':name' => $_POST['name'] , ':username' => $_POST['username'] , ':password' => $_POST['password'], ':role' => $_POST['role'], ':address' => $_POST['address'], ':contact' => $_POST['contact'], ':department' => $_POST['department'], ':status' => $_POST['status'])) ) ? 'Users Added' : 'Something went wrong. Cannot add member';  
         
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
 
    else{
        $_SESSION['message'] = 'Fill up add form first';
    }
 
    header('Location: '. $_SERVER['HTTP_REFERER']);
     
?>