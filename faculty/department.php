<?php

	if (empty($_SESSION['faculty'])) {
		echo "<script>window.open('../faculty.php','_self');</script>";
	}
	$account_id = $_SESSION['faculty'];

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
			$date_added = date('M d, Y g:i A', strtotime($acc['date_added']));
		}
	}

	if (empty($department_id)) {
		echo "<script>window.open('../validation.php?id=0','_self');</script>";
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