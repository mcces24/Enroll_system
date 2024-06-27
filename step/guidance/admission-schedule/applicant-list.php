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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script type="text/javascript" src="chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image" href="../../../icon.png">
    <!-- end: CSS -->
    <title>Old Students | Registrar Office - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">


    <script src="sweetalert.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


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



    <!-- start: Sidebar -->

    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2" style="margin-left: -260px;">
            <!-- start: Navbar -->

            <!-- end: Navbar -->

            <!-- start: Content -->

            <div class="py-4">
                <style type="text/css">
                    table tr th,
                    table tr td {
                        padding: 20px;
                    }

                    @media (max-width: 500px) {

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
                <div class="row g-3 mt-2" style="left: 0px;">

                    <style type="text/css">
                        table {
                            width: 100%;
                        }

                        table tr th,
                        table tr td {
                            padding: 0px;
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

                            table tr th,
                            table tr td {
                                font-size: 12px;
                            }
                        }

                        @media print {
                            @page {
                                size: landscape;
                            }

                            body {
                                size: A4;
                            }

                            .card {
                                margin-top: -50px;
                            }
                        }
                    </style>







                    <?php
                    if (isset($_GET['sched_date']) and isset($_GET['sched_time'])) {
                        $sched_date = $_GET['sched_date'];
                        $sched_time = $_GET['sched_time']; ?>
                        <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                            <div class="card border-0">
                                <div style="height: 100%; margin: 0 auto;">
                                    <img src="../../registrar/students/mcc-back.png">
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive" style="text-align: center;">
                                        <h5>LIST OF APPLICANT</h5>
                                        <h6><?php echo date("M d, Y", strtotime($sched_date)); ?></h6>
                                        <h6><?php echo  $sched_time ?></h6>

                                        <table class="table-bordered">
                                            <thead>
                                                <th>Seq No.</th>
                                                <th>Applicant Number</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Gender</th>
                                            </thead>
                                            <?php

                                            if (isset($_GET['sched_date']) and isset($_GET['sched_time'])) {
                                                $sched_date = $_GET['sched_date'];
                                                $sched_time = $_GET['sched_time'];
                                            }

                                            $query = "SELECT * FROM admission_list  INNER JOIN students b ON admission_list.applicant_id = b.applicant_id WHERE sched_date = '$sched_date' AND sched_time = '$sched_time'  ORDER BY admission_list.applicant_id ASC ";
                                            $query_run = mysqli_query($conn, $query);



                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $seq = 0;

                                                while ($student = mysqli_fetch_array($query_run)) {

                                                    if ($student) {
                                                        $seq = $seq + 1;
                                                    }


                                            ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $seq; ?></td>
                                                            <td><?= $student['applicant_id']; ?></td>
                                                            <td><?= $student['lname']; ?></td>
                                                            <td><?= $student['fname']; ?></td>
                                                            <td><?= $student['mname']; ?></td>
                                                            <td><?= $student['gender']; ?></td>
                                                        </tr>
                                                    </tbody>

                                        <?php }
                                            } else
                                                echo '<tr><td colspan = "8"> No Students Found Please Enter Valid Section</td></tr>';
                                        } ?>



                                        </table>
                                    </div>

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


    <!-- end: JS -->

</body>

</html>

<script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
</script>