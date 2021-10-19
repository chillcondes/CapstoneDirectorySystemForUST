										<div class="form-group col-6">
											<label class="col-form-label">IP Registration #: <span style="color: red;">*</span></label>
											<div class="row">
												<div class="form-group col-6">
													<?php 
														$ip_code = $model->fetchIpCode($department_id);
														$ip_counter = $model->fetchIpCounter();

														if ($ip_counter == false) {
															$ip_counter = 1;
															$checker = 0;
														}

														else {
															$checker = 1;
														}
													?>
													<input class="form-control" name="reg-1" type="text" value="<?php echo $ip_code; ?>" readonly>
												</div>
												<div class="form-group col-6">
													<input class="form-control" name="reg-2" type="text" value="<?php echo str_pad($ip_counter, 4, "0", STR_PAD_LEFT); ?>" readonly>
												</div>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Specialization</label>
											<div>
												<select class="form-control" name="specialization" id="specialization" required>
													<?php
														$ca = $model->displaySpecialization($department_id);
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
												<input class="form-control" name="author" type="text" required>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Year Published:</label>
											<div>
												<input class="form-control" name="year" type="text" required>
											</div>
										</div>
										<div class="form-group col-6">
											<label class="col-form-label">Technical Adviser: <span style="color: red;">*</span></label>
											<div>
												<input class="form-control" name="adviser" type="text" required>
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
												<input class="form-control" name="keywords" type="text" required>
											</div>
										</div>
										<div class="col-12" style="padding-top: 20px;">
											<button type="submit" name="submit" class="btn" style="background-color: #BE1630;color: white;">Submit Project</button>
										</div>

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

											$ipReg = ''.$_POST['reg-1'].'-'.$_POST['reg-2'].'';
											$specialization = $_POST['specialization'];
											$title = $_POST['title'];
											$author = $_POST['author'];
											$year = $_POST['year'];
											$adviser = $_POST['adviser'];
											$keywords = $_POST['keywords'];

											$last_id = $model->addCapstoneProject($ipReg, $specialization, $title, $author, $year, $adviser, $firstBase, $firstUnique, $secondBase, $secondUnique, $thirdBase, $thirdUnique, $fourthBase, $fourthUnique, $fifthBase, $fifthUnique, $keywords, 2, $department_id);

											$model->updateProjectID($last_id, $account_id);

											if ($checker == 0) {
												$model->updateIpCounter();
												$model->updateIpCounter();
											}

											elseif ($checker == 1) {
												$model->updateIpCounter();
											}

											echo "<script>;window.open('submit-final-requirements','_self');</script>";

										}
									}

								?>