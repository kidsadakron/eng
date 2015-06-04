<?php

	ob_start();
	session_start();
	$_SESSION["eng_user"] = "";
	header('Location: ../../index.php'); 
	
	
?>