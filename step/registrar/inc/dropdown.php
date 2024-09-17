<?php
$sql_new="SELECT COUNT(*) as new_students from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Enroll'";
$query_new = mysqli_query($conn,$sql_new);
$new= mysqli_fetch_assoc($query_new);
$new_students = $new['new_students'] ?? 0;

$sql_new="SELECT applicant_id from students INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Enroll' ORDER BY id DESC LIMIT 1";
$query_new = mysqli_query($conn,$sql_new);
$new= mysqli_fetch_assoc($query_new);
$applicant_id_new = $new['applicant_id'] ?? 'NONE';

$sql_old="SELECT COUNT(*) as old_students  from students  INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Old Students'";
$query_old = mysqli_query($conn,$sql_old);
$old= mysqli_fetch_assoc($query_old);
$old_students = $old['old_students'] ?? 0;

$sql_old="SELECT id_number from students INNER JOIN year_lvl y On students.year_id=y.year_id INNER JOIN course c ON students.course_id=c.course_id WHERE semester_id = '$semester' AND academic = '$academic' AND  status_type = 'Old Students' ORDER BY id DESC LIMIT 1";
$query_old = mysqli_query($conn,$sql_old);
$old= mysqli_fetch_assoc($query_old);
$id_number_old = $old['id_number'] ?? 'NONE';
?>
<div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"><span style="font-size: 10px; float: right;"><?php  echo $new_students+$old_students; ?></i>
                    </div>
                    
                    <div class="dropdown-menu fx-dropdown-menu">
                        <?php if(in_array($rows['status'] AND $rows1['sem_status'],array('1'))): ?>
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="../new-students/index.php?search=<?php echo $applicant_id_new ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">New Students</div>
                                    <span class="fs-7">Latest Applicant Enroll : <?php echo $applicant_id_new ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $new_students; ?></span>
                            </a>
                            <!-- <a href="../pre-enrollment/index.php" -->
                             <a href="../old-students/index.php?search=<?php echo $id_number_old ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Old Students</div>
                                    <span class="fs-7">Latest Pre-enroll Old Students: <?php echo $id_number_old ?></span>
                                </div>
                                <span class="badge bg-primary rounded-pill"><?php echo $old_students; ?></span>
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