<?php
	
	session_start();
	require __dir__ . '/classes/controller.php';
	$controller = new Controller();
	//Sglobal $controller;

	$controller->template();
	//var_dump($controller);
?>