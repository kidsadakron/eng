<?php


	
include("../../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("e_eng");
$pname = $_POST["pname"];
$name = $_POST["name"];
ob_start();
session_start();
$user = $_SESSION["eng_user"];
$data = json_decode($user, true);
$user_id = $data[0]['user_id'];
//UPDATE `e_eng`.`user` SET `name` = 'บอล', `tname` = 'นาย' WHERE `user`.`user_id` = 'a1-01';

 $strSQL = "UPDATE `user` SET `name` = '".$name."', `tname` = '".$pname."' WHERE `user`.`user_id` = '".$user_id."';";
 $objQuery = mysql_query($strSQL);


	
 if ($objQuery === TRUE) {
 
$strSQL = "SELECT `user_id`,`tname`,`name` , `role` FROM `user` WHERE `user_id` = '".$user_id."'";
   mysql_query("SET NAMES utf8");
   
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		$_SESSION["eng_role"] = $r["role"];
		//echo $r["role"];
    }

	
	if(mysql_num_rows($objQuery) > 0){
			$encoded =  json_encode($row);
			$unescaped = preg_replace_callback('/\\\\u(\w{4})/',test, $encoded);
		/*	$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
				return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
			}, $encoded);*/
			$_SESSION["eng_user"] = $unescaped;
			//echo $unescaped ;
			header('Location: ../../index.php'); 
			//echo "<script type='text/javascript'> window.location.href = 'default.php'";
		
	}
    	} else {
     	echo $strSQL;
	 }
	mysql_close();

        
        
function test ($matches) {
				return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
			}
