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
								<span class="ttr-icon"><i class="ti-view-grid" style="color: #BE1630;"></i></span>
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
						<li><i class="fa fa-book"></i>My Collaboration Group</li>
					</ul>
				</div>	

				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<div class="row">
									<div class="col-lg-12">
										<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;My Collaboration Group</h4>
									</div>
								</div>
							</div>
							<div class="widget-inner">
								<?php

									if (empty($co_id)) {
								?>
								<div class="new-user-list">
									<center><h3>You are currently not in a collaboration group.</h3><img src="../assets/images/icon.png" style="width: 200px; height: 200px;"><br><br>
										<h5><p>Join Group Collaborations <a href="panel-review" style="color: #be1630;">Click here</a></p></h5>

									</center>
								</div>
								<div style="height: 455px;">
									
								</div>
								<?php
									}

									else {
								?>
								<div class="new-user-list">
									<?php
									$rows = $model->displayCollaborationsDetailsStudents($department_id, $co_id);
									if (!empty($rows)) {
										foreach ($rows as $row) {
											$r_id = $row['id'];
											$c_id = $row['collaboration_id'];
											$title = $row['title'];
											$subject = $row['subject'];
											$group_num = $row['group_num'];
											$subj_coordinator = $row['subj_coordinator'];
											$tech_adv = $row['tech_adv'];
											$client = $row['client'];
											$status = $row['status'];
											$date_added = date('M. d, Y g:i A', strtotime($row['date_added']));
											$code = $row['code'];
											$link = $row['link'];

											if ($link == "") {
												$link = "N/A";
											}
											else {
												$link1 = strtolower($row['link']);
												$link = "<a href='".$link1."' target='_blank'>".$link1."</a>";
											}
										}
									}
									?>
									<div class="row">
										<div class="col-lg-6">
											<h3><?php echo strtoupper($title); ?></h3>
											<span style="text-align: justify;text-justify: inter-word;font-size: 20px;"><b>Code:</b> <?php echo $code; ?></span><hr>
											<span style="text-align: justify;text-justify: inter-word;font-size: 20px;"><b>Group Members</b></span><div style="padding: 7px"></div>
											<div class="table-responsive">
												<table class="table table-bordered hover" style="width:100%">
													<thead>
														<tr>
															<th>Name</th>
															<th width="85">Action</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$collab_status = 1;
													$rows = $model->displayCollaborationsMembers($department_id, $c_id, $collab_status);

													if (!empty($rows)) {
														foreach ($rows as $row) {
															$s_id = $row['id'];
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
														<td><?php echo strtoupper($name); ?></td>
														<td><center>

														<?php if ($r_id == $s_id) { echo "<span style='font-size: 13px;'><b>LEADER</b></span>"; } 

														else {
															if ($r_id == $account_id) { 
																echo "<span style='font-size: 13px;'><b>MEMBER</b></span>";
															}
															else {
																echo "<span style='font-size: 13px;'><b>MEMBER</b></span>";
															}
															
														} ?>
														</center></td>
													</tr>

													<?php
														}
													}

													?>
													</tbody>
												</table>
											</div>
											<hr>
											<span style="text-align: justify;text-justify: inter-word;font-size: 20px;"><b>Panel Members</b></span><div style="padding: 7px"></div>
											<div class="table-responsive">
												<table class="table table-bordered hover" style="width:100%">
													<thead>
														<tr>
															<th>Name</th>
															<th width="105">Gender</th>
														</tr>
													</thead>
													<tbody>
													<?php
													$collab_status = 1;
													$rows = $model->displayCollaborationsPanels($c_id, $collab_status);

													if (!empty($rows)) {
														foreach ($rows as $row) {
															$s_id = $row['id'];
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
														<td><?php echo strtoupper($name); ?></td>
														<td><?php echo strtoupper($gender); ?></td>
													</tr>

													<?php
														}
													}

													?>
													</tbody>
												</table>
											</div>
											<?php if (isset($_POST['remove'])) {
												$collab_id = ""; $co_status = "";
												$model->updateAccountCollaboration($collab_id, $co_status, $account_id);
												echo "<script>window.open('panel-review','_self');</script>";
											} ?>
										</div>
										<div class="col-lg-6">
											<div class="new-user-list">
												<ul>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Section</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($subject); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Group Number</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($group_num); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Subject Coordinator</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($subj_coordinator); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Technical Adviser</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($tech_adv); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Client</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($client); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Link</a>
														</span>
														<span class="new-users-btn">
															<?php echo $link; ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Status</a>
														</span>
														<span class="new-users-btn"><b>
															<?php if ($status == 1) {
																echo "<span style='color:green;'>ACTIVE</span>";
															} else {
																echo "<span style='color:red;'>ARCHIVED</span>";}
															?></b>
														</span>
													</li>
													<form class="edit-profile m-b30" method="POST">
											<?php if ($r_id == $account_id) { ?>
												<center><h4 style='color:green;'>You are the representative of Group Collaboration.</h4><a href="" data-toggle="modal" data-target="#update-link" class="btn blue radius-xl" style="width: 180px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-marker-alt" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;UPDATE LINK</span></a></a></center>

											<?php } else { if ($co_status == 1) { ?>
												<center><h4 style='color:green;'>Your request to join the Collaboration Group is approved.</h4></center>
											<?php } else if ($co_status == 2) { ?>
												<center><h4 style='color:blue;'>Your request to join the Collaboration Group is pending.</h4><button type="submit" class="btn green radius-xl" name="remove" style="width: 200px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-control-shuffle" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;CANCEL REQUEST</span></button></center>
											<?php } else if ($co_status == 3) { ?>
												<center><h4 style='color:red;'>You have been removed to Collaboration Group.</h4>
												<button type="submit" class="btn green radius-xl" name="remove" style="width: 320px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-control-shuffle" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;JOIN NEW COLLABORATION GROUP</span></button></center>

											<?php } else if ($co_status == 4) { ?>
												<center><h4 style='color:red;'>Your request to join the Collaboration Group is rejected.</h4>
												<button type="submit" class="btn green radius-xl" name="remove" style="width: 320px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-control-shuffle" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;JOIN NEW COLLABORATION GROUP</span></button></center>
											<?php }  else { ?>
												<center><h4 style='color:red;'>Your request to join the Collaboration Group is rejected.</h4>
												<button type="submit" class="btn green radius-xl" name="remove" style="width: 320px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-control-shuffle" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;JOIN NEW COLLABORATION GROUP</span></button></center>
											<?php } }?> 
											</form>
												</ul>
											</div>
											<hr>
										</div>
									</div>
								</div>
								<?php
										
									}

								?>
							</div>
						</div>
					</div>
				</div>
			</div>

													<div id="update-link" class="modal fade" role="dialog">
														<form class="edit-profile m-b30" method="POST">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title"><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Update Link</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<div class="modal-body">
																		<div class="row">
																			<div class="form-group col-12">
																				<label class="col-form-label">Link</label>
																				<div>
																					<input class="form-control" type="url" name="link" value="<?php echo $link1; ?>" required>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="submit" name="update_link" class="btn blue outline radius-xl" >Save</button>
																		<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<?php
													if (isset($_POST['update_link'])) {
														$model->updateCollaborationLink($_POST['link'], $c_id, $department_id);
														echo "<script>window.open('my-collaboration-details','_self');</script>";
													}
													?>
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