<?php
	if (empty($_SESSION['student_sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}
	$account_id = $_SESSION['student_sess'];

	$model = new Model();
	$account = $model->displayAccountProfile($account_id);

	if (!empty($account)) {
		foreach ($account as $acc) {
			$fname = $acc['fname'];
			$mname = $acc['mname'];
			$lname = $acc['lname'];
			$email = $acc['email'];
			$contact = $acc['contact'];
			$department_id = $acc['department_id'];
			$gender = $acc['gender'];
			$submit_req_status = $acc['project_id'];
			$co_id = $acc['collaboration_id'];
			$co_status = $acc['collaboration_status'];
			$date_added = date('M d, Y g:i A', strtotime($acc['date_added']));
		}
	}

	if (empty($department_id)) {
		echo "<script>window.open('../validation.php?id=1','_self');</script>";
	}
	else {}

	$department = $model->displayDepartment($department_id);
	if (!empty($department)) {
		foreach ($department as $dep) {
			$dpt = $dep['department'];
			$nm = $dep['name'];
			$unm = $dep['uname'];
			$abbrv = $dep['abbreviation'];
		}
	}		
?> 