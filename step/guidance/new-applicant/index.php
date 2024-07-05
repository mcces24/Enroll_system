<?php include "connection.php"  ?>
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
                <h5 class="fw-bold mb-0 me-auto">New Applicant</h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-12 col-xl-12" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                List of New Applicant

                                <div style="float: right;">
                                    <button type="button" name="bulk_email" class="btn btn-sm float-end btn-info email_button" id="bulk_email" data-action="bulk">Accept Selected</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                                    <div class="table-responsive">
                                        <table id="Mytableid">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th width="25%">Full Name</th>
                                                    <th width="20%">Address</th>
                                                    <th width="20%">School Graduated</th>
                                                    <th width="10%">Status</th>
                                                    <th width="10%">Select All <input type="checkbox" onclick="select_all()" id="delete" /></th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $start = $rows11['academic_start'];
                                                $end = $rows11['academic_end'];
                                                $semester = $rows111['semester_name'];

                                                $academic = "$start-$end";

                                                $query1 = "SELECT * FROM students where status_type='New Applicant' AND academic = '$academic' AND semester_id = '$semester' ORDER BY id ASC";

                                                $query_run1 = mysqli_query($conn, $query1);
                                                $count = 0;

                                                if (mysqli_num_rows($query_run1) > 0) {
                                                    while ($student = mysqli_fetch_array($query_run1)) {

                                                ?>
                                                        <tr style="text-align: center;">

                                                            <td style="text-align:left"><?= $student['fname']; ?> <?= $student['mname']; ?> <?= $student['lname']; ?></td>

                                                            <td><?= $student['address']; ?></td>
                                                            <td><?= $student['school_graduated']; ?></td>
                                                            <td><?= $student['type']; ?></td>
                                                            <td>
                                                                <?php
                                                                echo '
                            <input type="checkbox" onclick="return myfun()" id="' . $student["id"] . '" name="single_select" class="single_select" data-email="' . $student["email"] . '" data-name="' . $student["id"] . '" />
                        
                                                    ';
                                                                ?></td>

                                                            <td>
                                                                <form action="" method="post">
                                                                    <input type="hidden" class="email" name="email" value="<?= $student['email']; ?>" required>
                                                                    <input type="hidden" class="code" name="code" value="try" required>


                                                                    <?php


                                                                    $count = $count + 1;
                                                                    echo '
                                                            
                                                                
                                                                <button type="button" name="email_button" class="btn btn-info btn-sm email_button" id="' . $count . '" data-email="' . $student["email"] . '" data-name="' . $student["id"] . '" data-app="' . $student["id"] . '" data-action="single">Accept Request</button>
                                                                
                                                            
                                                            ';

                                                                    ?>
                                                                </form>
                                                            </td>
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
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                                    <script>
                                        jQuery(document).ready(function() {
                                            jQuery("#Mytableid").DataTable({
                                                "pageLength": 50
                                            });
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
                        $('#' + id).html('Accepting Request');
                        $('#' + id).addClass('btn-danger');
                    },
                    success:function(data){
                        console.log(data);
                        if(data == 1)
                        {
                            $('#'+id).text('Accepted Successful');
                            $('#'+id).removeClass('btn-danger');
                            $('#'+id).removeClass('btn-info');
                            $('#'+id).addClass('btn-success');
                        }
                        else if (data == null) {
                            $('#'+id).text(data);
                            $('#'+id).text('No Applicant Selected');
                            $('#'+id).removeClass('btn-danger');
                            $('#'+id).removeClass('btn-info');
                            $('#'+id).addClass('btn-info');
                        } else {
                            $('#'+id).text('No Applicant Selected');
                            $('#'+id).removeClass('btn-danger');
                            $('#'+id).removeClass('btn-info');
                            $('#'+id).addClass('btn-info');
                        }
                        $('#'+id).attr('disabled', false);

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