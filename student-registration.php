<?php

	session_start();
	include('global/model.php');

	$model = new Model();

	if (isset($_POST['submit'])) {
		$fname = ucwords(strtolower($_POST['first_name']));
		$mname = ucwords($_POST['middle_name']);
		$lname = ucwords(strtolower($_POST['last_name']));
		$gender = $_POST['gender'];
		$cont = $_POST['contact']; 
		$course = $_POST['course'];
		$email = strtolower($_POST['email']);
		$status = 1;
		$access = 1;
		$date = date("Y-m-d H:i:s");
		$pword = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$model->addAccount($fname, $mname, $lname, $email, $cont, $gender, $pword, $access, $status, $date, $course);
		echo "<script>window.open('success?id=1.php','_self');</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="robots" content="" />

		<meta name="description" content="College of Information and Computing Sciences - Capstone Project Directory System for IT Department" />

		<meta property="og:title" content="College of Information and Computing Sciences - Capstone Project Directory System for IT Department" />
		<meta property="og:description" content="College of Information and Computing Sciences - Capstone Project Directory System for IT Department" />
		<meta property="og:image" content="assets/images/cover.png" />
		<meta name="format-detection" content="telephone=no">
		
		<link rel="icon" href="assets/images/icon.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon.png" />

		<title>College of Information and Computing Sciences - Capstone Project Directory System for IT Department</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
		<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
		<style type="text/css">
			.red-hover:hover {
				background-color: #8d0e2b!important;
			}

			@media screen and (max-width: 1920px) {
				button[data-id="course"] {
					width: 400px!important;
				}
			}

			@media screen and (max-width: 1000px) {
				button[data-id="course"] {
					width: 360px!important;
				}
			}

			@media screen and (max-width: 1920px) {
				button[data-id="gender"] {
					width: 400px!important;
				}
			}

			@media screen and (max-width: 1000px) {
				button[data-id="gender"] {
					width: 360px!important;
				}
			}

			.btn-group.bootstrap-select.input-group-btn.form-control {
				padding-top: 0px!important;
				padding-bottom: 0px!important;
			}

			.btn.dropdown-toggle.btn-default {
				border-width: 0px 0px 1px 0px!important;
				border-color: #ccc!important;
				padding-left: 0px!important;
				color: #606060!important;
			}

			.btn.dropdown-toggle.btn-default:hover {
				color: #606060!important;
			}

			.btn.dropdown-toggle.btn-default:focus {
				color: #606060!important;
			}

			tbody tr:hover {
				background-color: #d4d4d4;
			}
		</style>
	</head>
	<body id="bg">
		<div class="page-wraper">
			<div id="loading-icon-bx"></div>
			<div class="account-form">
				<div class="account-head" style="background-image:url(assets/images/bg2.png);"></div>
				<div class="account-form-inner">
					<div class="account-container">
						<div class="heading-bx left">
							<h2 class="title-head">Student <span>Registration</span></h2>
							<p>Log in your account <a href="index">Click here</a></p>
						</div>	
						<form class="contact-bx" id="form-id" method="POST">
							<div class="row placeani">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Course</label>
											<select class="form-control" name="course" id="course" required>
												<option value="" disabled selected>Select Course</option>
												<?php
													$rows = $model->fetchCourses();

													if (!empty($rows)) {
														foreach ($rows as $row) {
															$dep_id = $row['id'];
															$course = $row['department'];

															echo '<option value="'.$dep_id.'">'.$course.'</option>';
														}
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>First Name</label>
											<input name="first_name" class="form-control" type="text" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="30" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>Middle Name</label>
											<input class="form-control" name="middle_name" type="text" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="30" required>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<label>Last Name</label>
											<input class="form-control" name="last_name" type="text" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="30" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Gender</label>
											<select class="form-control" name="gender" id="gender" required>
												<option value="" disabled selected>Select Gender</option>
												<option value="0">Male</option>
												<option value="1">Female</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group"> 
											<label>Contact</label>
											<input class="form-control" name="contact" type="text" pattern="[0-9-]+" onkeypress="return isNumber(event)" minlength="10" maxlength="12" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Email</label>
											<input class="form-control" name="email" id="email" type="email" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Password</label>
											<input class="form-control" name="password" type="password" id="password" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Confirm Password</label>
											<input class="form-control" name="password" type="password" id="confirm_password" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group form-forget">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="affirm_rights" required>
											<label class="custom-control-label" for="affirm_rights" style="font-size: 13px;text-align: justify;">I hereby affirm my right to be informed, object to processing, access and rectify, suspend, or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.</label>
										</div>
									</div>
								</div>
								<div class="col-lg-12 m-b30">
									<input name="submit" type="submit" value="Register" class="red-hover btn button-md" onclick="return validateSelect()">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendors/counter/waypoints-min.js"></script>
		<script src="assets/vendors/counter/counterup.min.js"></script>
		<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="assets/vendors/masonry/masonry.js"></script>
		<script src="assets/vendors/masonry/filter.js"></script>
		<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src="assets/js/functions.js"></script>
		<script src="assets/js/contact.js"></script>
		<script type="text/javascript">
			function blockSpecialChar(evt) { 
				var charCode = (evt.which) ? evt.which : window.event.keyCode; 
				if (charCode <= 13) { 
					return true; 
				} 
				
				else { 
					var keyChar = String.fromCharCode(charCode); 
					var re = /^[A-Za-z.Ññ ]+$/ 
					return re.test(keyChar); 
				} 
			}

			function isNumber(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}

			var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

			function validatePassword() {
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("Passwords Don't Match");
				} 

				else {
					confirm_password.setCustomValidity('');
				}
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
			var accept = [".iics@ust.edu.ph", ".cics@ust.edu.ph"];

			function validateEmailField() {
				var email = document.getElementById("email");
				var emailVal = $('#email').val();
				var split = emailVal.split('@');

				var last = emailVal.slice(-16);

				if(accept.indexOf(last) >= 0) {
					email.setCustomValidity('');
				}

				else {
					email.setCustomValidity("Please use an '.iics@ust.edu.ph' or '.cics@ust.edu.ph' email address.");
				}

				// if(accept.indexOf(split[1]) >= 0) {
				// 	email.setCustomValidity('');
				// }

				// else{
				// 	email.setCustomValidity("Please use an @ust.edu.ph email address.");
				// }

			}

			email.onchange = validateEmailField;
			email.onkeyup = validateEmailField;

			$("#course").change(function() {
				$('[data-id="course"]').find('.filter-option').css("color", "#606060");
			});

			$("#gender").change(function() {
				$('[data-id="gender"]').find('.filter-option').css("color", "#606060");
			});

			var course = document.getElementById("course");
			var gender = document.getElementById("gender");

			function validateSelect() {

				if (course.value == "") {
					$('[data-id="course"]').find('.filter-option').css("color", "red");

					if (gender.value == "") {
						$('[data-id="gender"]').find('.filter-option').css("color", "red");
					}
					return false;
				}

				else if (gender.value == "") {
					$('[data-id="gender"]').find('.filter-option').css("color", "red");
					return false;
				}

				return true;
			}
		</script>
	</body>
</html>