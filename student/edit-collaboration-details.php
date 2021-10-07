<?php
	session_start();
	include('../global/model.php');
	include('department.php');
	$collab_id = $co_id;
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
						<li>
							<a href="index" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-home"></i></span>
								<span class="ttr-label">Home</span>
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
						<li class="show">
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-view-grid"></i></span>
								<span class="ttr-label" style="color: #BE1630;">Collaboration Group</span>
								<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="panel-review" class="ttr-material-button"><span class="ttr-label">Panel Review</span></a>
								</li>
								<li>
									<a href="submit-final-requirements" class="ttr-material-button"><span class="ttr-label">Submit Final Requirements</span></a>
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
					<h4 class="breadcrumb-title">Collaboration Group</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-view-grid"></i>Create Group Collaboration</li>
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
								<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Create Group Collaboration</h4>
							</div>
							<div class="widget-inner">
								<form class="edit-profile m-b30" method="POST">
									<?php
									$rows = $model->displayCollaborationsDetails($department_id, $collab_id);
									if (!empty($rows)) {
										foreach ($rows as $row) {
											$c_id = $row['collaboration_id'];
											$title = $row['title'];
											$subject = $row['subject'];
											$group_num = $row['group_num'];
											$subj_coordinator = $row['subj_coordinator'];
											$tech_adv = $row['tech_adv'];
											$client = $row['client'];
											$panel1 = $row['panel_1'];
											$panel2 = $row['panel_2'];
											$panel3 = $row['panel_3'];
											$status = $row['status'];
											$link = $row['link'];
											$date_added = date('M. d, Y g:i A', strtotime($row['date_added']));
											$code = $row['code'];
											if ($link == "") {
												$link = "N/A";
											}
											else {
												$link = strtolower($row['link']);
											}
										}
									}
									?>
									<div class="row">
										<div class="form-group col-12">
											<label class="col-form-label">Title of Project:</label>
											<div>
												<input class="form-control" name="title" type="text" value="<?php echo $title; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Subject:</label>
											<div>
												<input class="form-control" name="subject" type="text" value="<?php echo $subject; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Group Number:</label>
											<div>
												<input class="form-control" name="group-number" type="text" value="<?php echo $group_num; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Subject Coordinator:</label>
											<div>
												<input class="form-control" name="subject-coordinator" type="text" value="<?php echo $subj_coordinator; ?>"  required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Technical Adviser:</label>
											<div>
												<input class="form-control" name="technical-adviser" type="text" value="<?php echo $tech_adv; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Panel 1:</label>
											<div>
												<input class="form-control" name="panel-1" type="text" value="<?php echo $panel1; ?>"  required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Panel 2:</label>
											<div>
												<input class="form-control" name="panel-2" type="text" value="<?php echo $panel2; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Panel 3:</label>
											<div>
												<input class="form-control" name="panel-3" type="text" value="<?php echo $panel3; ?>" required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Client:</label>
											<div>
												<input class="form-control" name="client" type="text" value="<?php echo $client; ?>"  required>
											</div>
										</div>
										<div class="form-group col-12">
											<label class="col-form-label">Link:</label>
											<div>
												<input class="form-control" name="link" type="text" value="<?php echo $link; ?>"  required>
											</div>
										</div>
										<div class="col-12" style="padding-top: 20px;">
											<button type="submit" name="submit" class="btn" style="background-color: #BE1630;color: white;">SAVE CHANGES</button>
										</div>
									</div>
								</form>
								<?php

									if (isset($_POST['submit'])) {
										$title = $_POST['title'];
										$subject = $_POST['subject'];
										$grNum = $_POST['group-number'];
										$subjCoor = $_POST['subject-coordinator'];
										$techAdv = $_POST['technical-adviser'];
										$panelOne = $_POST['panel-1'];
										$panelTwo = $_POST['panel-2'];
										$panelThree = $_POST['panel-3'];
										$client = $_POST['client'];

										$model->updateCollaboration($title, $subject, $grNum, $subjCoor, $techAdv, $panelOne, $panelTwo, $panelThree, $client, $collab_id, $department_id);
										echo "<script>;window.open('collaboration-details?id=".$collab_id."','_self');</script>";
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
		</script>
	</body>

</html>