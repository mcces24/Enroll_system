<?php
session_start();
require '../../../database/config.php';




if (isset($_POST['add'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id']);
    $queuing = mysqli_real_escape_string($conn, $_POST['queuing']);
    $date_created = date("Y/m/d");

    $query1 = "SELECT * FROM que WHERE student_id = '$student_id' AND date_created = '$date_created' ";
    $query_run1 = mysqli_query($conn, $query1);

    if ($query_run1->num_rows > 0) {
        $_SESSION['message'] = "Students Already Have Queue Number";
        $_SESSION['message_icon'] = "warning";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $query = "INSERT INTO que VALUES('','$student_id','$queuing','$date_created','') ";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['message'] = "Que Numbe Added Successfully";
            $_SESSION['message_icon'] = "success";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['message'] = "Error Adding Que Number";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}

if (isset($_POST['add_old'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id']);
    $queuing = mysqli_real_escape_string($conn, $_POST['queuing']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $date_created = date("Y/m/d");

    $query1 = "SELECT * FROM que WHERE student_id = '$student_id' AND date_created = '$date_created'";
    $query_run1 = mysqli_query($conn, $query1);

    if ($query_run1->num_rows > 0) {
        $_SESSION['message'] = "Students Already Have Queue Number";
        $_SESSION['message_icon'] = "warning";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $query = "INSERT INTO que VALUES(null,'$student_id','$queuing','$date_created','3') ";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['message'] = "Que Numbe Added Successfully";
            $_SESSION['message_icon'] = "success";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['message'] = "Error Adding Que Number";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
if (isset($_POST['save'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $place_of_birth = mysqli_real_escape_string($conn, $_POST['place_of_birth']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $guardian = mysqli_real_escape_string($conn, $_POST['guardian']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $guardian_address = mysqli_real_escape_string($conn, $_POST['guardian_address']);
    $elementary = mysqli_real_escape_string($conn, $_POST['elementary']);
    $elem_year = mysqli_real_escape_string($conn, $_POST['elem_year']);
    $elem_address = mysqli_real_escape_string($conn, $_POST['elem_address']);
    $high_school = mysqli_real_escape_string($conn, $_POST['high_school']);
    $high_year = mysqli_real_escape_string($conn, $_POST['high_year']);
    $high_address = mysqli_real_escape_string($conn, $_POST['high_address']);
    $school_graduated = mysqli_real_escape_string($conn, $_POST['school_graduated']);
    $school_year = mysqli_real_escape_string($conn, $_POST['school_year']);
    $school_address = mysqli_real_escape_string($conn, $_POST['school_address']);


    $query = "UPDATE students SET course_id='$course_id',year_id='$year_id',fname='$fname',mname='$mname',lname='$lname',age='$age',address='$address',status='$status',place_of_birth='$place_of_birth',date_of_birth='$date_of_birth',gender='$gender',religion='$religion',contact='$contact',email='$email',guardian='$guardian',occupation='$high_school',guardian_address='$guardian_address',elementary='$elementary',elem_year='$elem_year',elem_address='$elem_address',occupation='$high_school',high_year='$high_year',high_address='$high_address',school_graduated='$school_graduated',school_year='$school_year',school_address='$school_address' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Changes saved";
        $_SESSION['message_icon'] = "success";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['message'] = "Changes not saved";
        $_SESSION['message_icon'] = "error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
