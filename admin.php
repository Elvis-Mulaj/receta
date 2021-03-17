<?php
	
	session_start();
	require __dir__ . '/classes/controller.php';
	require __dir__ . '/classes/logincontroller.php';
	require __dir__ . '/classes/admincontroller.php';

	$admincontroller = new admincontroller();
	$login = new login();

	if(!$login->loginCheck()){
		header("Location: http://localhost/receta/login.php");
		exit();
	}

	if($_SESSION['level'] != 1){
		header("Location: http://localhost/receta/");
		exit();
	}

	$admincontroller->template();
?>