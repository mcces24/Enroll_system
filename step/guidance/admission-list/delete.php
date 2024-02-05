<?php
    include "../../../database/dbcon.php";
    if(isset($_GET['sched_id'])){
        $sched_id = $_GET['sched_id'];
        $sql = "DELETE from `admission_sched` where sched_id=$sched_id";
        $conn->query($sql);
    }
    elseif(isset($_GET['sched_time_id'])){
        $sched_time_id = $_GET['sched_time_id'];
        $sql = "DELETE from `admission_time` where sched_time_id=$sched_time_id";
        $conn->query($sql);
    }
    header('Location: '. $_SERVER['HTTP_REFERER']);
    exit;
?>