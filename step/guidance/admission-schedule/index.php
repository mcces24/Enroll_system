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
    $sql = "SELECT * from students  WHERE status_type='Form Done' AND academic = '$academic' AND semester_id = '$semester'";
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

<?php include '../inc/head.php';  ?>

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

    <?php include('add_modal.php'); ?>


    <?php include('update_doc.php'); ?>

    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php';  ?>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Admission Schedule Date and Time </h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">



                    <div class="col-12 col-md-7 col-xl-6">
                        <form action="code.php" method="POST">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white">
                                    Admission Schedule *Date <a href="#sched_date" class="btn btn-sm btn-success float-end" data-bs-toggle="modal"> Add New Date </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table id="Mytableid" class="table table-bordered table-striped">

                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">Admission Date Schedule</td>
                                                <td colspan="2" style="text-align: center;">Status</td>
                                                <td colspan="2" style="text-align: center;">Action</td>

                                            </tr>
                                            <?php
                                            $query1 = "SELECT * FROM admission_sched ORDER BY sched_date ";

                                            $query_run1 = mysqli_query($conn, $query1);

                                            if (mysqli_num_rows($query_run1) > 0) {
                                                while ($student = mysqli_fetch_array($query_run1)) {
                                            ?>


                                                    <tr style="text-align: center;">

                                                        <input type="hidden" name="academic_id" value="<?= $student['academic_id']; ?>">
                                                        <input type="hidden" name="status" value="0">
                                                        <input type="hidden" name="status1" value="1">
                                                        <td colspan="4" width="50%"><?= date("M d, Y", strtotime($student['sched_date'])); ?></td>


                                                        <td colspan="2">
                                                            <?php if (in_array($student['status'], array('1'))) : ?>

                                                                <a class="btn btn-primary btn-sm" href="code.php?sched_id=<?= $student['sched_id']; ?>&status=0">ACTIVE</a>
                                                            <?php endif; ?>


                                                            <?php if (in_array($student['status'], array('0'))) : ?>

                                                                <a class="btn btn-danger btn-sm" href="code.php?sched_id=<?= $student['sched_id']; ?>  &status=1">NOT ACTIVE</a>
                                                            <?php endif; ?>

                                                        </td>

                                                        <td colspan="2"><a class="btn btn-warning btn-sm" href='delete.php?sched_id=<?= $student['sched_id']; ?>'><span class="ri-delete-bin-line"></span></a></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="col-12 col-md-7 col-xl-6">
                        <form action="code.php" method="POST">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white">
                                    Admission Schedule *Time <a href="#admission_time" class="btn btn-sm btn-success float-end" data-bs-toggle="modal"> Add New Time </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table id="Mytableid" class="table table-bordered table-striped">

                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">Admission Time Schedule</td>
                                                <td colspan="2" style="text-align: center;">Available Slot</td>
                                                <td colspan="2" style="text-align: center;">Status</td>
                                                <td colspan="2" style="text-align: center;">Action</td>
                                            </tr>
                                            <?php
                                            $query1 = "SELECT * FROM admission_time ORDER BY sched_time_start ";

                                            $query_run1 = mysqli_query($conn, $query1);

                                            if (mysqli_num_rows($query_run1) > 0) {
                                                while ($student = mysqli_fetch_array($query_run1)) {
                                            ?>


                                                    <tr style="text-align: center;">

                                                        <input type="hidden" name="academic_id" value="<?= $student['academic_id']; ?>">
                                                        <input type="hidden" name="status" value="0">
                                                        <input type="hidden" name="status1" value="1">

                                                        <td colspan="4">
                                                            <span style="font-weight: bolder;">
                                                                <?= $student['sched_time_start']; ?> - <?= $student['sched_time_stop']; ?>
                                                            </span>
                                                        </td>
                                                        <td colspan="2" style="width: 100px">
                                                            <input style="height: 30px;" type="number" min="0" data-sched_time_id="<?= $student['sched_time_id'] ?>" class="form-control text-center available_slot" value="<?= $student['available_slot']; ?>">
                                                        </td>

                                                        <td colspan="2">
                                                            <?php if (in_array($student['status'], array('1'))) : ?>
                                                                <a class="btn btn-primary btn-sm" href="code.php?sched_time_id=<?= $student['sched_time_id']; ?>&status=0">ACTIVE</a>
                                                            <?php endif; ?>

                                                            <?php if (in_array($student['status'], array('0'))) : ?>
                                                                <a class="btn btn-danger btn-sm" href="code.php?sched_time_id=<?= $student['sched_time_id']; ?>  &status=1">NOT ACTIVE</a>
                                                            <?php endif; ?>

                                                        </td>

                                                        <td colspan="2"><a class="btn btn-danger btn-sm" href='delete.php?sched_time_id=<?= $student['sched_time_id']; ?>'><span class="ri-delete-bin-line"></span></a></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Admission Slot Details
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped" style="text-align: center;">
                                    <tr>
                                        <th>TIME</th>
                                        <?php
                                        $querySched = "SELECT * FROM admission_sched ORDER BY sched_date";
                                        $querySchedRun = mysqli_query($conn, $querySched);
                                        $schedules = [];
                                        if (mysqli_num_rows($querySchedRun) > 0) {
                                            while ($sched = mysqli_fetch_assoc($querySchedRun)) {
                                                $schedules[] = $sched;
                                                echo "<th>" . date("M d, Y", strtotime($sched['sched_date'])) . "</th>";
                                            }
                                        }
                                        ?>
                                    </tr>

                                    <?php
                                    $queryTime = "SELECT * FROM admission_time ORDER BY sched_time_start";
                                    $queryTimeRun = mysqli_query($conn, $queryTime);
                                    if (mysqli_num_rows($queryTimeRun) > 0) {
                                        while ($time = mysqli_fetch_assoc($queryTimeRun)) {
                                            echo "<tr>";
                                            echo "<td>" . date("H:i", strtotime($time['sched_time_start'])) . " - " . date("H:i", strtotime($time['sched_time_stop'])) . "</td>";
                                            $start = $time['sched_time_start'];
                                            $stop = $time['sched_time_stop'];
                                            $sched_time = "$start-$stop";
                                            foreach ($schedules as $sched) {
                                                $queryCountSlot = "SELECT COUNT(*) AS slot_count FROM admission_list LEFT JOIN students ON admission_list.student_id = students.id WHERE sched_date = '" . $sched['sched_date'] . "' AND sched_time = '$sched_time' AND academic='$academic' AND semester_id = '$semester'";
                                                $queryCountSlotRun = mysqli_query($conn, $queryCountSlot);
                                                $slot_count = $queryCountSlotRun ? mysqli_fetch_assoc($queryCountSlotRun)['slot_count'] : 0;
                                                $available_slot = $time['available_slot'];
                                                $sched_time_id = $time['sched_time_id'];
                                                if ($slot_count < $available_slot) {
                                                    echo "<td>$slot_count / <span class='available_slot-$sched_time_id'>$available_slot</span>
                                                    <span class='badge rounded-pill bg-success'>Available</span>
                                                    <a href='../admission-list?sched_date=" . $sched['sched_date'] . "&sched_time=$sched_time' class='badge rounded-pill bg-primary'>View</a>
                                                    </td>";
                                                } else if ($slot_count == $available_slot) {
                                                    echo "<td>$slot_count / <span class='available_slot-$sched_time_id'>$available_slot</span>
                                                    <span class='badge rounded-pill bg-warning'>Slot Full</span>
                                                    <a href='../admission-list?sched_date=" . $sched['sched_date'] . "&sched_time=$sched_time' class='badge rounded-pill bg-primary'>View</a>
                                                    </td>";
                                                } else {
                                                    echo "<td>$slot_count / <span class='available_slot-$sched_time_id'>$available_slot</span>
                                                    <span class='badge rounded-pill bg-danger'>Over Slot</span>
                                                    <a href='../admission-list?sched_date=" . $sched['sched_date'] . "&sched_time=$sched_time' class='badge rounded-pill bg-primary'>View</a>
                                                    </td>";
                                                }
                                               
                                            }
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </table>
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
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>

    <!-- end: JS -->

    <script>
        $(document).ready(function() {
            $('.available_slot').change(function() {
                var available_slot = $(this).val();
                var sched_time_id = $(this).data('sched_time_id');
                $.ajax({
                    url: "code.php",
                    method: "GET",
                    data: {
                        available_slot: available_slot,
                        sched_time_id: sched_time_id
                    },
                    success: function(data) {
                       $('.available_slot-' + sched_time_id).text(available_slot);
                    }
                });
            });

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
                        $('#' + id).html('Sending Email ');
                        $('#' + id).addClass('btn-danger');
                    },
                    success: function(data) {
                        if (data == 'ok') {
                            $('#' + id).text('Email Send');
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


    <script>
        function select_all() {
            if (jQuery('#delete').prop("checked")) {
                jQuery('input[type=checkbox]').each(function() {
                    jQuery('#' + this.id).prop('checked', true);
                });
            } else {
                jQuery('input[type=checkbox]').each(function() {
                    jQuery('#' + this.id).prop('checked', false);
                });
            }
        }

        function delete_all() {
            var check = confirm("Are you sure?");
            if (check == true) {
                jQuery.ajax({
                    url: 'delete.php',
                    type: 'post',
                    data: jQuery('#frm').serialize(),
                    success: function(result) {
                        jQuery('input[type=checkbox]').each(function() {
                            if (jQuery('#' + this.id).prop("checked")) {
                                jQuery('#box' + this.id).remove();
                            }
                        });
                    }
                });
            }
        }
    </script>
</body>

</html>