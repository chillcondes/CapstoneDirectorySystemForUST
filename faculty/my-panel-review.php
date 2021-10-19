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
									<a href="panel-review" class="ttr-material-button"><span class="ttr-label" style="color: #BE1630;">Panel Review</span></a>
								</li>
								<li>
									<a href="archived-panel-review" class="ttr-material-button"><span class="ttr-label">Archived Groups</span></a>
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
						<li><i class="ti-view-grid"></i>My Panel Review</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<div class="row">
									<div class="col-lg-6">
										<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;My Panel Review</h4>
									</div>
									<div class="col-lg-6">
									</div>
								</div>
							</div>
							<div class="widget-inner">
								<div align="right">
									<a href="add-collaboration" class="btn green radius-xl" style="float: right;background-color: #BE1630;"><i class="ti-view-grid"></i><span>&nbsp;CREATE GROUP COLLABORATION</span></a><br>
								</div>
								<div style="padding: 25px;"></div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="175">Action</th>
												<th>Title</th>
												<th width="120">Section</th>
												<th width="145">Tech. Adviser</th>
												<th width="145">Representative</th>
												<th width="125">Date Added</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$collab_status = 1;
											$rows = $model->displayCollaborations($department_id, $account_id, $collab_status);

											if (!empty($rows)) {
												foreach ($rows as $row) {
													$s_id = $row['id'];
													$collaboration_id = $row['collaboration_id'];
													$title = $row['title'];
													$subject = $row['subject'];
													$group_num = $row['group_num'];
													$subj_coordinator = $row['subj_coordinator'];
													$tech_adv = $row['tech_adv'];
													$client = $row['client'];
													$date_added = date('M. d, Y g:i A', strtotime($row['date_added']));
													$name = $row['fname'] ." ". $row['lname'];
													$fname = strtoupper($row['fname']);
													$mname = strtoupper($row['mname']);
													$lname = strtoupper($row['lname']);
													$email = strtolower($row['email']);
													$contact = $row['contact'];
													$gender = $row['gender'];
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
													<a href="my-collaboration-details?id=<?php echo $collaboration_id; ?>" class="btn blue" style="width: 85px; height: 37px;"><i class="ti-search" style="font-size: 12px;"></i><span>&nbsp;View</span></a>&nbsp;
													<a href="" data-toggle="modal" data-target="#archive-<?php echo $s_id; ?>" class="btn red" style="width: 95px; height: 37px;"><i class="ti-archive" style="font-size: 12px;"></i><span>&nbsp;Archive</span></a>
												</td>
												<td><?php echo strtoupper($title); ?></td>
												<td><?php echo strtoupper($subject); ?></td>
												<td><?php echo strtoupper($tech_adv); ?></td>
												<td><?php echo strtoupper($name); ?></td>
												<td style="font-size: 13px;"><?php echo $date_added; ?></td>
											</tr>
											<div id="student-<?php echo $s_id; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Student Profile</h4>
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
																	<div class="form-group col-6">
																		<label class="col-form-label">Email</label>
																		<div>
																			<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Contact</label>
																		<div>
																			<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>" disabled>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div id="archive-<?php echo $s_id; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Archive Student</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="form-group col-4">
																		<label class="col-form-label">First Name</label>
																		<div>
																			<input type="hidden" name="collab_id" value="<?php echo $collaboration_id; ?>">
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
																	<div class="form-group col-6">
																		<label class="col-form-label">Email</label>
																		<div>
																			<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" disabled>
																		</div>
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Contact</label>
																		<div>
																			<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>" disabled>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="submit" name="archive" class="btn red outline radius-xl" >Archive</button>
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													if (isset($_POST['archive'])) {
														$model->collaborationArchiveRestore(0, $_POST['collab_id'], $department_id);

														echo "<script>window.open('panel-review','_self');</script>";
													}

												}
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