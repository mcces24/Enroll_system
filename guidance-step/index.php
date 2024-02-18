<?php

include("../conn/conn.php");
require '../database/config.php';


if ($_GET && $_GET['applicant_id']) {
	$applicant_id = $_GET['applicant_id'];

    $query = "SELECT * FROM students WHERE applicant_id='$applicant_id' ";
    $query_run = mysqli_query($conn, $query);
    
    
    
if(mysqli_num_rows($query_run) > 0)
        {
        $student = mysqli_fetch_array($query_run);
        ?><?php
        }
        else
        {
        echo "<h4>No Such Id Found</h4>";
        }
}



?>
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Madridejos Community College Guidance Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>
			function toggleInput() {
					var otherInput = document.getElementById("otherInput");
														otherInput.style.display = (otherInput.style.display === "none" || otherInput.style.display === "") ? "block" : "none";
													}
													function toggleInputs() {
														var otherInput = document.getElementById("otherInputs");
														otherInput.style.display = (otherInput.style.display === "none" || otherInput.style.display === "") ? "block" : "none";
													}
													function toggleInputss() {
														var otherInput = document.getElementById("otherInputss");
														otherInput.style.display = (otherInput.style.display === "none" || otherInput.style.display === "") ? "block" : "none";
													}</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->

		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<!--begin::Card-->
		<div class="card" >
		<img src="banner.png" >
						<div style="text-align: center;" class="stepper-item current" data-kt-stepper-element="nav">
							<h1 class="stepper-title">Guidance Individual Record | Form 1</h1>
						</div>
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Stepper-->
				<div style="background-image: url(./images/banner.png)" class="bgi-no-repeat bgi-position-center"></div>
				
				<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
					<!--begin::Nav-->
					<div class="stepper-nav mb-5">
						<!--begin::Step 1-->
						<div class="stepper-item current" data-kt-stepper-element="nav">
							<h3 class="stepper-title">I. PERSONAL INFORMATION</h3>
						</div>
						<!--end::Step 1-->
						<!--begin::Step 2-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">II. FAMILY BACKGROUND</h3>
						</div>
						<!--end::Step 2-->
						<!--begin::Step 3-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">III. SCHOLASTIC RECORDS</h3>
						</div>
						<!--end::Step 3-->
						<!--begin::Step 4-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">IV. ACADEMIC RECORDS</h3>
						</div>
						<!--end::Step 4-->
						<!--begin::Step 5-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">V. MEDICAL HISTORY</h3>
						</div>
						<!--end::Step 5-->
						<!--begin::Step 6-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">VI.ORGANIZATIONAL AFFILIATION</h3>
						</div>
						<!--end::Step 6-->
						<!--begin::Step 6-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">VII.PSYCHOLOGICAL TEST TAKEN</h3>
						</div>
						<!--end::Step 6-->
						<!--begin::Step 7-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 class="stepper-title">VIII. PERSONALITY, ATTITUDES, & INTERESTS</h3>
						</div>
						<!--end::Step 7-->
						<!--begin::Step 8-->
						<div class="stepper-item" data-kt-stepper-element="nav">
							<h3 hidden class="stepper-title">Done</h3>
						</div>
						<!--end::Step 8-->
						
					</div>
					<!--end::Nav-->
					
					<!--begin::Form-->
					<form class="mx-auto mw-800px w-100 pt-15 pb-10" novalidate="novalidate"
						id="kt_create_account_form">

						
						<!--begin::Step 1-->
						<div class="current" data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder d-flex align-items-center text-dark">Personal
										Information
										<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
									<!--end::Title-->
									<!--begin::Notice-->
									<!-- <div class="text-muted fw-bold fs-6">If you need more info, please check out <a href="#" class="link-primary fw-bolder">Help Page</a>.
									</div> -->
									<!--end::Notice-->
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
								<input name="applicant_id" type="text" value="<?php echo $applicant_id ?>" style="display: none;">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">First
													Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fname" placeholder="Ex: Jose" value="<?php echo $student['fname'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Middle
													Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mname" placeholder="Ex: Laurel" value="<?php echo $student['mname'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Surname</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="lname" placeholder="Ex: Dela Crus" value="<?php echo $student['lname'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Nickname</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="nname" placeholder="Ex: Alias" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
											
											<!--begin::Col-->
											<div class="col-2">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Sex</label>
												<!--end::Label-->
												<select name="sex" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
												   <option></option>
												   <option <?php echo  $student['gender'] == 'Male' ? 'selected' : '' ?> value="Male">Male</option>
												   <option <?php echo  $student['gender'] == 'Female' ? 'selected' : '' ?> value="Female">Female</option>
												  
												</select>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Date of Birth</label>
												<!--end::Label-->
												<!--begin::Input-->
												
												<!-- <input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select date"/> -->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="dbirth" placeholder="Ex: 01/01/1990" value="<?php echo $student['date_of_birth'] ?>" />
													
												<!--end::Input-->
											</div>
											<div class="input-group-prepend col-2" >
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Age</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="numeric" maxlength="2" pattern="[0-9\s]{13,19}"
													class="form-control form-control-lg form-control-solid"
													name="age" placeholder="24" value="<?php echo $student['age'] ?>" />
													<!-- <span class="form-text text-muted">Please enter only digits</span> -->
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-5">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Place of Birth</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="pbirth" placeholder="Ex: Talangnan, Madridejos, Cebu" value="<?php echo $student['place_of_birth'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Current Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="cadd" placeholder="Ex: Talangnan, Madridejos, Cebu" value="<?php echo $student['address'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Permanent Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="padd" placeholder="Ex: Talangnan, Madridejos, Cebu" value="<?php echo $student['address'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Height</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="height" placeholder="Ex: 4'12" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Weight</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="weight" placeholder="Ex: 48" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Complexion</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="complex" placeholder="Skin Color" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Religion</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="religion" placeholder="Ex: Roman Catholic" value="<?php echo $student['religion'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Languages/Dialect spoken</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="langdi" placeholder="Ex: Cebuano/English" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Email Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="email" placeholder="Ex: juan.delacruz@gmail.com" value="<?php echo $student['email'] ?>" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 1-->
						<!--begin::Step 2-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Family Background
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								
								<div class="mb-10 fv-row ">
								<div class="pb-10 pb-lg-6">
									<!--begin::Title-->
									<h4 class="fw-bolder text-dark">Father Information</h4>
									
								</div>
									<!--begin::Col-->
									<div class="mb-10 fv-row ">
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Full Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text" 
													class="form-control form-control-lg form-control-solid"
													name="ffullname" placeholder="Ex: Jose L. Dela Cruz" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Date of Birth</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fdbirth" placeholder="Ex: 01/01/1990" value="" />
												<!--end::Input-->
											</div>
											<!--begin::Col-->
											<div class="col-2">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Age</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fage" placeholder="Ex: 28" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Contact No.</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fcontact" placeholder="Ex: 09XXXXXXXXX" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									</div>
								
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Occupation</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="foccopation" placeholder="Ex: Laborer" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Name of Employeer/Company</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="femploy" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Educational Attainment</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="feducattend" placeholder="Ex: Elementary" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											
											<div class="col-12" style="padding: 3% 1% 1% 1%;">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Home Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fhomeadd" placeholder="Ex: Talangnan, Madridjeos, Cebu" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								</div>
								
								<div class="mb-10 fv-row ">
								<div class="pb-10 pb-lg-6">
									<!--begin::Title-->
									<h4 class="fw-bolder text-dark">Mother Information</h4>
									
								</div>
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Full Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mfullname" placeholder="Ex: Juana L. Dela Cruz" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Date of Birth</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdbirth" placeholder="Ex: 01/01/1990" value="" />
												<!--end::Input-->
											</div>
											<!--begin::Col-->
											<div class="col-2">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Age</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mage" placeholder="Ex: 48" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Contact No.</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mcontact" placeholder="Ex: 09XXXXXXXXX" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Occupation</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="moccupation" placeholder="Ex: Housewife" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Name of Employeer/Company</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="meploy" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Educational Attainment</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="meducattend" placeholder="Ex: Elementary" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-12">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Home Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="madd" placeholder="Ex: Talangnan, Madridejos, Cebu" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   <!--end::Input group-->
								</div>
								<!--end::Col-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row ">
								<div class="pb-10 pb-lg-6">
									<!--begin::Title-->
									<label class="required fs-6 fw-bold form-label mb-2">(Please fill this up if you are not living with your parents, or leave it BLANK.)</label>
									<h4 class="fw-bolder text-dark">Guardian</h4>
									
								</div>
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Full Name</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gfullname" placeholder="Ex: Corazon P. Laurel" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="fs-6 fw-bold form-label mb-2">Date of Birth</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gdbirth" placeholder="Ex: 01/01/1990" value="" />
												<!--end::Input-->
											</div>
											<!--begin::Col-->
											<div class="col-2">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Age</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gage" placeholder="Ex: 21" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Contact No.</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gcontact" placeholder="Ex: 09XXXXXXXXX" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Occupation</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="goccupation" placeholder="Ex: Teacher" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Label-->
												<label class="fs-6 fw-bold form-label mb-2">Name of Employeer/Company</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gemploy" placeholder="Ex: Madridejos High School" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Educational Attainment</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="geducattend" placeholder="Ex: College" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-12">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Home Address</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="gadd" placeholder="Ex: Talangnan, Madridejos, Cebu" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
									<br>
								   <!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<h4 class="fw-bolder text-dark">Marital Condition of Parents:</h4>
											<div class="form-control form-control-lg col-10">
												<div class="radio-list">
													<label class="radio">
														<input type="radio" value="Married and Living Together"  name="radios1"/>
														<span></span>
														Married and living together 
													</label>
													
													<label class="radio">
														<input type="radio" value="Solo Parent" name="radios1"/>
														<span></span>
														Solo parent
													</label>
													<label class="radio">
														<input type="radio" value="One Parent is Deceased" name="radios1"/>
														<span></span>
														one parent is deceased 
													</label>
													<label class="radio">
														<input type="radio" value="Both Parents are Deceased" name="radios1"/>
														<span></span>
														Both parents are deceased 
													</label> <br>
													<label class="radio">
														<input type="radio" value="Other" name="radios1" onclick="toggleInput()"/>
														<span></span>
														Other														
													</label>
													<input type="text"
													class="form-control form-control-lg form-control-solid"
													id="otherInput"
													name="radios1_others"
													placeholder="Please Specify"
													value=""
													style="display:none"/>
													
												</div>
											</div>
											<!--end::Col-->
											
											
										</div>
										
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<h4 class="fw-bolder text-dark">Living With:</h4>
											<div class="form-control form-control-lg col-10">
												<div class="radio-list">
													<label class="radio">
														<input type="radio" value="Parents"  name="radios2"/>
														<span></span>
														Parents
													</label>
													<label class="radio">
														<input type="radio" value="Grandparents"  name="radios2"/>
														<span></span>
														Grandparents
													</label>
													<label class="radio">
														<input type="radio" value="Relatives"  name="radios2"/>
														<span></span>
														Relatives
													</label>
													<label class="radio">
														<input type="radio" value="Friends"  name="radios2"/>
														<span></span>
														Friends
													</label>
													<label class="radio">
														<input type="radio" value="Other" name="radios2"	onclick="toggleInputs()"/>
														<span></span>
														Other														
													</label>
													<input type="text"
													class="form-control form-control-lg form-control-solid"
													id="otherInputs"
													name="radios2_others"
													placeholder="Please Specify"
													value=""
													style="display:none"/>
													
												</div>
											</div>
											<h4 class="fw-bolder text-dark">Type of Discipline:</h4>
											<div class="form-control form-control-lg col-10">
												<div class="radio-list">
													<label class="radio">
														<input type="radio" value="Law"  name="radios3"/>
														<span></span>
														Law
													</label>
													<label class="radio">
														<input type="radio" value="Strict"  name="radios3"/>
														<span></span>
														Strict
													</label>
													<label class="radio">
														<input type="radio" value="Democratic"  name="radios3"/>
														<span></span>
														Democratic
													</label>
													</div>
											</div>
											<!--end::Col-->
											
											
										</div>
										
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
									 <!--begin::Col-->
									 <div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-6">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Source of Income</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sincome" placeholder="Ex: Farmer" value="" />
												<!--end::Input-->
												
											</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="col-6">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Birth Rank</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="brank" placeholder="Ex: 1st Child" value="" />
												<!--end::Input-->
												
											</div>
										<!--end::Row-->
									</div>
									 </div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->	
								<!--begin::Input group-->
								<div class="mb-10 fv-row ">
								<div class="pb-10 pb-lg-6">
									<!--begin::Title-->
									<label class="fs-6 fw-bold form-label mb-2">(If you are MARRIED, please fill this up or leave it BLANK)</label>
									<h4 class="fw-bolder text-dark">SPOUSE</h4>				
								</div>
									<div class="col-md-15 fv-row">
										<div class="row fv-row">
										<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Name</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sname" placeholder="Ex: Jose L. Dela Cruz" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Date of Birth</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sdbirth" placeholder="Ex: February 14, 2000" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Age</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sage" placeholder="Ex: 21" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Contact No.</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="scontact" placeholder="Ex: 09213456874" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Name of Employer/Company</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="semploy" placeholder="Ex: Jose L. Dela Cruz" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Educational Attainment</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="seducattend" placeholder="Ex: High School Level" value="" />
											</div>
											<div class="col-4">
												<label
													class="fs-6 fw-bold form-label mb-2">Home Address</label>
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sadd" placeholder="Ex: Bunakan, Madridejos, Cebu" value="" />
											</div>
										</div>
									</div>	
								</div>							
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 2-->
						<!--begin::Step 3-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Scholastic Records
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Elementary
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="enameschool" placeholder="Ex: Madridejos Central Elementary School" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Inclusive Dates</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="eincdate" placeholder="2006-2007" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Honors/Awards
																Received</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ehonor" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">High School
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="hnameschool" placeholder="Ex: Madridejos National High SChool" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Inclusive Dates</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="hincdate" placeholder="Ex: 2006-2007" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Honors/Awards
																Received</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="hhonor" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">College
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="cnameschool" placeholder="Ex: Madrijos Community Colloge" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Inclusive Dates</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="cincdate" placeholder="Ex: 2006-2007" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Honors/Awards
																Received</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="chonor" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Vocational
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="vnameschool" placeholder="Ex: TESDA" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="fs-6 fw-bold form-label mb-2">Inclusive Dates</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="vincdate" placeholder="Ex: 2006-2007" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Honors/Awards
																Received</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="vhonor" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 3-->
						<!--begin::Step 4-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Academic Records
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and leave BLANK if the question is not applicable on you.</label>
									
									
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
								<label class="fs-6 fw-bold form-label mb-2">Year Level / Academic</label>
												
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">First Year
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fyname" placeholder="Ex: MCC" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">1st Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes"  name="acfradios1"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="acfradios1"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">2nd Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes" name="acsradios1"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="acsradios1"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Second Year
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												
											<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="syname" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">1st Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes" name="acfradios2"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No" name="acfradios2"/>
														<span></span>
														No
													</label>
													
											</div>
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">2nd Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes"  name="acsradios2"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="acsradios2"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Third Year
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="tyname" placeholder="Ex: MCC" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">1st Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes" name="acfradios3"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="acfradios3"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">2nd Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes" name="acsradios3"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No" name="acsradios3"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Fourth Year
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of School</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="fthyname" placeholder="Ex: MCC" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">1st Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes"  name="acfradios4"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="acfradios4"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">2nd Sem</label>
												<!--end::Label-->
												<!--begin::Input-->
												<div class="form-control form-control-lg col-10">
													<label class="radio">
														<input type="radio" value="Yes" name="acsradios4"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No" name="acsradios4"/>
														<span></span>
														No
													</label>
											</div>
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 4-->
						<!--begin::Step 5-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Medical History
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
																	
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Height (cm):</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdheight" placeholder="Ex: 4'5" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Weight (kg):</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdweight" placeholder="Ex: 50kg" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->	
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Visual Acuity:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdvisual" placeholder="Ex: 20/20" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Hearing:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdhearing" placeholder="Ex:" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Do you get sick often:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<br>
												<label class="radio">
														<input type="radio" value="Yes" name="sradios4"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No" name="sradios4"/>
														<span></span>
														No
													</label>
												<!--end::Input-->
											</div>
											<!--end::Col-->	
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Frequency:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdfreq" placeholder="Ex:" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Illness since childhood:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdillness" placeholder="Ex:" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-3">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Disabilities/Impairement:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mddiablities" placeholder="Ex:" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-4">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Accident Experience:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdaccex" placeholder="Ex: Motor Accident" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-4">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Operation Experience:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdopexp" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-4">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Do you have permanent/private doctor:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<br>
												<label class="radio">
														<input type="radio" value="Yes"  name="dradios4"/>
														<span></span>
														Yes
													</label>
													<label class="radio">
														<input type="radio" value="No"  name="dradios4"/>
														<span></span>
														No
													</label>
												<!--end::Input-->
											</div>
											<!--end::Col-->		
											<div class="col-4">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">how often do you visit:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdvisit" placeholder="Ex: twice" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->	
											<div class="col-6">
												<!--begin::Label-->
											<label
													class="required fs-6 fw-bold form-label mb-2">Additional Health Informantion:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="mdaddhi" placeholder="Please Specify" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->	
										</div>
										<!--end::Row-->
										
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 5-->
						<!--begin::Step 6-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Organizational Affiliation
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
									
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of Organization</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaname1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Inclusive Dates</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oadate1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Position</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaposition1" placeholder="" value="" />
												<!--end::Input-->
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaname2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oadate2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaposition2" placeholder="" value="" />
												<!--end::Input-->
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaname3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oadate3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaposition3" placeholder="" value="" />
												<!--end::Input-->
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaname4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oadate4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-4">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="oaposition4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 6-->
						<!--begin::Step 7-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">Pyscological Test Taken
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and leave BLANK if the question is not applicable on you.</label>
									
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Name of Test</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptname1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Label-->
												<label class="required fs-6 fw-bold form-label mb-2">Date</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptdate1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Score</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptscore1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Interpretation</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptinter1" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptname2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptdate2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptscore2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptinter2" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptname3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptdate3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptscore3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptinter3" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptname4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptdate4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptscore4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<div class="col-3">
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="ptinter4" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
								   
								</div>
								<!--end::Input group-->
								
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 7-->
						<!--begin::Step 8-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								<div class="pb-10 pb-lg-15">
									<!--begin::Title-->
									<h3 class="fw-bolder text-dark">PERSONALITY, ATTITUDES, & INTERESTS
									<i class="fas fa-exclamation-circle ms-2 fs-7"
											data-bs-toggle="tooltip"
											title="Please Fill Up All the Required information"></i>
									</h3>
									<label class="required fs-6 fw-bold form-label mb-2">Instructions: Please read and provide authentic data. Answer each question given below and type N/A if the question is not applicable on you.</label>
									
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
									<h3 class="fw-bolder text-dark">Disturbing Problems Presently Encountered
									</h3>
										<!--begin::Row-->
										<div class="row fv-row">
											<div class="col-12">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Identify and select at least 5 most
												disturbing problems that you have presently encounter.</label>
												<!--end::Label-->
												<!--begin::Input-->
												<!-- <input type="text"
													class="form-control form-control-lg form-control-solid"
													name="" placeholder="" value="" /> -->
											
											
												<label class="col-form-label text-right col-lg-3 col-sm-12">Select Here</label>
												<div class=" col-lg-12 col-md-9 col-sm-12">
												<select class="form-control form-control-lg form-control-solid select2" id="kt_select2_9" name="acafail" multiple>
												<option label="Label"></option>
												<optgroup label="Disturbing Problems">
													<option value="Academic Failure">Academic Failure</option>
													<option value="Alcoholism">Alcoholism</option>
													<option value="Boy-Girl Relationship">Boy-Girl Relationship</option>
													<option value="Broken Home">Broken Home</option>
													<option value="Drug Addiction">Drug Addiction</option>
													<option value="Emotional Problem">Emotional Problem</option>
													<option value="Financial Problem">Financial Problem</option>
													<option value="Health Problem">Health Problem</option>
													<option value="Communication">Communication</option>
													<option value="Love Life">Love Life</option>
													<option value="Homosexuality">Homosexuality</option>
													<option value="Inferiority Complex">Inferiority Complex</option>
													<option value="Masturbation">Masturbation</option>
													<option value="Parent-Child Relationship">Parent-Child Relationship</option>
													<option value="Pre-Martial Sex">Pre-Martial Sex</option>
													<option value="Religion/Faith">Religion/Faith</option>
													<option value="Study Habit">Study Habit</option>
													<option value="Depression">Depression</option>
													<option value="Suicide">Suicide</option>
												</optgroup>
												
												</select>
												</div>
												</div>
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<div class="mb-10 fv-row">
									<!--begin::Col-->
									<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-12">
												<!--begin::Label-->
												
													<h4 class="fw-bolder text-dark">What problem would you like to discuss with a councelor? (please check)</h4>
											<div class="form-control form-control-lg col-10">
												<div class="checkbox-list">
													<label class="checkbox">
														<input type="checkbox" value="Job"  name="checkbox1"/>
														<span></span>
														Job
													</label>
													
													<label class="checkbox">
														<input type="checkbox" value="Personal"  name="checkbox1"/>
														<span></span>
														Personal
													</label>
													<label class="checkbox">
														<input type="checkbox" value="Educational"  name="checkbox1"/>
														<span></span>
														Educational
													</label>
													<label class="checkbox">
														<input type="checkbox" value="Financial"  name="checkbox1"/>
														<span></span>
														Financial
													</label> 
													<label class="checkbox">
														<input type="checkbox" value="Relation with other"  name="checkbox1"/>
														<span></span>
														Relation with other
													</label><br>
													<label class="checkbox">
														<input type="checkbox" value="Other"  name="checkbox1" onclick="toggleInputss()"/>
														<span></span>
														Other														
													</label>
													<input type="text"
													class="form-control form-control-lg form-control-solid"
													id="otherInputss"
													name="checkbox1_others"
													placeholder="Please Specify"
													value=""
													style="display:none"/>
												</div>
											</div>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
								   
								</div>
								<div class="col-md-15 fv-row">
										<!--begin::Row-->
										<div class="row fv-row">
										<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Hobbies:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="hobbies" placeholder="Ex: Reading" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Talents/Skills:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="talent" placeholder="Ex: Singing" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Interests:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="interest" placeholder="Ex: Reading" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Sports:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="sport" placeholder="Ex: Dancing" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Most liked subjects:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="msubject" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Least like subjects:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="lsubject" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<div class="col-4">
												<!--begin::Label-->
												<label
													class="required fs-6 fw-bold form-label mb-2">Plans for the future:</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text"
													class="form-control form-control-lg form-control-solid"
													name="plan" placeholder="" value="" />
												<!--end::Input-->
											</div>
											<!--end::Col-->
										</div>
								</div>
							
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 8-->
						<!--begin::Step 9-->
						<div data-kt-stepper-element="content">
							<!--begin::Wrapper-->
							<div class="w-100">
								<!--begin::Heading-->
								
								<!--end::Heading-->
								<!--begin::Body-->
								<div class="mb-0">
									<!--begin::Text-->
									
									<!--end::Text-->
									<!--begin::Alert-->
									<!--begin::Notice-->
									<div
										class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<rect opacity="0.3" x="2" y="2" width="20" height="20"
													rx="10" fill="black" />
												<rect x="11" y="14" width="7" height="2" rx="1"
													transform="rotate(-90 11 14)" fill="black" />
												<rect x="11" y="17" width="2" height="2" rx="1"
													transform="rotate(-90 11 17)" fill="black" />
											</svg>
										</span>
										<div class="pb-8 pb-lg-10">
									<!--begin::Title-->
									<h2 class="fw-bolder text-dark">Your Are Done!</h2>
									<!--end::Title-->
									<!--begin::Notice-->
									<div class="text-muted fw-bold fs-6">If you need more info, please
										<!-- <a href="../index.php"
											class="link-primary fw-bolder">Sign In</a>. -->
									</div>
									<div class="fs-6 text-gray-600 mb-5">Visit our Guidance Office
									or Contact Us.</div>
									<!--end::Notice-->
								</div>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
									<!--end::Alert-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Step 9-->
						
						<!--begin::Actions-->
						<div class="d-flex flex-stack pt-15">
							<!--begin::Wrapper-->
							<div class="mr-2">
								<button type="button" class="btn btn-lg btn-light-primary me-3"
									data-kt-stepper-action="previous">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
									<span class="svg-icon svg-icon-4 me-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
												fill="black" />
											<path
												d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
												fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->Back
								</button>
							</div>
							<!--end::Wrapper-->
							<!--begin::Wrapper-->
							<div>
								<button type="button" class="btn btn-lg btn-primary me-3"
									data-kt-stepper-action="submit">
									<span class="indicator-label">Submit
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
										<span class="svg-icon svg-icon-3 ms-2 me-0">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="18" y="13" width="13" height="2"
													rx="1" transform="rotate(-180 18 13)" fill="black" />
												<path
													d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
													fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="indicator-progress">Please wait...
										<span
											class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<button type="button" class="btn btn-lg btn-primary"
									data-kt-stepper-action="next">Continue
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
									<span class="svg-icon svg-icon-4 ms-1 me-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
												transform="rotate(-180 18 13)" fill="black" />
											<path
												d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
												fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</button>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Stepper-->
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
		<script>var hostUrl = "../assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>

		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/create-account.js"></script>
		<?php

		if (!$_GET['applicant_id']) { ?>
			<script>
			Swal.fire({
				text: "No applicant found.",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-light"
				}
			}).then(function () {
				window.location.href = '../index.php';
			});
		</script>
<?php }

		$checkSql = "SELECT * FROM students WHERE applicant_id = ? AND status_type != 'Accept_form' ";
		$checkStmt = $conn->prepare($checkSql);
		$checkStmt->bind_param("s", $applicant_id);
		$checkStmt->execute();
		$checkResult = $checkStmt->get_result();

		if ($checkResult->fetch_assoc()) { ?>
		<script>
			Swal.fire({
				text: "Sorry, looks like you already fill up this form.",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Ok, got it!",
				customClass: {
					confirmButton: "btn btn-light"
				}
			}).then(function () {
				window.location.href = '../index.php';
			});
		</script>

	<?php
		}


		?>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>