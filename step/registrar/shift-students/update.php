<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id_number = $_POST['id_number'];
            $nso = $_POST['nso'];
            $card = $_POST['card'];
            $good_moral = $_POST['good_moral'];
            
            
 
            $sql = "UPDATE documents SET nso = '$nso',card = '$card',good_moral = '$good_moral' WHERE id_number = '$id_number'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Documents Updated Successfully' : 'Something went wrong. Documents not updated';
 
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