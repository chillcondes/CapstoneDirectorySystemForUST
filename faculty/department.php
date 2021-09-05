<?php

	$department = $model->displayDepartment();

	if (!empty($department)) {
		foreach ($department as $dep) {
			$dpt = $dep['department'];
			$nm = $dep['name'];
			$unm = $dep['uname'];
			$abbrv = $dep['abbreviation'];
		}
	}		
?> 