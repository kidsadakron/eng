<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$strSQL = "SELECT * FROM `study` WHERE `id_number` = '".$id_number."' AND unit_id = 1 ";
	
		
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	 if (mysql_num_rows($objQuery) > 0) {
		 echo "ok";
	 }else{
		 echo "no";
	 }
	 
 /*	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
	$encoded =  json_encode($row);
$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
}, $encoded);	
print $unescaped;*/
				
	mysql_close();
?>