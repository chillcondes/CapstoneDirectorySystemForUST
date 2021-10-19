<?php
	session_start();
	include('../global/model.php');
	include('department.php');
	$proj_id = isset($_GET['id']) ? $_GET['id'] : '';
	$spec = isset($_GET['spec']) ? $_GET['spec'] : '';
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
						<li class="show">
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives" style="color: #BE1630;"></i></span>
								<span class="ttr-label" style="color: #BE1630;">Capstone Projects</span>
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
					<h4 class="breadcrumb-title">Capstone Projects</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="fa fa-book"></i>Capstone Projects Details</li>
					</ul>
				</div>	

				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="widget-box">
							<div class="wc-title">
								<div class="row">
									<div class="col-lg-12">
										<h4><img src="../assets/images/icon.png" style="width: 30px; height: 30px;">&nbsp;Capstone Projects Details</h4>
									</div>
								</div>
							</div>
							<div class="widget-inner">
								<div class="new-user-list">
									<?php
									$project = $model->displayProjectDetails($department_id, $proj_id);
									if (!empty($project)) {
										foreach ($project as $proj) {
											$ptitle = $proj['title'];
											$pipreg = $proj['ip_reg'];
											$pspecid = $proj['spec_id'];
											$pauthor = $proj['author'];
											$pyear = $proj['year'];
											$ptechadv = $proj['tech_adv'];
											$pdoc = $proj['document'];
											$pdocid = $proj['document_id'];
											$pcon = $proj['conference'];
											$pconid = $proj['conference_id'];
											$pavp = $proj['avp'];
											$pavpid = $proj['avp_id'];
											$pcode = $proj['code'];
											$pcodeid = $proj['code_id'];
											$papp = $proj['approval'];
											$pappid = $proj['approval_id'];
											$pstatus = $proj['status'];
											$paward = $proj['award'];
											$pkeywords = $proj['keywords'];
										}
									}
									?>
									<div class="row">
										<div class="col-lg-6">
											<h3><?php echo strtoupper($ptitle); ?></h3>
											<span style="text-align: justify;text-justify: inter-word;font-size: 20px;"><b>Authors:</b></span>
											<p style="text-align: justify;text-justify: inter-word;font-size: 22px;"><?php echo strtoupper($pauthor); ?></p>
											<div class="new-user-list">
												<ul>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">IP Registration #</a>
														</span>
														<span class="new-users-btn">
															<?php echo $pipreg; ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Specialization</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($spec); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Technical Adviser</a>
														</span>
														<span class="new-users-btn">
															<?php echo strtoupper($ptechadv); ?>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Year Published</a>
														</span>
														<span class="new-users-btn">
															<?php echo $pyear; ?>
														</span>
													</li>
												</ul>
												<hr>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="new-user-list">
												<ul>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Conference Paper</a>
														</span>
														<span class="new-users-btn">
															<a href="file.php?code=<?php echo $pconid; ?>&type=conference-paper&title=<?php echo $ptitle; ?>" target="_blank"><u><?php echo $pcon; ?></u></a>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">AVP</a>
														</span>
														<span class="new-users-btn">
															<a href="video-file.php?code=<?php echo $pavpid; ?>&type=avp&title=<?php echo $ptitle; ?>" target="_blank"><u><?php echo $pavp; ?></u></a>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Approval Form</a>
														</span>
														<span class="new-users-btn">
															<a href="file.php?code=<?php echo $pappid; ?>&type=approval-form&title=<?php echo $ptitle; ?>" target="_blank"><u><?php echo $papp; ?></u></a>
														</span>
													</li>
													<li>
														<span class="new-users-text">
															<a href="#" class="new-users-name">Keywords</a>
														</span>
														<span class="new-users-btn">
															<?php echo $pkeywords; ?>
														</span>
													</li>
													<?php if ($paward == 1) { ?>
													<li>
														<span class="new-users-text">
															
														</span>
														<span class="new-users-btn">
															<h5 style="color: green;float: right!important;">LISTED AS ONE OF BEST CAPSTONE PROJECTS</h5>
														</span>
													</li>
													<?php } elseif ($paward == 0) { } else { } ?>
												</ul>
											</div>
											<hr>
										</div>
									</div>
								</div>
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