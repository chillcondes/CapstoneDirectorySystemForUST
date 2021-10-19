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
						<li><i class="ti-agenda"></i>Add Capstone Projects</li>
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
								<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Add Capstone Projects</h4>
							</div>
							<div class="widget-inner">
								<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="form-group col-6">
											<label class="col-form-label">IP Registration #: <span style="color: red;">*</span></label>
											<input class="form-control" name="reg-1" type="text" required>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Specialization</label>
											<div>
												<select class="form-control" name="specialization" id="specialization" required>
													<?php
														$ca = $model->displaySpecialization($_SESSION['sess']);
														if (!empty($ca)) {
															foreach ($ca as $c) {
																
													?>
													<option value="<?php echo $c['id']; ?>"><?php echo $c['category']; ?></option>
													<?php
															}
														}

													?>
												</select>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Capstone Title: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="title" type="text" minlength="5" maxlength="100" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Author/s: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="author" type="text" minlength="5" maxlength="150" required>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Year Published:</label>
											<div>
												<input class="form-control" name="year" type="text" minlength="2" maxlength="4"  required>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Technical Adviser: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="adviser" type="text" minlength="5" maxlength="50"  required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Full Document: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="full-doc" style="padding: 0px; border-width: 0px;" accept="application/pdf" type="file" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Conference Paper: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="con-paper" style="padding: 0px; border-width: 0px;" accept="application/pdf" type="file" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">AVP: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="avp" style="padding: 0px; border-width: 0px;" accept="video/mp4" type="file" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Source Code: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="source-code" style="padding: 0px; border-width: 0px;" accept=".zip" type="file" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Approval Form: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="approval-form" style="padding: 0px; border-width: 0px;" accept="application/pdf" type="file" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Keywords: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="keywords" type="text" minlength="2" maxlength="100"  required>
											</div>
										</div>
										<div class="col-12" style="padding-top: 20px;">
											<button type="submit" class="btn" name="submit" style="float: left;background-color: #BE1630;color: white;">Add Capstone Project</button>
										</div>
									</div>
								</form>
								<?php

									if (isset($_POST['submit'])) {
										$firstPath = '../directory/full-document/';
										$secondPath = '../directory/conference-paper/';
										$thirdPath = '../directory/avp/';
										$fourthPath = '../directory/source-code/';
										$fifthPath = '../directory/approval-form/';

										$firstUnique = time().uniqid(rand());
										$firstDest = $firstPath . $firstUnique . '.pdf';
										$firstBase = basename($_FILES["full-doc"]["name"]);
										$firstType = strtolower(pathinfo($firstPath . $firstBase, PATHINFO_EXTENSION));

										$secondUnique = time().uniqid(rand());
										$secondDest = $secondPath . $secondUnique . '.pdf';
										$secondBase = basename($_FILES["con-paper"]["name"]);
										$secondType = strtolower(pathinfo($secondPath . $secondBase, PATHINFO_EXTENSION));
										
										$thirdUnique = time().uniqid(rand());
										$thirdDest = $thirdPath . $thirdUnique . '.mp4';
										$thirdBase = basename($_FILES["avp"]["name"]);
										$thirdType = strtolower(pathinfo($thirdPath . $thirdBase, PATHINFO_EXTENSION));
										
										$fourthUnique = time().uniqid(rand());
										$fourthDest = $fourthPath . $fourthUnique . '.zip';
										$fourthBase = basename($_FILES["source-code"]["name"]);
										$fourthType = strtolower(pathinfo($fourthPath . $fourthBase, PATHINFO_EXTENSION));

										$fifthUnique = time().uniqid(rand());
										$fifthDest = $fifthPath . $fifthUnique . '.pdf';
										$fifthBase = basename($_FILES["approval-form"]["name"]);
										$fifthType = strtolower(pathinfo($fifthPath . $fifthBase, PATHINFO_EXTENSION));

										if($firstType != "pdf" && $secondType != "pdf" && $fifthType != "pdf") {
											echo "<script>alert('Only PDF files are allowed.');window.open('submit-title.php', '_self')</script>";
										}

										else {
											$first = $_FILES["full-doc"]["tmp_name"];
											$second = $_FILES["con-paper"]["tmp_name"];
											$third = $_FILES["avp"]["tmp_name"];
											$fourth = $_FILES["source-code"]["tmp_name"];
											$fifth = $_FILES["approval-form"]["tmp_name"];

											move_uploaded_file($first, $firstDest);
											move_uploaded_file($second, $secondDest);
											move_uploaded_file($third, $thirdDest);
											move_uploaded_file($fourth, $fourthDest);
											move_uploaded_file($fifth, $fifthDest);

											$ipReg = $_POST['reg-1'];
											$specialization = $_POST['specialization'];
											$title = $_POST['title'];
											$author = $_POST['author'];
											$year = $_POST['year'];
											$adviser = $_POST['adviser'];
											$keywords = $_POST['keywords'];

											$model->addCapstoneProject($ipReg, $specialization, $title, $author, $year, $adviser, $firstBase, $firstUnique, $secondBase, $secondUnique, $thirdBase, $thirdUnique, $fourthBase, $fourthUnique, $fifthBase, $fifthUnique, $keywords, 1, $department_id);
											echo "<script>;window.open('registered-projects','_self');</script>";

										}
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