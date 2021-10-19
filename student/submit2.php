									<?php
									$project = $model->displayProjectDetails($department_id, $submit_req_status);
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
											$spec = $proj['category'];
											$pstatus = $proj['status'];
										}
									}
									?>
									<div class="col-lg-7">
										<?php
										if ($pstatus == 1) {
											echo "<center><h2 style='color: green;font-size:25px;'>YOUR REQUIREMENTS HAS BEEN APPROVED.<br><img src='../assets/images/approved.jpg'></h2></center>";
										}
										elseif ($pstatus == 2) {
											echo "<center><h2 style='color: blue;font-size:25px;'>YOUR REQUIREMENTS IS PENDING. PLEASE CHECK BACK HERE FOR UPDATES.<br><img src='../assets/images/pending.jpg'></h2></center>";
										}
										elseif ($pstatus == 3) {
											echo "<center><h2 style='color: red;font-size:25px;'>YOUR REQUIREMENTS HAS BEEN REJECTED. PLEASE RESUBMIT VALID DOCUMENTS.<br><img src='../assets/images/rejected.jpg'></h2></center>";
										}
										else {

										}
										?>
										<h3 style="font-size: 28px;"><b><?php echo strtoupper($ptitle); ?></b></h3><br>
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
												<li>
													<span class="new-users-text">
														<a href="#" class="new-users-name">Full Documentation</a>
													</span>
													<span class="new-users-btn">
														<a href="file.php?code=<?php echo $pdocid; ?>&type=full-document&title=<?php echo $ptitle; ?>" target="_blank"><u><?php echo $pdoc; ?></u></a>
													</span>
												</li>
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
														<a href="#" class="new-users-name">Source Code</a>
													</span>
													<span class="new-users-btn">
														<a href="../directory/source-code/<?php echo $pcodeid; ?>.zip" target="_blank"><u><?php echo $pcode; ?></u></a>
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
											</ul>
											<hr>
											<?php
											if ($pstatus == 3) {
											?>
											<form class="edit-profile m-b30" method="POST">
												<center><button type="submit" class="btn green radius-xl" name="update" style="width: 260px;height: 50px;display: flex;align-items: center;justify-content: center;background-color: #B22323;"><i class="ti-agenda" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;RESUBMIT REQUIREMENTS</span></button></center>
											</form>
											<?php
											}
											else { }

												if (isset($_POST['update'])) {
												$last_id = "";
												$model->updateProjectID($last_id, $account_id);
												echo "<script>;window.open('submit-final-requirements','_self');</script>";
												}
											?>
										</div>
									</div>
									<div class="col-lg-5">
										<img src="../assets/images/about.jpg">
										<p style="text-align: justify;text-justify: inter-word;">Starting Academic Year 2018-2019 (August 2018), the Bachelor of Science in Information Technology program will offer three professional elective tracks for students:</p>
										<p style="text-align: justify;text-justify: inter-word;"><b>1. Network and Security</b>
										The Network and Security track provides a continuation of the CCNA modules delivered during the 2nd and 3rd years of BS IT students. They are expected to learn how to manage, build, and install a computer network’s security by understanding and implementing network security policies and procedures. 
										<br>
										<b>2. Web and Mobile App Development</b>
										The Web and Mobile App Development track is a supplement to the programming courses that the students are currently taking. Additional programming languages, frameworks, tools, and best practices in software development are to be introduced in this track. Aside from Java, students in this track are expected to learn PHP and .NET Framework. Also, aside from Android, students are expected to create mobile applications using either iOS and/or Windows platforms. 
										<br>
										<b>3. Robotics</b>
										The Robotics track identifies possible applications for the IT field. Focus is on hardware integration, implementation, and application rather than engineering’s hardware development and design. Introduction of existing technologies, such as the Boe-Bot series and Arduino, will be used to identify and create possible applications, focusing on real-life scenarios (i.e., Internet of Things).</p>
									</div>