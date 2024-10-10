<?php
include '../inc/head.php';
$data = newApplicant();
$newApplicatTableData = isset($data['newApplicantData']) ? $data['newApplicantData'] : [];
?>

<body style="width: 100%;">
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
                <h5 class="fw-bold mb-0 me-auto">New Applicant</h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Table -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-12 col-xl-12" style="width: 100%;">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                List of New Applicant

                                <div style="float: right;">
                                    <button type="button" name="accept_button" class="btn btn-sm float-end btn-info accept_button" id="accept_button" data-action="bulk">Accept Selected</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <?php if (!empty($academic) && !empty($semester)) : ?>
                                    <div class="table-responsive">
                                        <table id="Mytableid">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Address</th>
                                                    <th>School Graduated</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Status</th>
                                                    <th for="checkALl">Select All <input type="checkbox" name="checkALl" onclick="select_all()" id="select-all" /></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($newApplicatTableData)) {
                                                    foreach ($newApplicatTableData as $applicant) {
                                                ?>      
                                                    <tr style="text-align: center;" id="table-row-<?= $applicant["id"] ?>">
                                                        <td style="text-align:left"><?= $applicant['fname']; ?> <?= $applicant['mname']; ?> <?= $applicant['lname']; ?></td>
                                                        <td><?= $applicant['address']; ?></td>
                                                        <td><?= $applicant['school_graduated']; ?></td>
                                                        <td><?= $applicant['gender']; ?></td>
                                                        <td><?= $applicant['age']; ?></td>
                                                        <td><?= $applicant['type']; ?></td>
                                                        <td>
                                                            <?php
                                                            echo '<input type="checkbox" id="' . $applicant["id"] . '" name="single_select" class="single_select" data-email="' . $applicant["email"] . '" data-id="' . $applicant["id"] . '" />';
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <form action="" method="post">
                                                                <input type="hidden" class="email" name="email" value="<?= $applicant['email']; ?>">
                                                                <?php
                                                                echo '<button type="button" name="accept_button" class="btn btn-info btn-sm accept_button" id="id-' . $applicant["id"] . '" data-email="' . $applicant["email"] . '" data-id="' . $applicant["id"] . '" data-app="' . $applicant["id"] . '" data-action="single">Accept Request</button>';
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
                                <?php else : ?>
                                    <h2>Pre-Enrollemnt is currently not Available</h2>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end: Table -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery("#Mytableid").DataTable({
                "pageLength": 50,
                "ordering": false, 
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
            $('.accept_button').click(function() {
                $(this).prop('disabled', true);
                var id = $(this).attr("id");
                var action = $(this).data("action");
                var data = [];
                if (action == 'single') {
                    data.push({
                        email: $(this).data("email"),
                        id: $(this).data('id')
                    });
                } else {
                    $('.single_select').each(function() {
                        if ($(this).prop("checked") == true) {
                            data.push({
                                email: $(this).data("email"),
                                id: $(this).data('id')
                            });
                        }
                    });
                }
                console.log(data);
                if (data.length > 0) {
                    
                    data.forEach((value, index) => {
                        var id = value.id
                        $('#id-' + id).html('<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Accepting...');
                        $('#id-' + id).addClass('btn-info');
                        $('#id-' + id).prop('disabled', true);
                        $.ajax({
                            dataType: 'json',
                            url: BASE_PATH + '/Master/POST/POST.php',
                            method: "POST",
                            data: {
                                type: 'acceptNewApplicant',
                                data: value
                            },
                            beforeSend: function() {
                                var id = value.id
                                $('#id-' + id).html('<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Accepting...');
                                $('#id-' + id).addClass('btn-info');
                                $('#id-' + id).prop('disabled', true);
                            },
                            success: function(data) {

                                var response = JSON.parse(data);
                                var id = response.id;
                                var message = response.message;
                                var type = response.type;
                                var status = response.status;
                                if (status == 'success') {
                                    $('#id-' + id).text(message);
                                    $('#id-' + id).removeClass('btn-danger');
                                    $('#id-' + id).removeClass('btn-info');
                                    $('#id-' + id).addClass('btn-' + type);
                                    $('#table-row-' + id).fadeOut(2000, function() {
                                        $(this).html('');
                                    });
                                } else if (status == 'failed') {
                                    $('#id-' + id).text(message);
                                    $('#id-' + id).removeClass('btn-danger');
                                    $('#id-' + id).removeClass('btn-info');
                                    $('#id-' + id).removeClass('btn-success');
                                    $('#id-' + id).addClass('btn-' + type);
                                } else {
                                    $('#id-' + id).text('Cannot Accept Request');
                                    $('#id-' + id).removeClass('btn-danger');
                                    $('#id-' + id).removeClass('btn-info');
                                    $('#id-' + id).addClass('btn-info');
                                }
                                $('#id-' + id).attr('disabled', false);

                                if (action != 'single') {
                                    $('#' + id).text('Selected Accepted');
                                    $('#' + id).addClass('btn-success');
                                    $('#' + id).removeClass('btn-info');
                                    setTimeout(function() {
                                        $('#' + id).text('Accept Selected');
                                        $('#' + id).addClass('btn-info');
                                        $('#' + id).removeClass('btn-success');
                                        $('#' + id).prop('disabled', false);
                                    }, 2000);
                                }
                            }, 
                            error: function(xhr, status, error) {
                                console.error("Error: " + error);
                                console.error("Status: " + status);
                                console.error("Response: " + xhr.responseText);
                                $('#' + id).html("Cannot Accept Request");
                                $('#' + id).removeClass('btn-info');
                                $('#' + id).addClass('btn-danger');
                                $('#' + id).prop('disabled', false);
                            }
                        });
                    });
                    
                    data = [];
                } else {
                    alert("Please Select atleast one checkbox");
                    $(this).prop('disabled', false);
                }
            });
        });
        
        function select_all() {
            if (jQuery('#select-all').prop("checked")) {
                jQuery('input[type=checkbox]').each(function() {
                    jQuery('#' + this.id).prop('checked', true);
                });
            } else {
                jQuery('input[type=checkbox]').each(function() {
                    jQuery('#' + this.id).prop('checked', false);
                });
            }
        }
    </script>
    <!-- end: JS -->
</body>

</html>
