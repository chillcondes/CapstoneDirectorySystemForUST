<?php

$details_id = isset($_GET['id']) ? $_GET['id'] : '';
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
					<div class="">
						<div class="heading-bx left" align="center">
							<h2><span>You have succesfully registered<br><img src='assets/images/icon.png' style='width: 200px; height: 200px;'><br></span>
							<?php
							if ($details_id == 0) {
								echo "<p>Log in your account <a href='faculty.php' style='color: #be1630;'>Click here</a></p>";
							}
							else {
								echo "<p>Log in your account <a href='index' style='color: #be1630;'>Click here</a></p>";
							}
							?>
						</div>	
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