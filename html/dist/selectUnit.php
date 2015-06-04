<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("eln");
ob_start();
	session_start();
	$unit_id = $_SESSION["eln_unit"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$strSQL = "SELECT * FROM `eln`.`unit` WHERE  unit_id = '".$unit_id."' ";
	
		
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    

 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
	$encoded =  json_encode($row);
$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
}, $encoded);	
print $unescaped;
				
	mysql_close();
