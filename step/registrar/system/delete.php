<?php
    include "../../../database/dbcon.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `academic` where academic_id=$id";
        $conn->query($sql);
    }
    header('Location: '. $_SERVER['HTTP_REFERER']);
    exit;
?>