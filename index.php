<?php

	session_start();
	include('global/model.php');

	if (isset($_SESSION['student_sess'])) {
		echo "<script>window.open('student/index.php','_self');</script>";
	}

	if (isset($_POST['submit'])) {
		if (!isset($_COOKIE['rrlimited'])) {
			$uname = $_POST['email'];
			$pword = $_POST['password'];

			$model = new Model();
			$access = 1;
			$model->signInAccount($uname, $pword, $access);	
		}

		else {
			echo "<script>alert('Too many attempts. Please try again later.')</script>";
		}
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
				background-color: #8d0e2b!important
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
							<h2 class="title-head">Student <span>Access</span></h2>
							<p>Don't have an account? <a href="student-registration">Register here</a></p>
						</div>	
						<form class="contact-bx" method="POST">
							<div class="row placeani">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group">
											<label>Your Email</label>
											<input name="email" type="email" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="input-group"> 
											<label>Your Password</label>
											<input name="password" type="password" class="form-control" minlength="5" maxlength="20" required>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group form-forget">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
											<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
										</div>
										<a href="" class="ml-auto">Forgot your password?</a>
									</div>
								</div>
								<div class="col-lg-12 m-b30">
									<?php
										if (isset($_COOKIE['rrlimited'])) {
											echo '<button name="submit" type="submit" value="Submit" class="red-hover btn button-md" disabled>Login</button>';
										}

										else {
											echo '<button name="submit" type="submit" value="Submit" class="red-hover btn button-md">Login</button>';
										}
									?>
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
	</body>
</html>
