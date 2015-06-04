<?php

	ob_start();
	session_start();
	$_SESSION["dof_user"] = "";
	header('Location: ../signin.php'); 
	
	
?>