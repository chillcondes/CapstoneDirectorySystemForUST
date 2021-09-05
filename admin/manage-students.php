<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$depart = "1";
	$status = "1";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="robots" content="" />

		<meta name="description" content="Polytechnic University of the Philippines" />

		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta name="format-detection" content="telephone=no">

		<link rel="icon" href="../assets/images/icon.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png" />

		<title>College of Information and Computing Sciences - Capstone Project Directory System for IT Department</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dashboard.css">

		<style type="text/css">
			.btn.dropdown-toggle.btn-default:hover {
				color: #000!important;
			}

			.btn.dropdown-toggle.btn-default:focus {
				color: #000!important;
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
			tbody tr:hover {
				background-color: #d4d4d4;
			}
		</style>
		<link class="skin" rel="stylesheet" type="text/css" href="../dashboard/assets/css/color/color-1.css">
	</head>
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
						<li class="show">
							<a href="manage-students" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-user" style="color: #BE1630;"></i></span>
								<span class="ttr-label" style="color: #BE1630;">Manage Students</span>
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
									<a href="pending-projects" class="ttr-material-button"><span class="ttr-label">Pending Capstone Projects</span></a>
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
		<main class="ttr-wrapper">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Student Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-user"></i>Active Students</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<div class="row">
									<div class="col-lg-6">
										<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Student Accounts</h4>
									</div>
									<div class="col-lg-6">
										<!-- <a href="pending-students.php?year=<?php echo $_GET['year']?>" class="btn yellow radius-xl" style="float: right;"><i class="ti-user"></i><span>&nbsp;&nbsp;PENDING STUDENTS (<?php echo $students_pending; ?>)</span></a> -->
									</div>
								</div>
							</div>
							<div class="widget-inner">
								<div align="right">
									<a href="pending-students.php?year=<?php echo $_GET['year']?>" class="btn yellow radius-xl" style="float: right;"><i class="ti-bookmark"></i><span>&nbsp;ARCHIVED STUDENTS</span></a><br>
								</div>
								<div style="padding: 25px;"></div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="190">Action</th>
												<th>Name</th>
												<th>Email</th>
												<th>Contact</th>
												<th>Gender</th>
												<th>Date Registered</th>
											</tr>
										</thead>
										<tbody>
											<?php

											
											$rows = $model->displayStudents();

											if (!empty($rows)) {
												foreach ($rows as $row) {
													$uid = $row['id'];
													$si = $row['stud_id'];
													$fn = $row['fname'];
													$mn = $row['mname'];
													$ln = $row['lname'];
													$yr = $row['year'];
													$sc = $row['section'];
													$em = $row['email'];
													$cn = $row['contact'];
													$g = $row['gender'];
													$bd = date('M. d, Y', strtotime($row['birth_date']));
													$bdt = date('Y', strtotime($row['birth_date']));
													$dttt = date("Y");
													$age = $dttt - $bdt;

													switch ($g) {
														case 0:
															$g = 'Male';
														break;
														case 1:
															$g = 'Female';
														break;
													}
											?>
											<tr>
												<td>
													<a href="" class="btn blue" style="width: 95px; height: 37px;"><i class="ti-marker-alt" style="font-size: 12px;"></i><span>&nbsp;Profile</span></a>&nbsp;
													<button type="button" class="btn red" style="width: 95px; height: 37px;" data-toggle="modal" data-target="#archive-<?php echo $si; ?>"><i class="ti-archive" style="font-size: 12px;"></i><span>&nbsp;Archive</span></button>
												</td>
												<td><?php echo $fn." ".$mn." ".$ln; ?></td>
												<td>sample_account@ust.edu.ph</td>
												<td>09123456789</td>
												<td><?php echo $g; ?></td>
												<td style="font-size: 14px;">Sep. 05, 2021 12:18 PM</td>
											</tr>
											<div id="archive-<?php echo $si; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Archive Student</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="form-group col-6">
																		<label class="col-form-label">Student ID</label>
																		<div>
																			<input type="hidden" name="user_id" value="<?php echo $uid; ?>">
																			<input class="form-control" type="text" name="student_id" value="<?php echo $si; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Course</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $dpt; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">First Name</label>
																		<div>
																			<input class="form-control" type="text" name="first_name" value="<?php echo $fn; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Middle Name</label>
																		<div>
																			<input class="form-control" type="text" name="middle_name" value="<?php echo $mn; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Last Name</label>
																		<div>
																			<input class="form-control" type="text" name="last_name" value="<?php echo $ln; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Year</label>
																		<div>
																			<input class="form-control" type="text" name="year" <?php 
																				switch ($yr) {
																				case 1:
																					echo 'value="First Year"';
																					break;
																				case 2:
																					echo 'value="Second Year"';
																					break;
																				case 3:
																					echo 'value="Third Year"';
																					break;
																				case 3:
																					echo 'value="Fourth Year"';
																					break;
																				default:
																					echo 'value="Fifth Year"';
																					break;
																				}
																			?> disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Section</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $sc; ?>" disabled> 
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Gender</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $g; ?>" disabled> 
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Date of Birth</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $bd; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Age</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $age; ?>" disabled> 
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Email</label>
																		<div>
																			<input class="form-control" type="email" name="email" value="<?php echo $em; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Contact</label>
																		<div>
																			<input class="form-control" type="text" name="contact" value="<?php echo $cn; ?>" disabled>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="archive" value="Archive">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

												}
											}


												if (isset($_POST['archive'])) {
													$uuid = $_POST['user_id'];

													$model->archive($uuid, $_GET['year']);
												}

											?>
										</tbody>
									</table>
								</div>
								<br>
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
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});
		</script>
	</body>

</html>