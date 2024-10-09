<?php
session_start();
require '../../../database/config.php';

if (!isset($_SESSION['SESSION_REGISTRAR'])) {
	header("Location: ../login/index.php");
	die();
} else {
	$username = $_SESSION['SESSION_REGISTRAR'];
}
?>
<?php

require '../../../database/config.php';

$querys1 = "SELECT * FROM students WHERE status_type = 'Enroll' GROUP BY applicant_id DESC LIMIT 1";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
	foreach ($querys_run1 as $new_applicant)
		$new = $new_applicant['applicant_id'];
?>
<?php
} else {
	$new = 'None';
}

?>

<?php

require '../../../database/config.php';

$querys1 = "SELECT * FROM students WHERE status_type = 'Pre Old Students' GROUP BY id_number DESC LIMIT 1";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
	foreach ($querys_run1 as $old_applicant)
		$old = $old_applicant['id_number'];
?>
<?php
} else {
	$old = 'None';
}

?>

<?php


$query = "SELECT * FROM academic WHERE status='1' order by academic_id desc ";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
	$student = mysqli_fetch_array($query_run);
?><?php
								}


									?>

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
<?php include '../dashboard-data.php'; ?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))): ?>

<?php endif; ?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))): ?>
	<?php
	$count_not = 0;
	$count_fail = 0;
	$count_new = 0;
	$count = 0;
	?>
<?php endif; ?>
<?php

require '../../../database/config.php';



$querys = "SELECT * FROM academic GROUP BY status";
$querys_run = mysqli_query($conn, $querys);

if (mysqli_num_rows($querys_run) > 0) {

	foreach ($querys_run as $rows12)
?><?php
			}

					?>
<?php

require '../../../database/config.php';


$querys1 = "SELECT * FROM semester GROUP BY sem_status";
$querys_run1 = mysqli_query($conn, $querys1);

if (mysqli_num_rows($querys_run1) > 0) {
	foreach ($querys_run1 as $rows112)
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
<?php
require '../../../database/regis.php';
require '../../../database/regis2.php';
require '../../../database/regis3.php';
?>
<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))): ?>

	<?php
	$try =  $student['academic_start'];

	$query2 = "SELECT * from students order by id_number desc limit 1";
	$result2 = mysqli_query($conn, $query2);
	$row = mysqli_fetch_array($result2);
	$last_id = $row['id_number'];
	$customer_ID = substr($last_id, 5);
	$customer_ID = "$try-$customer_ID";
	if ($last_id == $customer_ID) {
		$customer_ID = substr($last_id, 5);
		$customer_ID = str_pad(intval($customer_ID) + 1, strlen($customer_ID), '0', STR_PAD_LEFT);
		$customer_ID = "$try-$customer_ID";
	} else {
		$customer_ID = "$try-0001";
	}
	?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- start: Icons -->
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
	<!-- start: Icons -->
	<!-- start: CSS -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/style.css">

	<!-- end: CSS -->
	<title>Pre Enrollment Old - Registrar Office</title>

	<script src="sweetalert.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" type="image" href="../../../icon.png">
</head>

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
	<script src="new_script.js"></script>
	<script src="enroll.js"></script>
	<script src="total.js"></script>
	<script src="fill_up.js"></script>
	<div class="sidebar-overlay"></div>
	<!-- end: Sidebar -->

	<!-- start: Main -->
	<main class="bg-light">
		<div class="p-2">
			<!-- start: Navbar -->
			<nav class="px-3 py-2 bg-white rounded shadow-sm">
				<i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
				<h5 class="fw-bold mb-0 me-auto">Students Report</h5>


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
								List of Pre Enrollemnt
							</div>

							<div class="card-body">
								<?php if (in_array($rows['status'] and $rows1['sem_status'], array('1'))): ?>
									<div class="table-responsive">
										<table id="Mytableid">
											<thead style="text-align: center;">
												<tr>
													<th>ID Number</th>
													<th>Full Name</th>
													<th>Address</th>
													<th>Gender</th>
													<th>Course</th>
													<th>Year Level</th>
													<th>Section</th>
													<th >Status</th>
													<!-- <th width="10%">Select All <input type="checkbox" onclick="select_all()" id="delete" /></th>
													<th width="15%">Action</th> -->
												</tr>
											</thead>
											<tbody>
												<?php
												$start = $rows11['academic_start'];
												$end = $rows11['academic_end'];
												$semester = $rows111['semester_name'];

												$academic = "$start-$end";

												$query1 = "SELECT * FROM students 
													INNER JOIN course ON students.course_id=course.course_id
													INNER JOIN year_lvl ON students.year_id=year_lvl.year_id
													INNER JOIN sections ON students.section_id=sections.section_id
													WHERE (status_type='Enroll Old Students' OR status_type='Enroll New Students') AND academic = '$academic' AND semester_id = '$semester'
													ORDER BY id ASC
												";

												$query_run1 = mysqli_query($conn, $query1);
												$count = 0;

												if (mysqli_num_rows($query_run1) > 0) {
													while ($student = mysqli_fetch_array($query_run1)) {

												?>
														<tr style="text-align: center;">

															<td><?= $student['id_number']; ?></td>
															<td style="text-align:left"><?= $student['fname']; ?> <?= $student['mname']; ?> <?= $student['lname']; ?></td>
															<td style="text-align:left"><?= $student['address']; ?></td>
															<td><?= $student['gender']; ?></td>
															<td><?= $student['course_code']; ?></td>
															<td><?= $student['year_name']; ?></td>
															<td><?= $student['sections']; ?></td>
															<td><?= $student['type']; ?></td>
															<!-- <td>
																<?php
																echo '
                           									 		<input type="checkbox" onclick="return myfun()" id="' . $student["id"] . '" name="single_select" class="single_select" data-email="' . $student["email"] . '" data-name="' . $student["id"] . '" />
                        
                                                    			';
																?>
															</td>
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
															</td> -->
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
										$(document).ready(function() {
											$('#Mytableid').DataTable({
												"pageLength": 50,
												dom: 'Bfrtip',
												buttons: {
													buttons: [

														{
															extend: 'copy',
															className: 'bg-success'
														},
														{
															extend: 'csv',
															className: 'bg-primary'
														},
														{
															extend: 'excel',
															className: 'bg-primary'
														},
														{
															extend: 'pdf',
															className: 'bg-primary'
														},
														{
															extend: 'print',
															className: 'bg-secondary'
														},
													]
												}
											});
										});
									</script>
								<?php endif; ?>
								<?php if (in_array($rows['status'] and $rows1['sem_status'], array('0'))): ?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
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
					success: function(data) {
						if (data == 'ok') {
							$('#' + id).text('Accepted Successful');
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
