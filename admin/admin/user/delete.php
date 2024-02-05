<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM users WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Users deleted successfully' : 'Something went wrong. Cannot delete users';
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['message'] = 'Select user to delete first';
    }
 
    header('location: index.php?user');
 
?>

<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_GET['idadmin'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM users WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Users deleted successfully' : 'Something went wrong. Cannot delete users';
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['message'] = 'Select user to delete first';
    }
 
    header('location: index.php?user');
 
?>