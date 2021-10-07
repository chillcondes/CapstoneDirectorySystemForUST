<?php
	session_start();
	include('../global/model.php');
	include('department.php');

	if (isset($_POST['save_pass'])) {
		$cpass = $_POST['cpass'];
		$npass = $_POST['npass'];
		$newpword = password_hash($npass, PASSWORD_DEFAULT);
		$model = new Model();
		$model->changePasswordFaculty($account_id, $cpass, $newpword);	
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

		<meta name="description" content="" />

		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta name="format-detection" content="telephone=no">

		<link rel="icon" href="../assets/images/icon.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png" />

		<title>College of Information and Computing Sciences - Capstone Project Directory System for IT Department</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dashboard.css">
		<link class="skin" rel="stylesheet" type="text/css" href="../dashboard/assets/css/color/color-1.css">
	</head>
	<style type="text/css">
			.btn.dropdown-toggle.btn-default:hover {
				color: #000!important;
			}

			.btn.dropdown-toggle.btn-default:focus {
				color: #000!important;
			}

			tbody tr:hover {
				background-color: #d4d4d4;
			}
			.widget-card .icon {
				position: absolute;
				top: auto;
				bottom: -20px;
				right: 5px;
				z-index: 0;
				font-size: 65px;
				color: rgba(0, 0, 0, 0.15);
			}
	</style>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				
				<?php include 'sidebar.php'; ?>

				<nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>
						<li class="show" style="margin-top: 0px;">
							<a href="index.php" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-home" style="color: #BE1630;"></i></span>
								<span class="ttr-label" style="color: #BE1630;">Home</span>
							</a>
						</li>
						<li>
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives"></i></span>
								<span class="ttr-label">Capstone Projects</span>
								<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="registered-projects" class="ttr-material-button"><span class="ttr-label">IP Registered Capstone Projects</span></a>
								</li>
								<li>
									<a href="best-projects" class="ttr-material-button"><span class="ttr-label">Best IT Capstone Projects</span></a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-view-grid"></i></span>
								<span class="ttr-label">Collaboration Group</span>
								<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="panel-review" class="ttr-material-button"><span class="ttr-label">Panel Review</span></a>
								</li>
								<li>
									<a href="archived-panel-review" class="ttr-material-button"><span class="ttr-label">Archieved Groups</span></a>
								</li>
							</ul>
						</li>
						<li class="ttr-seperate"></li>
					</ul>
				</nav>
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
					<div class="db-breadcrumb">
						<h4 class="breadcrumb-title">Dashboard</h4>
						<ul class="db-breadcrumb-list">
							<li><i class="fa fa-key"></i>Change Password</li>
						</ul>
					</div> 
					
					<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Change Password</h4>
							</div>
							<div class="widget-inner">
								<form class="edit-profile" method="POST">
									<div class="">
										<div class="form-group row">
											<div class="col-sm-10 ml-auto">
												<h3>Password</h3>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Current Password</label>
											<div class="col-sm-7">
												<input class="form-control" type="password" name="cpass" minlength="5" maxlength="20" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">New Password</label>
											<div class="col-sm-7">
												<input class="form-control" type="password" name="npass" minlength="5" maxlength="20" id="password" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Re Type Password</label>
											<div class="col-sm-7">
												<input class="form-control" type="password" name="rpass" minlength="5" maxlength="20" id="confirm_password" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-7">
											<label class="col-sm-2 col-form-label" id="message"></label><br>
											<button name="save_pass" type="submit" class="btn" style="background-color: #BE1630;color: white;">Save changes</button>
											<a href="index.php" class="btn-secondry">Cancel</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</main>
		<div class="ttr-overlay"></div>
		<script src="../dashboard/assets/js/jquery.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="../dashboard/assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="../dashboard/assets/vendors/counter/waypoints-min.js"></script>
		<script src="../dashboard/assets/vendors/counter/counterup.min.js"></script>
		<script src="../dashboard/assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="../dashboard/assets/vendors/masonry/masonry.js"></script>
		<script src="../dashboard/assets/vendors/masonry/filter.js"></script>
		<script src="../dashboard/assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src='../dashboard/assets/vendors/scroll/scrollbar.min.js'></script>
		<script src="../dashboard/assets/js/functions.js"></script>
		<script src="../dashboard/assets/vendors/chart/chart.min.js"></script>
		<script src="../dashboard/assets/js/admin.js"></script>
		<script type="text/javascript">
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
		</script>
	</body>

</html>