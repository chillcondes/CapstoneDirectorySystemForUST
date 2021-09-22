<?php
	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}		

	$department_id = $_SESSION['sess'];
	$model = new Model();
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