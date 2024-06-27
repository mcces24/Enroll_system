<?php
session_start();
require '../../../database/config.php';

if (!isset($_SESSION['SESSION_GUIDANCE'])) {
    header("Location: ../login/");
    die();
} else {
    $username = $_SESSION['SESSION_GUIDANCE'];
}
?>


<?php

require '../../../database/config.php';

$querys = "SELECT * FROM academic GROUP BY status";
$querys_run = mysqli_query($conn, $querys);

if (mysqli_num_rows($querys_run) > 0) {

    foreach ($querys_run as $rows)
?><?php
            }

                    ?>
<?php

require '../../../database/config.php';

$querys1 = "SELECT * FROM semester GROUP BY sem_status";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
    foreach ($querys_run1 as $rows1)
?><?php
            }

                    ?>
<?php

require '../../../database/config.php';

$querys11 = "SELECT * FROM academic WHERE status='1'";
$querys_run11 = mysqli_query($conn, $querys11);

if (mysqli_num_rows($querys_run11) > 0) {

    foreach ($querys_run11 as $rows11)
?><?php
                                        }

                                                ?>
<?php

require '../../../database/config.php';
$querys111 = "SELECT * FROM semester WHERE sem_status='1'";
$querys_run111 = mysqli_query($conn, $querys111);

if (mysqli_num_rows($querys_run111) > 0) {
    foreach ($querys_run111 as $rows111)
?><?php
                                        }

                                                ?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>

    <?php
    $start = $rows11['academic_start'];
    $end = $rows11['academic_end'];
    $semester = $rows111['semester_name'];

    $academic = "$start-$end";
    $sql = "SELECT * from students  WHERE status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester'";
    $result = $conn->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $count = $count + 1;
        }
    }


    $sql = "SELECT * from students  WHERE status_type='Enroll New Students' AND academic = '$academic' AND semester_id = '$semester'";
    $result = $conn->query($sql);
    $count_new = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $count_new = $count_new + 1;
        }
    }

    ?>
    <?php
    $start = $rows11['academic_start'];
    $end = $rows11['academic_end'];
    $semester = $rows111['semester_name'];

    $academic = "$start-$end";
    $sql = "SELECT * from students  WHERE status_type='Accept Applicant' AND academic = '$academic' AND semester_id = '$semester'";
    $result = $conn->query($sql);
    $count_accept = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $count_accept = $count_accept + 1;
        }
    }

    ?>


<?php endif; ?>


<?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>

    <?php
    $count_new = 0;
    $count = 0;
    $count_accept = 0;
    ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- end: CSS -->
    <title>Queuing - Guidance Office</title>

    <script src="sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image" href="../../../icon.png">
</head>

<body style="width: 100%;">
    <?php include('message.php'); ?>
    <div class="loader-wrapper" id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <link rel="stylesheet" type="text/css" href="../../../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none"
        })
    </script>

    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php';  ?>

    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Que Students or Applicant</h5>
                <div class="dropdown me-3  d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><span id="total"></span></i>
                    </div>

                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                            <h5 class="p-3 bg-indigo text-light">Notification</h5>
                            <div class="list-group list-group-flush">
                                <a href="../new-applicant/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-semibold">Pre-Enrolled Applicant</div>
                                        <span class="fs-7">For Academic <?php echo $academic; ?>, <?php echo $semester; ?></span>
                                    </div>
                                    <span class="badge bg-primary rounded-pill"><span id="accept"></span></span>
                                </a>
                                <a href="../applicant-info/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-semibold">Applicant Form</div>
                                        <span class="fs-7">Total Number of New Applicant who filled the form</span>
                                    </div>
                                    <span class="badge bg-primary rounded-pill"><span id="enroll"></span></span>
                                </a>
                            </div>
                        <?php else : ?>
                            <h5 class="p-3 bg-indigo text-light">No Notification</h5>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="dropdown me-3 d-none d-sm-block">

                </div>
                <?php include '../inc/dropdown.php' ?>
            </nav>



            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-6 col-md-5 col-xl-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Applicant
                            </div>
                            <div class="card-body searches">

                                <form action="" method="GET">
                                    <div class="input-group mb-3 search-box">
                                        <input type="text" autocomplete="off" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                                echo $_GET['search'];
                                                                                                            } ?>" class="form-control" placeholder="Search applicant number...">
                                        <div class="result"></div>
                                        <button type="submit" class="btn btn-primary">Search Applicant</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="col-6 col-md-5 col-xl-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Students
                            </div>
                            <div class="card-body searches">

                                <form action="" method="GET">
                                    <div class="input-group mb-3 search-box1">
                                        <input type="text" autocomplete="off" name="search_students" required value="<?php if (isset($_GET['search_students'])) {
                                                                                                                            echo $_GET['search_students'];
                                                                                                                        } ?>" class="form-control" placeholder="Search id number...">
                                        <div class="result1"></div>
                                        <button type="submit" class="btn btn-primary">Search Students</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-xl-12">
                        <?php if (isset($_GET['search'])) {
                            $filtervalues = $_GET['search']; ?>
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white">
                                    Results
                                </div>

                                <div class="card-body">
                                    <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                                        <form action="code.php" method="POST">




                                            <?php



                                            $query = "SELECT * FROM students  WHERE  CONCAT(applicant_id) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($conn, $query);
                                            $count = 0;

                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $student) {
                                            ?>
                                                    <input style="width: 90%;" class="form-control" type="hidden" name="id" value="<?php echo $student['id'] ?>">
                                                    <div class=" mb-3">
                                                        <h4 style="text-align: center;">Personal Information</h4>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">First Name</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="fname" value="<?php echo $student['fname'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Middle Name</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="mname" value="<?php echo $student['mname'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Last Name</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="lname" value="<?php echo $student['lname'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Age</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="age" value="<?php echo $student['age'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Address</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="address" value="<?php echo $student['address'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Status</label>
                                                            <select name="status" style="width: 90%;" class="form-control">
                                                                <option value="<?php echo $student['status'] ?>"><?php echo $student['status'] ?></option>
                                                                <option disabled>Change Status</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Widow">Widow</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Place of Birth</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="place_of_birth" value="<?php echo $student['place_of_birth'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Date of Birth</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="date_of_birth" value="<?php echo $student['date_of_birth'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Gender</label>
                                                            <select name="gender" style="width: 90%;" class="form-control">
                                                                <option value="<?php echo $student['gender'] ?>"><?php echo $student['gender'] ?></option>
                                                                <option disabled>Change Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Religion</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="religion" value="<?php echo $student['religion'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Contact</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="contact" value="<?php echo $student['contact'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Email</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="email" value="<?php echo $student['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <h4 style="text-align: center;">Guardian Information</h4>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Guardian Name</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="guardian" value="<?php echo $student['guardian'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Occupation</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="occupation" value="<?php echo $student['occupation'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Guardian Address</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="guardian_address" value="<?php echo $student['guardian_address'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <h4 style="text-align: center;">School Background</h4>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">Elementary</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="elementary" value="<?php echo $student['elementary'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Year</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="elem_year" value="<?php echo $student['elem_year'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Address</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="elem_address" value="<?php echo $student['elem_address'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">High School</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="high_school" value="<?php echo $student['high_school'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Year</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="high_year" value="<?php echo $student['high_year'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Address</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="high_address" value="<?php echo $student['high_address'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Graduated</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="school_graduated" value="<?php echo $student['school_graduated'] ?>">
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Year</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="school_year" value="<?php echo $student['school_year'] ?>">
                                                        </div>
                                                        <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">School Address</label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="school_address" value="<?php echo $student['school_address'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3" style="text-align: center;">
                                                        <a href="#edit1_" class="btn btn-success btn-sm" data-bs-toggle="modal"> Que Students | Applicant</a>
                                                        <button type="submit" name="save" class="btn btn-primary btn-sm"> Save Changes</button>
                                                    </div>

                                                    <div class="modal fade" id="edit1_" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalLabel">Que Students | Applicant</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left;">
                                                                    <div class="form-group">
                                                                        <label class="form-group"> Que Number </label>
                                                                        <input type="text" name="queuing" id="queuing" class="form-control" placeholder="Enter que number here...">
                                                                    </div>


                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="add" class="btn btn-primary btn-sm"> Que Students/Applicant</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                </div>



                            <?php
                                                }
                                            } else {
                            ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">Applicant Number Not Found</td>
                            </tr>


                        <?php
                                            }


                        ?>

                        </form>
                <?php endif;
                                } ?>
                <?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>
                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">
                            <h2>Pre-Enrollemnt is currently not Available</h2>
                        </div>
                    </div>

                <?php endif; ?>

                            </div>
                            <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                                <?php if (isset($_GET['search_students'])) { ?>
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-header bg-white">
                                            Results
                                        </div>

                                        <div class="card-body">

                                            <form action="code.php" method="POST">




                                                <?php
                                                $filtervalues1 = $_GET['search_students'];

                                                $start = $rows11['academic_start'];
                                                $end = $rows11['academic_end'];
                                                $semester = $rows111['semester_name'];

                                                $academic = "$start-$end";

                                                $query1 = "SELECT * FROM students INNER JOIN course c ON students.course_id=c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id WHERE id_number = '$filtervalues1'  AND semester_id = '$semester' AND academic = '$academic' ";
                                                $query_run1 = mysqli_query($conn, $query1);

                                                if (mysqli_num_rows($query_run1) > 0) {
                                                    foreach ($query_run1 as $student1) {
                                                ?>
                                                        <input style="width: 90%;" class="form-control" type="hidden" name="id" value="<?php echo $student1['id'] ?>">
                                                        <div class=" mb-3">
                                                            <h4 style="text-align: center;">Personal Information</h4>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">First Name</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="fname" value="<?php echo $student1['fname'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Middle Name</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="mname" value="<?php echo $student1['mname'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Last Name</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="lname" value="<?php echo $student1['lname'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Age</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="age" value="<?php echo $student1['age'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Address</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="address" value="<?php echo $student1['address'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Status</label>
                                                                <select name="status" style="width: 90%;" class="form-control">
                                                                    <option value="<?php echo $student1['status'] ?>"><?php echo $student1['status'] ?></option>
                                                                    <option disabled>Change Status</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Widow">Widow</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Place of Birth</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="place_of_birth" value="<?php echo $student1['place_of_birth'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Date of Birth</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="date_of_birth" value="<?php echo $student1['date_of_birth'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Gender</label>
                                                                <select name="gender" style="width: 90%;" class="form-control">
                                                                    <option value="<?php echo $student1['gender'] ?>"><?php echo $student1['gender'] ?></option>
                                                                    <option disabled>Change Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Religion</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="religion" value="<?php echo $student1['religion'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Contact</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="contact" value="<?php echo $student1['contact'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Email</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="email" value="<?php echo $student1['email'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" mb-3">
                                                            <h4 style="text-align: center;">Enrollment</h4>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Course </label>
                                                                <select style="width: 90%;" class="form-control" type="text" name="course_id">
                                                                    <option selected value="<?php echo $student1['course_id'] ?>"><?php echo $student1['course_name'] ?></option>
                                                                    <option disabled>Select Course</option>
                                                                    <?php
                                                                    include_once '../../../database/config.php';
                                                                    include_once '../../../database/config2.php';
                                                                    $queryw = "SELECT * FROM course GROUP BY course_id";
                                                                    $result12 = $db->query($queryw);
                                                                    ?>
                                                                    <?php
                                                                    if ($result12->num_rows > 0) {
                                                                        while ($row1 = $result12->fetch_assoc()) { ?>
                                                                            <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                                                    <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span style="color: red;">Note* If course is changed and saved, Please also change year level. </span>
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Year Level</label>
                                                                <select style="width: 90%;" class="form-control" type="text" name="year_id">
                                                                    <?php
                                                                    include_once '../../../database/config.php';
                                                                    include_once '../../../database/config2.php';
                                                                    $id = $student1['year_id'];
                                                                    $queryw = "SELECT * FROM year_lvl INNER JOIN course  ON year_lvl.course_id=course.course_id WHERE year_id = '$id'";
                                                                    $result12 = $db->query($queryw);
                                                                    ?>
                                                                    <?php
                                                                    if ($result12->num_rows > 0) {
                                                                        while ($row1 = $result12->fetch_assoc()) { ?>
                                                                            <option selected value="<?php echo $student1['year_id'] ?>"><?php echo $student1['year_name'] ?> | <?php echo $row1['course_name'] ?></option>
                                                                    <?php

                                                                        }
                                                                    }
                                                                    ?>

                                                                    <option disabled>Select Year Level</option>
                                                                    <?php
                                                                    include_once '../../../database/config.php';
                                                                    include_once '../../../database/config2.php';
                                                                    $id = $student1['course_id'];
                                                                    $queryw = "SELECT * FROM year_lvl  WHERE course_id = '$id' GROUP BY year_id";
                                                                    $result12 = $db->query($queryw);
                                                                    ?>
                                                                    <?php
                                                                    if ($result12->num_rows > 0) {
                                                                        while ($row1 = $result12->fetch_assoc()) { ?>
                                                                            <option value="<?php echo $row1['year_id'] ?>"><?php echo $row1['year_name'] ?> | <?php echo $student1['course_name'] ?></option>
                                                                    <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Semester</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="semester_id" value="<?php echo $student1['semester_id'] ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class=" mb-3">
                                                            <h4 style="text-align: center;">Guardian Information</h4>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Guardian Name</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="guardian" value="<?php echo $student1['guardian'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Occupation</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="occupation" value="<?php echo $student1['occupation'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Guardian Address</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="guardian_address" value="<?php echo $student1['guardian_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" mb-3">
                                                            <h4 style="text-align: center;">School Background</h4>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">Elementary</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="elementary" value="<?php echo $student1['elementary'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Year</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="elem_year" value="<?php echo $student1['elem_year'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Address</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="elem_address" value="<?php echo $student1['elem_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">High School</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="high_school" value="<?php echo $student1['high_school'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Year</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="high_year" value="<?php echo $student1['high_year'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Address</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="high_address" value="<?php echo $student1['high_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Graduated</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="school_graduated" value="<?php echo $student1['school_graduated'] ?>">
                                                            </div>
                                                            <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Year</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="school_year" value="<?php echo $student1['school_year'] ?>">
                                                            </div>
                                                            <div style="float: right;" class="col-4 col-md-4 col-xl-4">
                                                                <label class="mb-1">School Address</label>
                                                                <input style="width: 90%;" class="form-control" type="text" name="school_address" value="<?php echo $student1['school_address'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" mb-3" style="text-align: center;">
                                                            <?php if ($student1['type'] == 'Regular' or $student1['type'] == 'Irregular') : ?>
                                                                <a href="#edit1_" class="btn btn-success btn-sm" data-bs-toggle="modal"> Que Students | Applicant</a>
                                                                <button type="submit" name="save" class="btn btn-primary btn-sm"> Save Changes</button>
                                                            <?php endif ?>
                                                            <?php if ($student1['type'] == 'Shift') : ?>
                                                                <button type="submit" name="save" class="btn btn-primary btn-sm"> Save Changes</button>
                                                            <?php endif ?>

                                                        </div>

                                                        <div class="modal fade" id="edit1_" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel">Que Students | Old Students</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: left;">
                                                                        <div class="form-group">
                                                                            <label class="form-group"> Que Number </label>
                                                                            <input type="text" name="queuing" id="queuing" class="form-control" placeholder="Enter que number here...">
                                                                        </div>
                                                                        <input type="hidden" name="course" id="course" class="form-control" value="<?php echo $student1['course_code'] ?>">
                                                                        <input type="hidden" name="status" id="status" class="form-control" value="3">


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="add_old" class="btn btn-primary btn-sm"> Que Students/Applicant</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </div>



                                    <?php
                                                    }
                                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align:center;">ID Number Not Found</td>
                                    </tr>


                                <?php
                                                }


                                ?>

                                </form>
                        <?php }
                            endif; ?>


                                    </div>
                    </div>
                </div>

            </div>
            <!-- end: Graph -->
        </div>
        <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="script.js"></script>
    <script src="new_script.js"></script>
    <script src="enroll.js"></script>
    <script src="total.js"></script>
    <!-- end: JS -->

    <script>
        $(document).ready(function() {
            $('.email_button').click(function() {
                $(this).attr('disabled', 'disabled');
                var id = $(this).attr("id");
                var action = $(this).data("action");
                var email_data = [];
                if (action == 'single') {
                    email_data.push({
                        email: $(this).data("email"),
                        name: $(this).data("name")

                    });
                } else {
                    $('.single_select').each(function() {
                        if ($(this).prop("checked") == true) {
                            email_data.push({
                                email: $(this).data("email"),
                                name: $(this).data('name')

                            });
                        }
                    });
                }

                $.ajax({
                    url: "send_mail.php",
                    method: "POST",
                    data: {
                        email_data: email_data
                    },
                    beforeSend: function() {
                        $('#' + id).html('Sending Schedule');
                        $('#' + id).addClass('btn-danger');
                    },
                    success: function(data) {
                        if (data == 'ok') {
                            $('#' + id).text('Schedule Send');
                            $('#' + id).removeClass('btn-danger');
                            $('#' + id).removeClass('btn-info');
                            $('#' + id).addClass('btn-success');
                        } else if (data == '') {
                            $('#' + id).text(data);
                            $('#' + id).text('No Applicant Selected');
                            $('#' + id).removeClass('btn-danger');
                            $('#' + id).removeClass('btn-info');
                            $('#' + id).addClass('btn-info');
                        } else {
                            $('#' + id).text(data);
                        }
                        $('#' + id).attr('disabled', false);
                    }
                })

            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("backend-search.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.search-box1 input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result1");
                if (inputVal.length) {
                    $.get("backend-search-students.php", {
                        term1: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result1 p", function() {
                $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
                $(this).parent(".result1").empty();
            });
        });
    </script>
</body>

</html>