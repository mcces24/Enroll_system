<?php
session_start();


require '../../database/config.php';

if (!isset($_SESSION['SESSION_STUDENTS'])) {
    header("Location: login/index.php");
    die();
} else {
    $user_id = $_SESSION['USER_ID'];
    $id_number = 0;
    
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- end: CSS -->
    <title>Students - Madridejos Community College</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link rel="icon" type="image" href="../../icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        .kbw-signature {
            width: 400px;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>


</head>

<body style="width: 100%;">

    <div class="loader-wrapper" id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <link rel="stylesheet" type="text/css" href="../../loader/styles.css" />
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none"
        })
    </script>




    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <img class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4" style="height: 50px; " src="../assets/mcc2.png">
            <a href="index.php" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Student</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">

            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">System</li>
            <li class="sidebar-menu-item has-dropdown">
            <li class="sidebar-menu-item">
                <a href="index.php">
                    <i class="ri-home-2-line sidebar-menu-item-icon"></i>
                    Home
                </a>
            </li>
            </li>
            <li class="sidebar-menu-item has-dropdown">
            <li class="sidebar-menu-item">
                <a href="https://infotechmcc.com">
                    <i class="ri-numbers-line sidebar-menu-item-icon"></i>
                    Grades
                </a>
            </li>
            </li>
            <li class="sidebar-menu-item has-dropdown">
            <li class="sidebar-menu-item">
                <a href="#">
                    <i class="ri-bar-chart-line sidebar-menu-item-icon"></i>
                    Evaluation
                </a>
            </li>
            </li>


        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2" id="frame">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Students Information | Study Load</h5>

                <div class="dropdown me-3 d-none d-sm-block">
                </div>

                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="navbar-profile-image" src="../id/uploads/picture.png" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                       
                        <li><a class="dropdown-item" href="login/logout.php">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
                    </ul>
                </div>
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
                            padding: 5px;
                            text-align: center;
                        }

                        .card-body table .btn {
                            font-size: 15px;
                        }

                        .card-header .btn {
                            font-size: 15px;
                        }

                        .study tr th,
                        .study tr td {
                            font-size: 10px;
                            padding: 0px;
                        }

                        .upper table,
                        .upper thead,
                        .upper tbody,
                        .upper th,
                        .upper td,
                        .upper tr {
                            display: block;
                        }

                        table .id {
                            height: 100px;
                            width: 100px;
                        }

                        .logo {
                            width: 400px;
                            height: auto;
                        }

                        #invoice img {
                            height: 50px;
                            width: 100%;
                        }

                    }
                </style>
                <!-- start: Summary -->

                <!-- end: Summary -->
                <!-- start: Graph -->
                <div class="row g-3 mt-2">












                 
                    <br>





                    <!-- end: Graph -->
                </div>
                <!-- end: Content -->
            </div>
    </main>


    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>


    <!-- end: JS -->



</body>

</html>


<script type="text/javascript" src="dom-to-image.js"></script>
<script type="text/javascript">
    var ticket = document.getElementsByClassName("load")[0];
    var download_button = document.getElementById("dw_bt");

    download_button.addEventListener("click", () => {
        domtoimage.toPng(ticket).then((data) => {
            var link = document.createElement("a");
            link.download = "class-schedule.png";
            link.href = data;
            link.click();
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="custom.js"></script>