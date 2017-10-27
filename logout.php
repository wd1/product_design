<?php

	session_start();
	
	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	} else if(isset($_SESSION['user'])!="") {
		header("Location: home.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		unset($_SESSION['adminid']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}