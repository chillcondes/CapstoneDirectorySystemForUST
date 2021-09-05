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
				button[data-id="year"] {
					width: 180px!important;
				}
			}

			@media screen and (max-width: 1000px) {
				button[data-id="year"] {
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
							<h2 class="title-head">Faculty <span>Registration</span></h2>
							<p>Log in your account <a href="faculty.php">Click here</a></p>
						</div>	
						<form class="contact-bx" id="form-id" method="POST">
							<div class="row placeani">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Department</label>
											<select class="form-control" name="course" id="course" required>
												<option disabled selected>Select Department</option>
												<option value="0">Bachelor of Science in Information Technology</option>
                                                <option value="1">Bachelor of Science in Computer Engineering</option>
												<option value="0">Bachelor of Science in Electronics Engineering</option>
                                                <option value="1">Bachelor of Science in Mechanical Engineering</option>
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
											<label>Course</label>
											<select class="form-control" name="course" id="course" required>
												<option disabled selected>Select Gender</option>
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
											<input class="form-control" name="email" type="email" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Password</label>
											<input class="form-control" name="password" type="password" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Confirm Password</label>
											<input class="form-control" name="password" type="password" minlength="5" maxlength="20" required>
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
									<input name="submit" type="submit" value="Register" class="red-hover btn button-md">
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
		</script>
	</body>
</html>