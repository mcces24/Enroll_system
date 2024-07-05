<?php
require 'database/config.php';
require 'MainFunction.php';

$academicYear = getActiveAcademicYear();
$semesterAll = getActiveSemester();
$semester = !empty($semesterAll) ? $semesterAll['semester_name'] : null;
$start = !empty($academicYear) && $academicYear['academic_start'] ? $academicYear['academic_start'] : null;
$end = !empty($academicYear) && $academicYear['academic_end'] ? $academicYear['academic_end'] : null;
$academic = !empty($academicYear) ? "$start-$end" : null;

if (isset($_POST['sched_date'])) {
    $sched_date = $_POST['sched_date'];

    $queryTime = "SELECT * FROM admission_time ORDER BY sched_time_start";
    $queryTimeRun = mysqli_query($conn, $queryTime);
    if (mysqli_num_rows($queryTimeRun) > 0) {
        $returnData = array();
        while ($time = mysqli_fetch_assoc($queryTimeRun)) {
            $start = $time['sched_time_start'];
            $stop = $time['sched_time_stop'];
            $sched_time = "$start-$stop";
            $queryCountSlot = "SELECT COUNT(*) AS slot_count FROM admission_list LEFT JOIN students ON admission_list.student_id = students.id WHERE sched_date = '" . $sched_date . "' AND sched_time = '$sched_time' AND academic='$academic' AND semester_id = '$semester'";
            $queryCountSlotRun = mysqli_query($conn, $queryCountSlot);
            $slot_count = mysqli_fetch_assoc($queryCountSlotRun)['slot_count'];
          
            $available_slot = $time['available_slot'];
            $sched_time_id = $time['sched_time_id'];
            if ($slot_count < $available_slot) {
                $returnData[] = array('sched_time' => $sched_time, 'available_slot' => $available_slot - $slot_count, 'sched_time_id' => $sched_time_id);
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success', 'message' => 'Available slot', 'returnData' => $returnData));
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Database query error'));
    }
} else {
    // Return error JSON response
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
}