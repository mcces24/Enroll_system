<div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php  echo $new_students+$old_students; ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="../new-students/index.php?search=<?php // echo $new ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">New Students</div>
                                    <span class="fs-7">Latest Applicant Enroll : <?php // echo $new ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php // echo $new_students; ?></span>
                            </a>
                            <a href="../pre-enrollment/index.php"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Old Students</div>
                                    <span class="fs-7">Latest Pre-enroll Old Students: <?php echo $old_students ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php // echo $old_students; ?></span>
                            </a>
                        </div>
                        <?php else: ?>
                        <h5 class="p-3 bg-indigo text-light">No Notification</h5>
                        <?php endif; ?>
                    </div>
                    <div class="dropdown me-3 d-none d-sm-block">
                    
                    
                </div>
<div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <?php 
                        $username = $_SESSION['SESSION_REGISTRAR'];
			                $sel = "SELECT * FROM users WHERE role='Registrar Office' AND online = '1' AND username='$username'";
			                $query = mysqli_query($conn,$sel);
			                $resul = mysqli_fetch_assoc($query);
			            ?>
                        <span class="me-2 d-none d-sm-block"><?php  echo $resul['name'] ?></span>
                        <img class="navbar-profile-image"
                            src="../../../admin/admin/user/uploads/<?php  echo $resul['profile'] ?>"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../login/logout.php?id=<?php  echo $resul['id'] ?>">Logout<i style="float: right;" class="ri-login-box-line"></i></a></li>
                    </ul>
                </div>