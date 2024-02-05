<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();
        try{
            //use prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO academic (academic_start, academic_end, status) VALUES (:academic_start, :academic_end, :status)");
            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ( $stmt->execute(array(':academic_start' => $_POST['academic_start'] , ':academic_end' => $_POST['academic_end'] , ':status' => $_POST['status'])) ) ? 'New Academic Year Added' : 'Something went wrong. Cannot add member';  
         
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