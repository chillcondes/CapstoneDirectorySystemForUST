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
			$query = "INSERT INTO accounts(fname, mname, lname, email, contact, gender, pword, access, status, date_added, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
			$query = "SELECT * FROM accounts WHERE id = ? AND status = 1";
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
			$query = "SELECT * FROM projects WHERE department_id = ? AND project_id = ?";
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

		public function editBestCapstone($award, $proj_id) {
			$query = "UPDATE projects SET award = ? WHERE project_id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $award, $proj_id);
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

		public function addCapstoneProject($ipReg, $specialization, $title, $author, $year, $adviser, $first, $firstUnique, $second, $secondUnique, $third, $thirdUnique, $fourth, $fourthUnique, $fifth, $fifthUnique, $keywords, $department_id) {
			$query = "INSERT INTO projects(ip_reg, spec_id, title, author, year, tech_adv, document, document_id, conference, conference_id, avp, avp_id, code, code_id, approval, approval_id, keywords, award, status, department_id, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if($stmt = $this->conn->prepare($query)) {
				$award = 0;
				$status = 1;
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param('sisssssssssssssssiiis', $ipReg, $specialization, $title, $author, $year, $adviser, $first, $firstUnique, $second, $secondUnique, $third, $thirdUnique, $fourth, $fourthUnique, $fifth, $fifthUnique, $keywords, $award, $status, $department_id, $date);
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



	}
?>