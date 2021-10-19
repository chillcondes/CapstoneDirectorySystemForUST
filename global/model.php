<?php

	date_default_timezone_set('Asia/Manila');
	Class Model {
		private $server = "localhost";
		private $username = "root";
		private $password = "12345";
		private $dbname = "u134789687_ust";
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			}
		}

		public function signIn($uname, $pword) {
			$query = "SELECT id, pword FROM admin WHERE uname = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('admin/index','_self');</script>";
							exit();
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['lattempt'])) {
								$_SESSION['lattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['lattempt']) {
									case 1:
										$_SESSION['lattempt']++;
										break;
									case 2:
										$_SESSION['lattempt']++;
										break;
									case 3:
										$_SESSION['lattempt']++;
										break;
									default:
										unset($_SESSION['lattempt']);
										setcookie('rlimited', '5', time() + (60), "/");
										setcookie('expiration_date_admin', time() + (60), time() + (60), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function signInAccount($uname, $pword, $access) {
			$query = "SELECT id, pword FROM accounts WHERE email = ? AND access = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("si", $uname, $access);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							if ($access == 0) {
								$_SESSION['faculty'] = $id;
								echo "<script>window.open('faculty/index','_self');</script>";
							}

							else {
								$_SESSION['student_sess'] = $id;
								echo "<script>window.open('student/index','_self');</script>";
							}
							exit();
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['llattempt'])) {
								$_SESSION['llattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['llattempt']) {
									case 1:
										$_SESSION['llattempt']++;
										break;
									case 2:
										$_SESSION['llattempt']++;
										break;
									case 3:
										$_SESSION['llattempt']++;
										break;
									default:
										unset($_SESSION['llattempt']);
										setcookie('rrlimited', '5', time() + (60), "/");
										setcookie('expiration_date_faculty', time() + (60), time() + (60), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function addAccount($fname, $mname, $lname, $email, $cont, $gender, $pword, $access, $status, $date, $course) {
			$query = "INSERT INTO accounts (fname, mname, lname, email, contact, gender, pword, access, status, date_added, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssisiisi', $fname, $mname, $lname, $email, $cont, $gender, $pword, $access, $status, $date, $course);
				$stmt->execute();
				if($stmt->errno == 1062) {
					$_SESSION['in-use'] = $email;
					echo "<script>window.open('in-use.php','_self');</script>";
				} 

				else {
				
				}
				$stmt->close();
			}
		}

		public function count_widget($department_id){
			$data = null;
			$query = "SELECT SUM(IF(access = '0',1,0)) as faculty, SUM(IF(access = '1',1,0)) as students FROM accounts WHERE department_id = '$department_id' AND status = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_archive($department_id){
			$data = null;
			$query = "SELECT SUM(IF(access = '0',1,0)) as faculty, SUM(IF(access = '1',1,0)) as students FROM accounts WHERE department_id = '$department_id' AND status = 0";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_capstone($department_id){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as registered_proj, SUM(IF(status = '2',1,0)) as pending_proj, SUM(IF(status = '3',1,0)) as rejected_proj FROM projects WHERE department_id = '$department_id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function displayDepartment($department_id) {
			$data = null;
			$query = "SELECT * FROM admin WHERE id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $department_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAccounts($department_id, $access, $status) {
			$data = null;
			$query = "SELECT * FROM accounts WHERE department_id = ? AND access = ? AND status = ? ORDER BY date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $department_id, $access, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAccountProfile($account_id) {
			$data = null;
			$query = "SELECT * FROM accounts WHERE id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $account_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayProjects($department_id, $proj_status) {
			$data = null;
			$query = "SELECT a.*, b.category FROM projects AS a INNER JOIN specialization AS b ON a.spec_id = b.id WHERE a.department_id = ? AND a.status = ? ORDER BY a.date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $proj_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayProject($department_id, $proj_status, $proj_id) {
			$data = null;
			$query = "SELECT a.*, b.category FROM projects AS a INNER JOIN specialization AS b ON a.spec_id = b.id WHERE a.department_id = ? AND a.status = ? AND a.project_id = ? ORDER BY a.date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $department_id, $proj_status, $proj_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayBestProjects($department_id, $proj_status) {
			$data = null;
			$query = "SELECT a.*, b.category FROM projects AS a INNER JOIN specialization AS b ON a.spec_id = b.id WHERE a.department_id = ? AND a.status = ? AND a.award = 1 ORDER BY a.date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $proj_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayProjectDetails($department_id, $proj_id) {
			$data = null;
			$query = "SELECT  a.*, b.category FROM projects AS a INNER JOIN specialization AS b ON a.spec_id = b.id WHERE department_id = ? AND project_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $proj_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAllCollaborations($department_id, $collab_status) {
			$data = null;
			$query = "SELECT a.collaboration_id AS co_id, a.*, b.* FROM collaboration AS a INNER JOIN accounts AS b ON a.representative_id = b.id WHERE a.department_id = ? AND a.status = ? ORDER BY a.date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $collab_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateCollabStatus($collab_status, $student_id, $department_id) {
			$query = "UPDATE accounts SET collaboration_status = ? WHERE id = ? AND department_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $collab_status, $student_id, $department_id);
				$stmt->execute();
				$stmt->close();

				//echo "<script>alert('Student has been removed!');window.open('collaboration-details?id=".$key."','_self');</script>";
			}
		}

		public function displayCollaborations($department_id, $account_id, $collab_status) {
			$data = null;
			$query = "SELECT a.*, b.* FROM collaboration AS a INNER JOIN accounts AS b ON a.representative_id = b.id WHERE a.department_id = ? AND a.faculty_id = ? AND a.status = ? ORDER BY a.date_added DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $department_id, $account_id, $collab_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function collaborationArchiveRestore($status, $collab_id, $dep_id) {
			$query = "UPDATE collaboration SET status = ? WHERE collaboration_id = ? AND department_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $status, $collab_id, $dep_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateCollaboration($title, $subject, $grNum, $subjCoor, $techAdv, $client, $collab_id, $department_id) {
			$query = "UPDATE collaboration SET title = ?, subject = ?, group_num = ?, subj_coordinator = ?, tech_adv = ?, client = ? WHERE collaboration_id = ? AND department_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssii', $title, $subject, $grNum, $subjCoor, $techAdv, $client, $collab_id, $department_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateCollaborationLink($link, $collab_id, $department_id) {
			$query = "UPDATE collaboration SET link = ? WHERE collaboration_id = ? AND department_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sii', $link, $collab_id, $department_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function displayCollaborationsDetailsStudents($department_id, $collab_id) {
			$data = null;
			$query = "SELECT a.*, b.id FROM collaboration AS a INNER JOIN accounts AS b ON a.representative_id = b.id WHERE a.department_id = ? AND a.collaboration_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $collab_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayCollaborationsDetails($department_id, $collab_id) {
			$data = null;
			$query = "SELECT a.*, b.id FROM collaboration AS a INNER JOIN accounts AS b ON a.representative_id = b.id WHERE a.department_id = ? AND a.collaboration_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $department_id, $collab_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayCollaborationsMembers($department_id, $collab_id, $collab_status) {
			$data = null;
			$query = "SELECT * FROM accounts WHERE department_id = ? AND access = 1 AND collaboration_id = ? AND collaboration_status = ? ORDER BY lname ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $department_id, $collab_id, $collab_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayCollaborationsPanels($collab_id, $collab_status) {
			$data = null;
			$query = "SELECT a.*, b.*, b.id as panel_id FROM accounts AS a INNER JOIN panels AS b ON a.id = b.account_id WHERE b.collaboration_id = ? AND b.collaboration_status = ? ORDER BY a.lname ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $collab_id, $collab_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updatePanelStatus($panel_status, $panel_id) {
			$query = "UPDATE panels SET collaboration_status = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $panel_status, $panel_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editBestCapstone($award, $proj_id) {
			$query = "UPDATE projects SET award = ? WHERE project_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $award, $proj_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function approveProject($status, $proj_id) {
			$query = "UPDATE projects SET status = ? WHERE project_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $status, $proj_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateProject($ipReg, $specialization, $title, $author, $year, $adviser, $keywords, $proj_id) {
			$query = "UPDATE projects SET ip_reg = ?, spec_id = ?, title = ?, author = ?, year = ?, tech_adv = ?, keywords = ? WHERE project_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("sisssssi", $ipReg, $specialization, $title, $author, $year, $adviser, $keywords, $proj_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchCourses() {
			$data = null;
			$query = "SELECT id, department FROM admin WHERE 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateAdminName($fnm, $department_id) {
			$query = "UPDATE admin SET name = ? WHERE id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $fnm, $department_id);
				$stmt->execute();
				$stmt->close();
				echo "<script>window.open('index','_self');</script>";
			}
		}

		public function archiveAccount($aid, $access, $status, $department_id) {
			$query = "UPDATE accounts SET status = '0' WHERE id = ? AND access = ? AND status = ? AND department_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iiii', $aid, $access, $status, $department_id);
				$stmt->execute();
				$stmt->close();
			}
			else {
				echo "<script>alert('error');</script>";
			}
		}

		public function restoreAccount($aid, $access, $status, $department_id) {
			$query = "UPDATE accounts SET status = '1' WHERE id = ? AND access = ? AND status = ? AND department_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iiii', $aid, $access, $status, $department_id);
				$stmt->execute();
				$stmt->close();
			}
			else {
				echo "<script>alert('error');</script>";
			}
		}

		public function addCapstoneProject($ipReg, $specialization, $title, $author, $year, $adviser, $first, $firstUnique, $second, $secondUnique, $third, $thirdUnique, $fourth, $fourthUnique, $fifth, $fifthUnique, $keywords, $status, $department_id) {
			$query = "INSERT INTO projects(ip_reg, spec_id, title, author, year, tech_adv, document, document_id, conference, conference_id, avp, avp_id, code, code_id, approval, approval_id, keywords, award, status, department_id, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if($stmt = $this->conn->prepare($query)) {
				$award = 0;
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param('sisssssssssssssssiiis', $ipReg, $specialization, $title, $author, $year, $adviser, $first, $firstUnique, $second, $secondUnique, $third, $thirdUnique, $fourth, $fourthUnique, $fifth, $fifthUnique, $keywords, $award, $status, $department_id, $date);
				$stmt->execute();

				$last_id = $this->conn->insert_id;

				$stmt->close();
			}

			return $last_id;
		}

		public function fetchAccountID($email) {
			$query = "SELECT id, collaboration_id, collaboration_status FROM accounts WHERE email = ? AND access = 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$stmt->bind_result($id, $collaboration_id, $collaboration_status);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						$data = array($id, $collaboration_id, $collaboration_status);
						return $data;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function fetchCollaborationCode($collab_id, $dep_id) {
			$query = "SELECT code FROM collaboration WHERE collaboration_id = ? AND department_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $collab_id, $dep_id);
				$stmt->execute();
				$stmt->bind_result($code);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $code;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function createCollaboration($title, $subject, $grNum, $subjCoor, $techAdv, $representative_id, $faculty_id, $department_id, $client, $code, $status) {
			$query = "INSERT INTO collaboration (title, subject, group_num, subj_coordinator, tech_adv, representative_id, faculty_id, department_id, client, code, date_added, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param('sssssiiisssi', $title, $subject, $grNum, $subjCoor, $techAdv, $representative_id, $faculty_id, $department_id, $client, $code, $date, $status);
				$stmt->execute();

				$last_id = $this->conn->insert_id;

				$stmt->close();
			}

			return $last_id;
		}

		public function updateAccountCollaboration($collab_id, $co_status, $account_id) {
			$query = "UPDATE accounts SET collaboration_id = ?, collaboration_status = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $collab_id, $co_status, $account_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateProjectID($project_id, $id) {
			$query = "UPDATE accounts SET project_id = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $project_id, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function changePassword($id, $pword, $newpword) {
			$query = "SELECT id, pword FROM admin WHERE id = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE admin SET pword = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('index','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password');</script>";
							if (empty($_SESSION['rlattempt'])) {
								$_SESSION['rlattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['rlattempt']) {
									case 1:
										$_SESSION['rlattempt']++;
										break;
									case 2:
										$_SESSION['rlattempt']++;
										break;
									case 3:
										$_SESSION['rlattempt']++;
										break;
									case 4:
										$_SESSION['rlattempt']++;
										break;
									default:
										unset($_SESSION['rlattempt']);
										setcookie('rrlimited', '5', time() + (30), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function changePasswordStudent($id, $pword, $newpword) {
			$query = "SELECT id, pword FROM accounts WHERE id = ? AND access = 1 LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE accounts SET pword = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('index','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password');</script>";
							if (empty($_SESSION['rlattempt'])) {
								$_SESSION['rlattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['rlattempt']) {
									case 1:
										$_SESSION['rlattempt']++;
										break;
									case 2:
										$_SESSION['rlattempt']++;
										break;
									case 3:
										$_SESSION['rlattempt']++;
										break;
									case 4:
										$_SESSION['rlattempt']++;
										break;
									default:
										unset($_SESSION['rlattempt']);
										setcookie('rrlimited', '5', time() + (30), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function changePasswordFaculty($id, $pword, $newpword) {
			$query = "SELECT id, pword FROM accounts WHERE id = ? AND access = 0 LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE accounts SET pword = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('index','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password');</script>";
							if (empty($_SESSION['rlattempt'])) {
								$_SESSION['rlattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['rlattempt']) {
									case 1:
										$_SESSION['rlattempt']++;
										break;
									case 2:
										$_SESSION['rlattempt']++;
										break;
									case 3:
										$_SESSION['rlattempt']++;
										break;
									case 4:
										$_SESSION['rlattempt']++;
										break;
									default:
										unset($_SESSION['rlattempt']);
										setcookie('rrlimited', '5', time() + (30), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function addSpecialization($add_specialization, $department_id, $date) {
			$query = "INSERT INTO specialization (category, dept_id, date_added) VALUES (?, ?, ?)";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sis', $add_specialization, $department_id, $date);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function displaySpecialization($department_id) {
			$data = null;
			$query = "SELECT * FROM specialization WHERE dept_id = ? ORDER BY category ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $department_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateSpecialization($cat_id, $new_category) {
			$query = "UPDATE specialization SET category = ? WHERE id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $new_category, $cat_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function countSpecializationProjects($category_id) {
			$query = "SELECT COUNT(project_id) FROM projects WHERE spec_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $category_id);
				$stmt->execute();
				$stmt->bind_result($countSpecializationProjects);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $countSpecializationProjects;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function requestPanel($collaboration_id, $collaboration_status, $account_id) {
			$query = "INSERT INTO panels (collaboration_id, collaboration_status, account_id) VALUES (?, ?, ?)";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('isi', $collaboration_id, $collaboration_status, $account_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchPanelStatus($collab_id, $account_id) {
			$query = "SELECT collaboration_status, id FROM panels WHERE collaboration_id = ? AND account_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $collab_id, $account_id);
				$stmt->execute();
				$stmt->bind_result($panel_status, $panel_id);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						$data = [$panel_status, $panel_id];

						return $data;
					}
				}
				else {
					$data = ['', ''];
					return $data;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function cancelRequest($id) {
			$query = "DELETE FROM panels WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchIpCode($department_id) {
			$query = "SELECT ip FROM ip_code WHERE department_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $department_id);
				$stmt->execute();
				$stmt->bind_result($ip_code);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $ip_code;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function fetchIpCounter() {
			$query = "SELECT id FROM ip_counter ORDER BY id DESC";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($ip_counter);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $ip_counter;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function updateIpCounter() {
			$query = "INSERT INTO ip_counter (id) VALUES (NULL)";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateIpCode($ip_code, $department_id) {
			$query = "UPDATE ip_code SET ip = ? WHERE department_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $ip_code, $department_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function resetIpCounter() {
			$query = "DELETE FROM ip_counter";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->close();
			}
		}
	}
?>