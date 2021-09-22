<?php

	session_start();
	unset($_SESSION['student_sess']);
	echo "<script>window.open('../index', '_self');</script>";

?>