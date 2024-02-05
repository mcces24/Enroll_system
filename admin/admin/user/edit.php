<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $users_id = $_POST['users_id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
 
            $sql = "UPDATE users SET name = '$name', username = '$username', password = '$password' WHERE id = '$users_id'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Users Information Update' : 'No changes happen upon updating users!';
 
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Fill up edit form first';
    }
 
     header('Location: '. $_SERVER['HTTP_REFERER']);