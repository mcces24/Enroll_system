<div class="dropdown me-3  d-sm-block">
    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ri-notification-line" style="font-size: 20px;"><span style="font-size: 15px; float: right;"><span id="total-notification"></span></i>
    </div>

    <div class="dropdown-menu fx-dropdown-menu" style="width: 400px;">
        <?php if (!empty($academicYear) && !empty($semesterAll) && in_array($academicYear['status'] and $semesterAll['sem_status'], array('1'))) : ?>
            <h5 class="p-3 bg-indigo text-light text-center">Notification</h5>
            <div class="list-group list-group-flush">
                <a href="../new-applicant/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start link-new-applicant hide" style="display: none !important;">
                    <div class="me-auto">
                        <div class="fw-semibold">New Applicant</div>
                        <span class="fs-7">For Academic <?php echo $academic; ?>, <?php echo $semester; ?></span>
                    </div>
                    <span class="badge bg-primary rounded-pill"><span id="new-applicant"></span></span>
                </a>
                <a href="../accepted-applicant/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start link-accepted-applicant" style="display: none !important;">
                    <div class="me-auto">
                        <div class="fw-semibold">Accepted Applicant</div>
                        <span class="fs-7">For Academic <?php echo $academic; ?>, <?php echo $semester; ?></span>
                    </div>
                    <span class="badge bg-primary rounded-pill"><span id="accept-applicant"></span></span>
                </a>
                <a href="../applicant-info/" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start link-applicant-info" style="display: none !important;">
                    <div class="me-auto">
                        <div class="fw-semibold">Applicant Form</div>
                        <span class="fs-7">Total Number of New Applicant who filled the form</span>
                    </div>
                    <span class="badge bg-primary rounded-pill"><span id="form-done"></span></span>
                </a>
            </div>
        <?php else : ?>
            <h5 class="p-3 bg-indigo text-light text-center">Notification</h5>
                <div class="me-auto text-center">
                    <div class="fw-semibold">No Notification</div>
                </div>
        <?php endif; ?>
    </div>
</div>
<div class="dropdown">
    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-2 d-none d-sm-block"><?php echo isset($user['name']) ? $user['name'] : 'Guidance' ?></span>
        <img class="navbar-profile-image" src="../../../admin/admin/user/uploads/<?php echo isset($user['profile']) ? $user['profile'] : 'none' ?>" alt="Image">
    </div>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><button class="dropdown-item" id="logout">Logout<i style="float: right;" class="ri-login-box-line"></i></button></li>
    </ul>
</div>

<script>
    var BASE_PATH = <?php echo json_encode(BASE_PATH_URL); ?>;
    $(document).ready(function(event) {
        // setInterval(() => {
        //     getNotification();
        // }, 2000);

        $('#logout').click(function() {
            $.ajax({
                url: BASE_PATH + '/Master/POST/POST.php',
                type: 'POST',
                data: {
                    type: 'guidanceLogout'
                },
                success: function(response) {
                    response = JSON.parse(response);
                    console.log(response);
                    if (response.status == 'success') {
                        swal({
                           title: response.message,
                           text: "You are now logout!",
                           icon: response.type,
                           button: "Okay",
                        })
                        .then((value) => {
                            window.location.href = BASE_PATH + '/step/guidance/login/';
                        });
                    }
                }
            });
        });
    });

    getNotification();

    function getNotification() {
        $.ajax({
            url: BASE_PATH + '/Master/POST/POST.php',
            type: 'POST',
            data: {
                type : 'getNotification'
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.totalNewApplicant > 0) {
                    $('.link-new-applicant').show();
                }
                if (response.totalAcceptApplicant > 0) {
                    $('.link-accepted-applicant').show();
                }
                if (response.totalFormDone + 0) {
                    $('.link-applicant-info').show();
                }
                //console.log(response);
                $('#total-notification').html(response.totalNotifications);
                $('#new-applicant').html(response.totalNewApplicant);
                $('#accept-applicant').html(response.totalAcceptApplicant);
                $('#form-done').html(response.totalFormDone);
                $('#new-applicant-side').html(response.totalNewApplicant);
                $('#accept-applicant-side').html(response.totalAcceptApplicant);
                $('#form-done-side').html(response.totalFormDone);
            }
        });
    }
</script>

