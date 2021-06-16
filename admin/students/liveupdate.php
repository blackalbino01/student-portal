<?php

	require_once '../../config/students.php'; 

	$admstatus = $_GET['admstatus'];
	$id = $_GET['id'];


	$update = new Student();
	$update->editAdmstatus($admstatus,$id);



		
?>





