

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

<?php require '../inc/head.php';  ?>

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
                <h5 class="fw-bold mb-0 me-auto">Endorse Applicant</h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>

            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-5 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Search
                            </div>
                            <div class="card-body">




                                <form action="" method="GET">
                                    <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                        <div class="input-group mb-3 search-box">
                                            <input type="text" autocomplete="off" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                                    echo $_GET['search'];
                                                                                                                } ?>" class="form-control" placeholder="Search applicant number...">
                                            <div class="result"></div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-xl-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Results
                            </div>
                            <div class="card-body">
                                <?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))) : ?>
                                    <form action="code.php" method="POST">




                                        <?php

                                        if (isset($_GET['search'])) {
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM students INNER JOIN admission_score a ON students.applicant_id = a.applicant_id WHERE (status_type='Accept' OR status_type='Applicant' OR status_type='Enroll' OR status_type='Enroll New Students') AND  CONCAT(students.applicant_id) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($conn, $query);
                                            $count = 0;

                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $student) {
                                        ?>

                                                    <input type="hidden" name="applicant_id" value="<?= $student['applicant_id']; ?>">
                                                    <h4 class="text-center">Personal Info</h4>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Applicant Number:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['applicant_id']; ?>" disabled>
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Fullname:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['fname']; ?> <?= $student['mname']; ?> <?= $student['lname']; ?>" disabled>
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Gender:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['gender']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Address:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['address']; ?>" disabled>
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Age:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['age']; ?>" disabled>
                                                        </div>
                                                        <div style="float: left;" class="col-4 col-md-4 col-xl-4">
                                                            <label class="mb-1">
                                                                <h6>Birthdate:</h6>
                                                            </label>
                                                            <input style="width: 90%;" class="form-control" type="text" name="app" value="<?= $student['date_of_birth']; ?>" disabled>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="input-group mb-3">
                                                        <div style="float: left;" class="col-12 col-md-12 col-xl-12 text-center">
                                                            <input type="hidden" name="status_type" value="Applicant">
                                                            <?php if (in_array($student['status_type'], array('Accept'))) : ?>
                                                                <button type="submit" name="add_exam" class="btn btn-info btn-sm">
                                                                    Endorse Applicant
                                                                </button>
                                                            <?php endif; ?>
                                                            <?php if (in_array($student['status_type'], array('Applicant', 'Enroll'))) : ?>
                                                                <a href="steps.php?id=<?= $student['id']; ?>" target="_blank" class="btn btn-success btn-sm">Enrollment Steps</a>
                                                                <a href="results.php?applicant_id=<?= $student['applicant_id']; ?>" target="_blank" class="btn btn-success btn-sm">Assessment Report</a>
                                                                <a href="#edit1_" class="btn btn-success btn-sm" data-bs-toggle="modal"> Que Students | Applicant</a>
                                                            <?php endif; ?>
                                                            <?php if (in_array($student['status_type'], array('Enroll New Students'))) : ?>
                                                                <a href="results.php?applicant_id=<?= $student['applicant_id']; ?>" target="_blank" class="btn btn-primary btn-sm">Assessment Report</a>
                                                                <a href="personal-sheet.php?applicant_id=<?= $student['applicant_id']; ?>" target="_blank" class="btn btn-success btn-sm">Personal Sheet</a>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="edit1_" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalLabel">Que Applicant</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left;">
                                                                <form action="code.php" method="POST">
                                                                    <input type="hidden" name="id" value="<?php echo $student['id'] ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-group"> Que Number </label>
                                                                        <input type="text" name="queuing" id="queuing" class="form-control" placeholder="Enter que number here...">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="que_applicant" class="btn btn-primary btn-sm"> Que Students/Applicant</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Moda -->

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6" style="text-align:center;">Applicant Number Not Found</td>
                                                </tr>
                                                </tbody>

                                        <?php
                                            }
                                        }

                                        ?>

                                    </form>
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
</body>

</html>
