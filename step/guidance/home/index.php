<?php
include '../inc/head.php';

$home = home();
$category = isset($home['dashboardData']['barGraph']) ? $home['dashboardData']['barGraph'] : [];
?>


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
    <?php include '../inc/navbar.php';  ?>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Dashboard</h5>
                <?php include '../inc/dropdown.php' ?>
            </nav>
            <!-- end: Navbar -->

            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                <!-- <pre><?php print_r($category) ?></pre> -->
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../passed-and-enroll/" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-user-add-line summary-icon bg-primary mb-2"></i>
                                <div>Pass and Enrolled</div>
                            </div>
                            <h4 id="total-pass-and-enroll">Total: <?php echo $home['totalPassAndEnroll'] ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../passed-not-enroll/" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-user-line summary-icon bg-indigo mb-2"></i>
                                <div>Pass but not Enrolled</div>
                            </div>
                            <h4 id="total-pass-but-not-enroll">Total: <?php echo $home['totalPassButNotEnroll']  ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../not-pass/" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-user-unfollow-line summary-icon bg-success mb-2"></i>
                                <div>Failed to Passed </div>
                            </div>
                            <h4 id="total-failed-to-pass">Total: <?php echo $home['totalFailedToPass'] ?></h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="../accepted-applicant/" class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-group-line summary-icon bg-danger mb-2"></i>
                                <div>Accepted Pre-enrolled Applicant</div>
                            </div>
                            <h4 id="total-accepted-applicant">Total: <?php echo $home['totalAcceptedApplicant'] ?></span></h4>
                        </a>
                    </div>
                </div>
                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-7">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Applicant Population based on Admission Test Score
                            </div>
                            <div class="card-body">
                                <div id="barchart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-5">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Applicant Percentage based on Admission Test Score
                            </div>
                            <div class="card-body">
                                <div id="piechart"></div>
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


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Category', 'Total Students'],
                <?php
                $dataPoints = [];
                foreach ($category as $cat) {
                    $dataPoints[] = "['" . $cat['total_cat'] . "', " . $cat['number'] . "]";
                }
                echo implode(",\n", $dataPoints);
                ?>
            ]);


            var options = {

                title: 'Chess opening moves',

                legend: {
                    position: 'none'
                },
                height: 300,

                bars: 'vertical', // Required for Material Bar Charts.

                bar: {
                    groupWidth: "10%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart'));
            chart.draw(data, options);
        };
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['year_name', 'number'],
                <?php
                $dataPoints = [];
                foreach ($category as $cat) {
                    $dataPoints[] = "['" . $cat['total_cat'] . "', " . $cat['number'] . "]";
                }
                echo implode(",\n", $dataPoints);
                ?>
            ]);
            var options = {

                is3D: true,
                height: 300,
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>