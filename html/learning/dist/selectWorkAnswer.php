<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);
ob_start();
	session_start();
mysql_select_db("phol_eln");
$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
//mysql_query("SET NAMES utf8");
$unit = $_POST["unit"];
$work_id = $_POST["work_id"];
mysql_query("SET NAMES utf8");

$strSQL = "SELECT * FROM work_answer WHERE unit_id = ".$unit." AND id_number = '".$id_number."' AND work_id = '".$work_id."'";
   
$objQuery = mysql_query($strSQL);
    
	
 	$row = "";
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row =   $r["work_answer_content"];
		
    }
    echo $row;
//	$encoded =  json_encode($row);
//$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
//    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
//}, $encoded);	
//print $unescaped;
			
	mysql_close();
?>