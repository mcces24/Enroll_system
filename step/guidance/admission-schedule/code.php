<?php
require '../../../database/dbcon.php';

if (isset($_GET['sched_id'])) {
    $sched_id = $_GET['sched_id'];
    $status = $_GET['status'];
    $update = "UPDATE admission_sched SET status=$status WHERE sched_id=$sched_id";
    $query_run = mysqli_query($conn, $update);

    if ($query_run) {


        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} elseif (isset($_GET['sched_time_id'])) {
    $sched_time_id = $_GET['sched_time_id'];
    $status = $_GET['status'];
    $update = "UPDATE admission_time SET status=$status WHERE sched_time_id=$sched_time_id";
    $query_run = mysqli_query($conn, $update);

    if ($query_run) {


        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_GET['available_slot']) && isset($_GET['sched_time_id'])) {
    $available_slot = $_GET['available_slot'];
    $sched_time_id = $_GET['sched_time_id'];
    $update = "UPDATE admission_time SET available_slot = $available_slot WHERE sched_time_id = $sched_time_id";
    $query_run = mysqli_query($conn, $update);

    if ($query_run) {
        return true;
    } else {
        return false;
    }
}
