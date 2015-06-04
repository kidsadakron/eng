<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("phol_eln");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	$unit = $_SESSION["eln_unit"];
	$id_number = $data[0]['id_number'];
$strSQL = "SELECT * FROM `study` WHERE `id_number` = '".$id_number."' AND unit_id = ".$unit." AND status = 3";
			
				
		   mysql_query("SET NAMES utf8");
		$objQuery = mysql_query($strSQL);
			
			 if (mysql_num_rows($objQuery) > 0) {
                             echo  1;
			 }else{
				 echo  $strSQL;
			 }
				
	mysql_close();
?>