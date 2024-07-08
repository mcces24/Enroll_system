<?php
include_once '../../../MainFunction.php';
if (isGuidanceLogin()) {
    $user = getGuidanceLoginData();
    $academicYear = getActiveAcademicYear();
    $semesterAll = getActiveSemester();
    $semester = !empty($semesterAll) ? $semesterAll['semester_name'] : null;
    $start = !empty($academicYear) && $academicYear['academic_start'] ? $academicYear['academic_start'] : null;
    $end = !empty($academicYear) && $academicYear['academic_end'] ? $academicYear['academic_end'] : null;
    $academic = !empty($academicYear) ? "$start-$end" : null;
} else {
    header("Location: ../login/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guidance Office - Madridejos Community College</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="icon" type="image" href="../../../icon.png">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="../inc/js/sweetalert.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../inc/js/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style type="text/css">
        .result,
        .result1 {
            width: 73%;
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
        }

        /* Formatting result items */
        .result p,
        .result1 p {
            margin: 0;
            padding: 5px 5px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
            background-color: white;
        }

        .result p:hover,
        .result1 p:hover {
            background: #f2f2f2;
        }
    </style>
</head>