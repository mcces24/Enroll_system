<?php
    session_start();
    include_once('../../../database/connection.php');
 
    if(isset($_POST['update_fees'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $fees_id = $_POST['fees_id'];
            $library = $_POST['library'];
            $computer = $_POST['computer'];
            $school_id = $_POST['school_id'];
            $athletic = $_POST['athletic'];
            $admission = $_POST['admission'];
            $development = $_POST['development'];
            $guidance = $_POST['guidance'];
            $handbook = $_POST['handbook'];
            $entrance = $_POST['entrance'];
            $registration = $_POST['registration'];
            $medical = $_POST['medical'];
            $cultural = $_POST['cultural'];
            
            
 
            $sql = "UPDATE fees SET library = '$library', computer = '$computer', school_id = '$school_id', athletic = '$athletic', admission = '$admission', development = '$development', guidance = '$guidance', handbook = '$handbook', entrance = '$entrance', registration = '$registration', medical = '$medical', cultural = '$cultural' WHERE fees_id = '$fees_id'";
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