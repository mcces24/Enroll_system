<?php
session_start();
require '../../../database/config.php';

if (!isset($_SESSION['SESSION_REGISTRAR'])) {
    header("Location: ../login/index.php");
    die();
} else {
    $username = $_SESSION['SESSION_REGISTRAR'];
}
?>
<?php

require '../../../database/config.php';

$querys1 = "SELECT * FROM students WHERE status_type = 'Enroll' GROUP BY applicant_id DESC LIMIT 1";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
    foreach ($querys_run1 as $new_applicant)
        $new = $new_applicant['applicant_id'];
?>
<?php
} else {
    $new = 'None';
}

?>

<?php

require '../../../database/config.php';

$querys1 = "SELECT * FROM students WHERE status_type = 'Pre Old Students' GROUP BY id_number DESC LIMIT 1";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
    foreach ($querys_run1 as $old_applicant)
        $old = $old_applicant['id_number'];
?>
<?php
} else {
    $old = 'None';
}

?>

<?php


$query = "SELECT * FROM academic WHERE status='1' order by academic_id desc ";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    $student = mysqli_fetch_array($query_run);
?><?php
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
<?php include '../dashboard-data.php'; ?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>

<?php endif; ?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>
    <?php
    $count_not = 0;
    $count_fail = 0;
    $count_new = 0;
    $count = 0;
    ?>
<?php endif; ?>
<?php

require '../../../database/config.php';



$querys = "SELECT * FROM academic GROUP BY status";
$querys_run = mysqli_query($conn, $querys);

if (mysqli_num_rows($querys_run) > 0) {

    foreach ($querys_run as $rows12)
?><?php
            }

                    ?>
<?php

require '../../../database/config.php';


$querys1 = "SELECT * FROM semester GROUP BY sem_status";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
    foreach ($querys_run1 as $rows112)
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
<?php
require '../../../database/regis.php';
require '../../../database/regis2.php';
require '../../../database/regis3.php';
?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>

    <?php
    $try =  $student['academic_start'];

    $query2 = "SELECT * from students order by id_number desc limit 1";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $last_id = $row['id_number'];
    $customer_ID = substr($last_id, 5);
    $customer_ID = "$try-$customer_ID";
    if ($last_id == $customer_ID) {
        $customer_ID = substr($last_id, 5);
        $customer_ID = str_pad(intval($customer_ID) + 1, strlen($customer_ID), '0', STR_PAD_LEFT);
        $customer_ID = "$try-$customer_ID";
    } else {
        $customer_ID = "$try-0001";
    }
    ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="../../../icon.png">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <script src="script.js"></script>
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- end: CSS -->
    <title>New Students | Registrar Office - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">


    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

<body style="width: 100%;">
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

    <?php include('message.php'); ?>
    <?php include('edit_delete_modal.php'); ?>

    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php'  ?>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">New Students</h5>

                <?php include '../inc/dropdown.php' ?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->

            <div class="py-4">
                <style type="text/css">
                    table tr th,
                    table tr td {
                        padding: 20px;
                    }

                    @media (max-width: 600px) {

                        table tr th,
                        table tr td {
                            font-size: 15px;
                            padding: 10px;
                        }

                        .card-body table .btn {
                            font-size: 15px;
                        }

                        .card-header .btn {
                            font-size: 15px;
                        }
                    }
                </style>
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-5 col-xl-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search Applicant
                            </div>
                            <div class="card-body">
                                <form action="" method="GET">
                                    <div class="input-group mb-3 search-box">
                                        <input type="text" autocomplete="off" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                                echo $_GET['search'];
                                                                                                            } ?>" class="form-control" placeholder="Input Applicant Number here!">
                                        <div class="result"></div>
                                        <button type="submit" class="btn btn-primary">Search Applicant</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Queuing
                            </div>
                            <div class="card-body">

                                <?php
                                $date_created = date("Y/m/d");
                                $query = "SELECT * FROM que WHERE status = '1' AND date_created = '$date_created' ORDER BY id asc LIMIT 1  ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>

                                        <div id="wrapper">
                                            <div class="input-group">
                                                <input type="text" name="search" value="Priority No: <?= $student['que_number']; ?>" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                <textarea hidden id="content"> Attention priority number <?= $student['que_number']; ?>. Please proceed to Registrar Office for checking up requirements and for enrolling. Attention priority number <?= $student['que_number']; ?>. Please proceed to Registrar Office for checking up requirements and for enrolling. Thank you!</textarea>

                                                <button style="width: 20%;" id="btnArea" class="btn btn-success btn-sm">Call Now</button>
                                            </div>

                                            <script>
                                                const content = document.getElementById("content");
                                                const btnArea = document.getElementById("btnArea");


                                                btnArea.addEventListener("click", () => {
                                                    var audio = new Audio('audio.mp3');
                                                    audio.play();
                                                    const myInterval = setInterval(myTimer, 1000);

                                                    function myTimer() {
                                                        var voices = speechSynthesis.getVoices();
                                                        const utterance = new SpeechSynthesisUtterance(content.value);
                                                        utterance.lang = "en-GB";
                                                        window.speechSynthesis.speak(utterance);
                                                        clearInterval(myInterval);
                                                    }
                                                });
                                            </script>


                                        </div>
                                        <?php
                                        $date_created = date("Y/m/d");
                                        $next = $student['que_number'];
                                        $query1 = "SELECT * FROM que WHERE status = '1' AND date_created = '$date_created' AND que_number != '$next' ORDER BY id asc LIMIT 1  ";
                                        $query_run1 = mysqli_query($conn, $query1);

                                        if (mysqli_num_rows($query_run1) > 0) {
                                            foreach ($query_run1 as $student1) {
                                        ?>


                                                <br>

                                                <div id="wrapper">
                                                    <div class="input-group">
                                                        <input type="text" name="search" value="Priority No: <?= $student1['que_number']; ?>" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                                        <textarea hidden id="content1"> Attention priority number <?= $student1['que_number']; ?>. Attention priority number <?= $student['que_number']; ?>. Please proceed to Registrar Office for checking up requirements and for enrolling. Please proceed to Registrar Office for checking up requirements and for enrolling. Thank you!</textarea>

                                                        <button style="width: 20%;" id="btnArea1" class="btn btn-success btn-sm">Call Next</button>
                                                    </div>

                                                    <script>
                                                        const content1 = document.getElementById("content1");
                                                        const btnArea1 = document.getElementById("btnArea1");


                                                        btnArea1.addEventListener("click", () => {
                                                            var audio = new Audio('audio.mp3');
                                                            audio.play();
                                                            const myInterval = setInterval(myTimer, 1000);

                                                            function myTimer() {
                                                                var voices = speechSynthesis.getVoices();
                                                                const utterance = new SpeechSynthesisUtterance(content1.value);
                                                                utterance.lang = "en-GB";
                                                                window.speechSynthesis.speak(utterance);
                                                                clearInterval(myInterval);
                                                            }
                                                        });
                                                    </script>


                                                </div>
                                            <?php
                                            }
                                        } else { ?>
                                            <br>
                                            <input type="text" name="search" value="No Priority Number on Que" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                } else { ?>
                                    <input type="text" name="search" value="No Priority Number on Que" class="form-control" placeholder="Input Applicant Number here!" readonly>
                                <?php
                                }
                                ?>



                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-12">
                        <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                            <?php
                            if (isset($_GET['search'])) {    ?>
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-header bg-white">
                                        Results
                                    </div>
                                    <div class="card-body">

                                        <form action="code.php" method="POST">

                                            <table>



                                                <?php


                                                $filtervalues = $_GET['search'];

                                                $start = $rows11['academic_start'];
                                                $end = $rows11['academic_end'];
                                                $semester = $rows111['semester_name'];
                                                $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id WHERE (status_type = 'Enroll' OR status_type = 'New Students') AND semester_id = '$semester' AND academic = '$academic' AND CONCAT(applicant_id) LIKE '%$filtervalues%'";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $student) {


                                                        $course_code = $student['course_code'];
                                                        $id = $student['id'];
                                                        $year_name = $student['year_name'];
                                                ?>
                                                        <?php



                                                        $filtervalues = $_GET['search'];

                                                        $start = $rows11['academic_start'];
                                                        $end = $rows11['academic_end'];
                                                        $semester = $rows111['semester_name'];

                                                        $academic = "$start-$end";
                                                        if ($student['section_id'] != 0) {
                                                            $query = "SELECT * FROM students INNER JOIN course c ON students.course_id = c.course_id INNER JOIN year_lvl y ON students.year_id=y.year_id  INNER JOIN sections s ON students.section_id=s.section_id WHERE (status_type = 'Enroll' OR status_type = 'New Students') AND semester_id = '$semester' AND academic = '$academic' AND CONCAT(applicant_id) LIKE '%$filtervalues%'";
                                                        }
                                                        $query_run = mysqli_query($conn, $query);

                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $student) {
                                                        ?>






                                                                <?php include('edit_delete_modal.php'); ?>
                                                                <?php include('update_doc.php'); ?>

                                                                <div class="input-group mb-3">
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Course</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['course_name'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Year Level</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['year_name'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Section</span></label>
                                                                        <?php if ($student['section_id'] != 0) { ?>
                                                                            <p style="width: 90%; color: red;" class="form-control"><?php echo $student['sections'] ?></p>
                                                                        <?php } else { ?>
                                                                            <p style="width: 90%; color: red;" class="form-control">Not Yet Enroll</p>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>First Name</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['fname'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Middle Name</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['mname'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Last Name</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['lname'] ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Applicant Number</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['applicant_id'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>Gender</span></label>
                                                                        <p style="width: 90%;" class="form-control"><?php echo $student['gender'] ?></p>
                                                                    </div>
                                                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                                        <label class="mb-1"><span>ID Number</span></label>
                                                                        <p style="width: 90%; color: red;" class="form-control"><?php echo $student['id_number'] ?></p>
                                                                    </div>
                                                                </div>

                                                                <tr style="text-align: center;">

                                                                    <td hidden><?= $student['applicant_id']; ?></td>
                                                                    <td hidden><?= $student['id']; ?></td>
                                                                    <td><span hidden></span></td>
                                                                    <td width="100%">

                                                                        <?php if (in_array($student['status_type'], array('Enroll'))) : ?>
                                                                            <a href="#addsection_<?php echo $student['id']; ?>" class="btn btn-success btn-sm float-right" data-bs-toggle="modal"> Add Section for: <?= $student['course_code']; ?> - <?= $student['year_name']; ?></a>
                                                                            <a href="#edit_<?php echo $student['id']; ?>" class="btn btn-info btn-sm" data-bs-toggle="modal"> Enroll Applicant</a>
                                                                        <?php endif; ?>
                                                                        <?php if (in_array($student['status_type'], array('New Students'))) : ?>
                                                                            <a href="#update_<?php echo $student['id']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update Document</a>
                                                                        <?php endif; ?>
                                                                        <?php if (in_array($student['type'], array('New')) and in_array($student['status_type'], array('New Students'))) : ?>
                                                                            <a href="enrollment_form.php?id=<?= $student['id']; ?>" class="btn btn-primary btn-sm" target="_blank">Generate Enrollment Form</a>
                                                                        <?php endif; ?>
                                                                        <?php if (in_array($student['type'], array('Transferee')) and in_array($student['status_type'], array('New Students'))) : ?>
                                                                            <a href="subject-select.php?id_number=<?= $student['id_number']; ?>&section=<?= $student['section_id']; ?>" class="btn btn-primary btn-sm" target="_blank">Subjects To Enroll</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>


                                                    <?php
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center;">No Applicant Found!!</td>
                                                    </tr>

                                            <?php
                                                }
                                            }

                                            ?>





                                            </table>

                                        </form>

                                    <?php else : ?>

                                        <div class="card border-0 shadow-sm h-100">

                                            <div class="card-body">
                                                <h2>Pre-Enrollemnt is currently not Available</h2>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
    <!-- end: JS -->

</body>

</html>