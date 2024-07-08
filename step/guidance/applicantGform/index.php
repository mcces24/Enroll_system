

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
                <h5 class="fw-bold mb-0 me-auto">Guidance Record | Form 1 </h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">

                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Applicant Guidance Form 1 Record
                            </div>
                            <div class="card-body">
                                <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                                    <div class="table-responsive">
                                        <table id="Mytableid1">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th width="10%">App Number</th>
                                                    <th width="15%">Name</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $start = $rows11['academic_start'];
                                                $end = $rows11['academic_end'];
                                                $semester = $rows111['semester_name'];

                                                $academic = "$start-$end";

                                                $query1 = "SELECT * FROM guidance_record g INNER JOIN students s ON g.applicant_id = s.applicant_id ";

                                                $query_run1 = mysqli_query($conn, $query1);
                                                $count = 0;

                                                if (mysqli_num_rows($query_run1) > 0) {
                                                    while ($student = mysqli_fetch_array($query_run1)) {

                                                ?>
                                                        <tr style="text-align: center;">
                                                            <td><?= $student['applicant_id']; ?></td>
                                                            <td><?= $student['fname']; ?> <?= $student['mname']; ?> <?= $student['lname']; ?></td>
                                                            <td><a class="btn-sm btn btn-success" href="./guidance_form.php?applicant_id=<?= $student['applicant_id']; ?>" target="_blank">Print Guidance Form</a></td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                                    <script>
                                        jQuery(document).ready(function() {
                                            jQuery("#Mytableid1").DataTable();
                                        });
                                    </script>
                                <?php endif; ?>
                                <?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))) : ?>
                                    <h2>Pre-Enrollemnt is currently not Available</h2>
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
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js"></script>
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
                        $('#' + id).html('Sending Email ');
                        $('#' + id).addClass('btn-danger');
                    },
                    success: function(data) {
                        if (data == 'ok') {
                            $('#' + id).text('Email Sent');
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