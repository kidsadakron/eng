<?php

	ob_start();
	session_start();
	$_SESSION["eln_user"] = "";
	header('Location: ../signin.php'); 
	
	
?>