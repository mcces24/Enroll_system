<?php
$academicYear = getActiveAcademicYear();
$semester = getActiveSemester();
$enroll = getActiveEnroll();
?>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
<!--end::Global Stylesheets Bundle-->


<!--end::Head-->
<!--begin::Body-->

<class id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">

        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body pb-0">
                            <!--begin::Heading-->
                            <div class="card-px text-center pt-20 pb-5">
                                <!--begin::Title-->
                                <?php if (in_array($academicYear['status'] and $semester['sem_status'], array('1'))) : ?>
                                    <header class="entry-header ast-no-thumbnail ast-no-meta">
                                        <h1 class="entry-title" itemprop="headline">Pre Enrollment for
                                            Academic Year :
                                            <?= $academicYear['academic_start']; ?>-<?= $academicYear['academic_end']; ?> |
                                            <?= $semester['semester_name']; ?> for</h1>
                                    </header>
                                    <!-- .entry-header -->
                                <?php endif; ?>
                                <?php if (in_array($academicYear['status'] and $semester['sem_status'], array('0'))) : ?>
                                    <header class="entry-header ast-no-thumbnail ast-no-meta">
                                        <h1 class="entry-title" itemprop="headline">Pre Enrollment is
                                            currently NOT AVAILABLE.</h1>
                                    </header>
                                    <!-- .entry-header -->
                                <?php endif; ?>

                                <?php if ($enroll['enroll_name'] == 'New Students') { ?>

                                    <div class="color">
                                        <h2 class="fs-2x fw-bolder mb-0">New Students</h2>
                                        </br></br></br>
                                        <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                        <!-- <span class="exad-tab-title">New Students Pre-Enrollment</span> -->
                                    </div>

                                <?php } elseif ($enroll['enroll_name'] == 'Transferee Students') { ?>

                                    <div class="color">
                                        <h2 class="fs-2x fw-bolder mb-0">Transferee Students</h2>
                                        </br></br></br>
                                        <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                    </div>

                                <?php } elseif ($enroll['enroll_name'] == 'Old Students') { ?>

                                    <div class="color">
                                        <h2 class="fs-2x fw-bolder mb-0">Old Students</h2>
                                        </br></br></br>
                                        <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                    </div>

                                <?php } elseif ($enroll['enroll_name'] == 'Shift Students') { ?>

                                    <div class="color">
                                        <h2 class="fs-2x fw-bolder mb-0">Shift Students </h2>
                                        </br></br></br>
                                        <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                    </div>

                                <?php } elseif ($enroll['enroll_name'] == 'All') { ?>

                                    <div class="color" style="background-color: #9EF19E; border-radius: 20px;">
                                        <h3 class="fs-2x fw-bolder mb-0">New Students</h3>
                                    </div>

                                    <div class="color" style="background-color: #B4DBF5; border-radius: 20px;">
                                        <h3 class="fs-2x fw-bolder mb-0">Transferee</h3>
                                    </div>

                                    <div class="color" style="background-color: #FAFDC1; border-radius: 20px;">
                                        <h3 class="fs-2x fw-bolder mb-0">Old Students</h3>
                                    </div>

                                    <div class="color" style="background-color: #FBCCAE; border-radius: 20px;">
                                        <h3 class="fs-2x fw-bolder mb-0">Shift Students</h3>
                                    </div>
                                    </li>
                                    </br></br></br>
                                    <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                <?php } else { ?>
                                    <?php if ($academicYear['status'] == '1' && $semester['sem_status'] == '1') : ?>
                                        </br></br></br>
                                        <h1 class="entry-title" itemprop="headline">Loading Pre-enrollment form. Please wait</h1>
                                    <?php elseif ($academicYear['status'] == '0' && $semester['sem_status'] == '0') : ?>
                                        </br></br></br>
                                        <h5 class="fs-2x fw-bolder mb-0">Is now ongoing..</h5>
                                        <!-- .entry-header -->
                                    <?php endif; ?>

                                <?php } ?>

                                <!--end::Title-->
                                <!--begin::Description-->
                                </br>
                                <!-- <p class="text-gray-400 fs-4 fw-bold py-7">Click on the below buttons
											<br />to launch pre-enrollment</p> -->
                                <!--end::Description-->

                                <!--begin::Action-->

                                <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_login">Pre-Enroll
                                    Now</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Illustration-->
                            <div class="text-center px-5">
                                <!-- <img src="assets/media/illustrations/sketchy-1/7.png" alt=""/> -->
                            </div>
                            <!--end::Illustration-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->


                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        <!--end::Content-->


    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->

    <?php
    include_once './assets/modal/modal.php';
    echo '<style type="text/css" scoped="true">
         // @import url("assets/css/style.bundle.css");
         </style>';
    ?>

    </div>
    <!--end::Root-->

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>

</class>
<!--end::Body-->

</html>