<?php

	ob_start();
	session_start();

	
include("../../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("e_eng");
$email = $_POST["username"];
$pass = $_POST["password"];
//echo $host.$username.$password.$strSQL.$email.$pass;
if($email != "" && $pass != ""){
//mysql_query("SET NAMES utf8");
    	
$strSQL = "SELECT `user_id`,`tname`,`name` , `role` FROM `user` WHERE `user_id` = '".$email."' AND `password` = '".$pass."' ";
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
		
	}else{
		echo "<script type='text/javascript'> alert('ผิด');window.location.href = '../../index.php'</script>";
		//header('Location: ../signin.php'); 
		// echo "<script type='text/javascript'> if (confirm('��س�')) {window.location.href = '../signin.php'}</script>";
		//echo $unescaped ;
	}

  // echo $strSQL;
				
	//mysql_close();
}else{
 
	//header('Location: ../signin.php'); 
}


function test ($matches) {
				return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
			}

?>