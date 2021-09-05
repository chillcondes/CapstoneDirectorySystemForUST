<?php

	session_start();
	unset($_SESSION['sess']);
	echo "<script>window.open('../faculty.php', '_self');</script>";

?>