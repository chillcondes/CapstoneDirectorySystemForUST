<?php
	session_start();
	include('../global/model.php');
	include('department.php');
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
						<li style="margin-top: 0px;">
							<a href="index" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-home"></i></span>
								<span class="ttr-label">Home</span>
							</a>
						</li>
						<li>
							<a href="manage-faculty" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-agenda"></i></span>
								<span class="ttr-label">Manage Faculty</span>
							</a>
						</li>
						<li>
							<a href="manage-students" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-user"></i></span>
								<span class="ttr-label">Manage Students</span>
							</a>
						</li>
						<li class="show">
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives" style="color: #BE1630;"></i></span>
								<span class="ttr-label" style="color: #BE1630;">Capstone Projects</span>
								<span class="ttr-arrow-icon" style="color: #BE1630;"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="registered-projects" class="ttr-material-button"><span class="ttr-label">IP Registered Capstone Projects</span></a>
								</li>
								<li>
									<a href="pending-projects" class="ttr-material-button"><span class="ttr-label">Pending Capstone Projects (<?php echo $pending_proj; ?>)</span></a>
								</li>
								<li>
									<a href="best-projects" class="ttr-material-button"><span class="ttr-label">Best IT Capstone Projects</span></a>
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
					<h4 class="breadcrumb-title">Capstone Projects Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-harddrives"></i>Edit Capstone Projects</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<style type="text/css">
				.chart {
					width: 100%; 
					min-height: 500px;
				}
				.rowy {
					margin:0 !important;
				}
				</style>	
				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Edit Capstone Projects</h4>
							</div>
							<div class="widget-inner">
								<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
									<?php

										$proj_status = 1;
										$rows = $model->displayProject($department_id, $proj_status, $_GET['id']);
										$spec_name = isset($_GET['spec']) ? $_GET['spec'] : '';

										if (!empty($rows)) {
											foreach ($rows as $row) {
												$proj_id = $row['project_id'];
												$ipReg = $row['ip_reg'];
												$title = $row['title'];
												$spec = $row['spec_id'];
												$authors = $row['author'];
												$year = $row['year'];
												$category = $row['category'];
												$adviser = $row['tech_adv'];
												$keywords = $row['keywords'];
												$date_added = date('M d, Y g:i A', strtotime($row['date_added']));
											}
										}
									?>
									<div class="row">
										<div class="form-group col-6">
											<label class="col-form-label">IP Registration #: <span style="color: red;">*</span></label>
											<div class="row">
												<div class="form-group col-12">
													<input class="form-control" name="ipReg" type="text" value="<?php echo $ipReg; ?>" minlength="5" maxlength="40" required>
												</div>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Specialization</label>
											<div>
												<select class="form-control" name="specialization" id="specialization" required>
													<option value="<?php echo $spec; ?>"><?php echo $spec_name; ?></option>
													<?php
														$ca = $model->displaySpecialization($_SESSION['sess']);
														if (!empty($ca)) {
															foreach ($ca as $c) {
															
															if ($spec == $c['id']) {
																echo "";
															}
															else {
													?>
													<option value="<?php echo $c['id']; ?>"><?php echo $c['category']; ?></option>
													<?php

															}
															}
														}

													?>
												</select>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Capstone Title: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="title" type="text" minlength="5" maxlength="200" value="<?php echo $title; ?>" minlength="5" maxlength="120" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Author/s: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="author" type="text" minlength="5" maxlength="200" value="<?php echo $authors; ?>" minlength="5" maxlength="150"  required>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Year Published:</label>
											<div>
												<input class="form-control" name="year" type="text" minlength="4" maxlength="4"  value="<?php echo $year; ?>" required minlength="2" maxlength="4" >
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Technical Adviser: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="adviser" type="text" minlength="5" maxlength="100" value="<?php echo $adviser; ?>" minlength="5" maxlength="50"  required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Keywords: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="keywords" type="text" minlength="5" maxlength="200" value="<?php echo $keywords; ?>" minlength="2" maxlength="100" required>
											</div>
										</div>
										<div class="col-12" style="padding-top: 20px;">
											<button type="submit" class="btn" name="submit" style="float: left;background-color: #BE1630;color: white;">Update Capstone Project</button>
										</div>
									</div>
								</form>
								<?php

									if (isset($_POST['submit'])) {
										$ipReg = $_POST['ipReg'];
										$specialization = $_POST['specialization'];
										$title = $_POST['title'];
										$author = $_POST['author'];
										$year = $_POST['year'];
										$adviser = $_POST['adviser'];
										$keywords = $_POST['keywords'];
										
										$model->updateProject($ipReg, $specialization, $title, $author, $year, $adviser, $keywords, $proj_id);
										echo "<script>window.open('project-details?id=".$proj_id."','_self');</script>";
									}

								?>
							</div>
						</div>
					</div>
				</div>
			</div>
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
		<script src='../dashboard/assets/vendors/calendar/moment.min.js'></script>	
		<script type="text/javascript">
			function blockSpecialChar(evt) { 
				var charCode = (evt.which) ? evt.which : window.event.keyCode; 
				if (charCode <= 13) { 
					return true; 
				} 
				
				else { 
					var keyChar = String.fromCharCode(charCode); 
					var re = /^[A-Za-z. ]+$/ 
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