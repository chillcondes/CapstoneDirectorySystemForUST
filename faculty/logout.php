<?php

	session_start();
	unset($_SESSION['faculty']);
	echo "<script>window.open('../faculty.php', '_self');</script>";

?>