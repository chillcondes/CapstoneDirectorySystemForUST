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
			$query = "SELECT id, pword FROM admin WHERE uname = ? LIMIT 1";

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
										echo "<script>alert('reached limit!')</script>";
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

		public function signInFaculty($uname, $pword) {
			$query = "SELECT id, pword FROM admin WHERE uname = ? LIMIT 1";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('faculty/index','_self');</script>";
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
										echo "<script>alert('reached limit!')</script>";
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

		public function signInStudent($uname, $pword) {
			$query = "SELECT id, pword FROM admin WHERE uname = ? LIMIT 1";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('student/index','_self');</script>";
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
										echo "<script>alert('reached limit!')</script>";
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
								echo "<script>alert('mn!');window.open('index.php','_self');</script>";
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
										echo "<script>alert('reached limit!')</script>";
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

		public function count_widget($session){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as enrolled FROM students WHERE department_id = '$session'";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function addStudent($si, $fn, $mn, $ln, $yr, $sc, $cn, $gn, $bd, $em, $pw, $dptid, $sts) {
			$query = "INSERT INTO students (stud_id, fname, mname, lname, year, section, email, contact, gender, birth_date, pword, status, date_added, thesis_id, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$data = 0;
				$stmt->bind_param('ssssisssissssii', $si, $fn, $mn, $ln, $yr, $sc, $em, $cn, $gn, $bd, $pw, $sts, $date, $data, $dptid);
				$stmt->execute();
				if($stmt->errno == 1062) {
					$_SESSION['student_id'] = $si;
					echo "<script>window.open('validation.php','_self');</script>";
				} 

				else {
					echo "<script>window.open('success.php','_self');</script>";
				}
				$stmt->close();
			}
		}

		public function displayStudents() {
			$data = null;

			$query = "SELECT * FROM students WHERE department_id = ? AND status = 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $_SESSION['sess']);
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

		public function displayStudent() {
			$data = null;

			$query = "SELECT * FROM students WHERE department_id = ? AND status = 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $_SESSION['sess']);
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

		public function displayArchivedStudents($yr) {
			$data = null;

			$query = "SELECT * FROM students WHERE year = ? AND department_id = ? AND status = 0";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $yr, $_SESSION['sess']);
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

		public function displayDepartment() {
			$data = null;

			$query = "SELECT * FROM admin WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $_SESSION['sess']);
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


	}
?>