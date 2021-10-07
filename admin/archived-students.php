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
					<h4 class="breadcrumb-title">Students Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-agenda"></i>Archived Student Accounts</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<div class="row">
									<div class="col-lg-6">
										<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Archived Student Accounts</h4>
									</div>
									<div class="col-lg-6">
									</div>
								</div>
							</div>
							<div class="widget-inner">
								<div align="right">
									<a href="manage-students" class="btn red radius-xl" style="float: right;background-color: #BE1630;"><i class="ti-user"></i><span>&nbsp;ACTIVE STUDENT ACCOUNTS (<?php echo $students; ?>)</span></a><br>
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
											$access = 1;
											$status = 0;
											$rows = $model->displayAccounts($department_id, $access, $status);

											if (!empty($rows)) {
												foreach ($rows as $row) {
													$uid = $row['id'];
													$fname = strtoupper($row['fname']);
													$mname = strtoupper($row['mname']);
													$lname = strtoupper($row['lname']);
													$email = strtolower($row['email']);
													$contact = $row['contact'];
													$gender = $row['gender'];
													$date_added = date('M d, Y g:i A', strtotime($row['date_added']));

													switch ($gender) {
														case 0:
															$gender = 'MALE';
														break;
														case 1:
															$gender = 'FEMALE';
														break;
													}
											?>
											<tr>
												<td>
													<a href="" class="btn blue" style="width: 95px; height: 37px;"><i class="ti-marker-alt" style="font-size: 12px;"></i><span>&nbsp;Profile</span></a>&nbsp;
													<button type="button" class="btn green" style="width: 102px; height: 37px;" data-toggle="modal" data-target="#restore-<?php echo $uid; ?>"><i class="ti-back-left" style="font-size: 12px;"></i><span>&nbsp;Restore</span></button>
												</td>
												<td><?php echo $fname." ".$mname." ".$lname; ?></td>
												<td><?php echo $email; ?></td>
												<td><?php echo $contact; ?></td>
												<td><?php echo $gender; ?></td>
												<td style="font-size: 14px;"><?php echo $date_added; ?></td>
											</tr>
											<div id="restore-<?php echo $uid; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Restore Student Account</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="form-group col-4">
																		<label class="col-form-label">First Name</label>
																		<div>
																			<input type="hidden" name="user_id" value="<?php echo $uid; ?>">
																			<input class="form-control" type="text" name="first_name" value="<?php echo $fname; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Middle Name</label>
																		<div>
																			<input class="form-control" type="text" name="middle_name" value="<?php echo $mname; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Last Name</label>
																		<div>
																			<input class="form-control" type="text" name="last_name" value="<?php echo $lname; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-8">
																		<label class="col-form-label">Course</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $dpt; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Gender</label>
																		<div>
																			<input class="form-control" type="text" value="<?php echo $gender; ?>" disabled> 
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Email</label>
																		<div>
																			<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Contact</label>
																		<div>
																			<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Date Registered</label>
																		<div>
																			<input class="form-control" type="text" name="contact" value="<?php echo $date_added; ?>" disabled>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn green radius-xl outline" name="restore" value="Restore">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

												}
											}


												if (isset($_POST['restore'])) {
													$aid = $_POST['user_id'];

													$model->restoreAccount($aid, $access, $status, $department_id);
													echo "<script>window.open('archived-students','_self');</script>";
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