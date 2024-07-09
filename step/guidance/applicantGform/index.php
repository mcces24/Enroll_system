<?php
include '../inc/head.php';
$data = applicantGuidanceFormDataFunction();
$applicantGuidanceFormData = isset($data['applicantGuidanceFormData']) ? $data['applicantGuidanceFormData'] : [];

// print_r($applicantGuidanceFormData);
?>

<?php include '../inc/head.php';  ?>

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
                                <div class="table-responsive">
                                    <table id="Mytableid">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th>App Number</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($applicantGuidanceFormData)) {
                                                foreach ($applicantGuidanceFormData as $applicant) {
                                            ?>
                                                    <tr style="text-align: center;">
                                                        <td><?= $applicant['applicant_id']; ?></td>
                                                        <td><?= $applicant['fname']; ?> <?= $applicant['mname']; ?> <?= $applicant['lname']; ?></td>
                                                        <td><?= $applicant['address']; ?></td>
                                                        <td><?= $applicant['gender']; ?></td>
                                                        <td><?= $applicant['age']; ?></td>
                                                        <td><a class="btn-sm btn btn-success" href="./guidance_form.php?applicant_id=<?= $applicant['applicant_id']; ?>" target="_blank">Print Guidance Form</a></td>
                                                    </tr>
                                            <?php
                                                }
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- end: JS -->
</body>

</html>