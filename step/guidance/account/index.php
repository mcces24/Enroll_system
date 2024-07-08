
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

$querys1 = "SELECT * FROM students WHERE status_type = 'Old Students' GROUP BY id_number DESC LIMIT 1";
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

<?php include '../inc/head.php';  ?>

<body style="width: 100%;">
    <?php include('message.php'); ?>


    <!-- start: Sidebar -->
    <?php include '../inc/navbar.php';  ?>
    <script src="script.js"></script>

    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Gmail Account</h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8" style="width: 150%;">
                        <form action="code.php" method="POST">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white">
                                    Email Account
                                    <button type="submit" name="add_exam1" class="float-end btn btn-sm btn-success"> Save/Update</a>
                                </div>
                                <div class="card-body">

                                    <table class="table">
                                        <tbody>
                                            <?php



                                            $query = "SELECT * FROM system  ";
                                            $query_run = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $student) {
                                            ?>
                                                    <input type="hidden" name="student_id" value="<?= $student['system_id']; ?>">

                                                    <tr>

                                                        <div class="form-group">
                                                            <label class="col-form-label"> Email User : </label>
                                                            <input type="text" name="email_user" id="email_user" class="form-control" placeholder="Enter Findings" value="<?= $student['email_user']; ?>">
                                                        </div>



                                                        <div class="form-group">
                                                            <label class=" col-form-label"> Email Password : </label>
                                                            <input type="text" name="email_pass" id="email_pass" class="form-control" placeholder="Enter Findings" value="<?= $student['email_pass']; ?>">
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="email_name" class="col-form-label"> Email Name : </label>
                                                            <input type="text" name="email_name" id="email_name" class="form-control" placeholder="Enter Findings" value="<?= $student['email_name']; ?>">
                                                        </div>
                                                    </tr>


                                </div>






                            <?php
                                                }
                                            } else {
                            ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">No ID Number Found!!</td>
                            </tr>

                        <?php
                                            }


                        ?>




                        </tbody>
                        </table>
                        </form>
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
                        $('#' + id).html('Sending Email');
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
</body>

</html>