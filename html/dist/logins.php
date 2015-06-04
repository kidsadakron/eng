<?php

	ob_start();
	session_start();

	
include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("eln");
$email = $_POST["email"];
$pass = $_POST["pass"];
if($email != "" && $pass != ""){
//mysql_query("SET NAMES utf8");
$strSQL = "SELECT `id_number`,`pname`,`fname`,`lname`,`bday`,`role`,`email`,`phone` FROM `eln`.`user` WHERE (`email` = '".$email."' OR id_number = '".$email."') AND `password` = '".$pass."' ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		$_SESSION["eln_role"] = $r["role"];
    }
	if(mysql_num_rows($objQuery) > 0){
			$encoded =  json_encode($row);
			$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
				return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
			}, $encoded);
			$_SESSION["eln_user"] = $unescaped;
			//echo $unescaped ;
			header('Location: ../default.php'); 
			//echo "<script type='text/javascript'> window.location.href = 'default.php'";
		
	}else{
		//echo "<script type='text/javascript'> alert('กรุณาตรวจสอบข้อมุลอีกครั้ง');window.location.href = '../signin.php'</script>";
		header('Location: ../signin.php'); 
		 //echo "<script type='text/javascript'> if (confirm('กรุณา')) {window.location.href = '../signin.php'}</script>";
		//echo $unescaped ;
	}


				
	mysql_close();
}else{
	header('Location: ../signin.php'); 
}
?>