<?php

	session_start();
	unset($_SESSION['sess']);
	echo "<script>window.open('../index.php', '_self');</script>";

?>