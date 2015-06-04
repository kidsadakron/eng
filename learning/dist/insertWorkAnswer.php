<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$content = $_POST["content"];
$work_id = $_POST["work_id"];
$unit_id = $_SESSION["eln_unit"];
echo $unit_id."ss";
//INSERT INTO `eln`.`work_answer` (`unit_id`, `work_id`, `work_answer_content`, `id_number`) VALUES ('1', '2', 'ดดดดดดด', '1409800175525');
mysql_query("SET NAMES utf8");
 $strSQL = "INSERT INTO `work_answer` (`unit_id`, `work_id`, `work_answer_content`, `id_number`) VALUES ('".$unit_id."', '".$work_id."', '".$content."', '".$id_number."');";
 $objQuery = mysql_query($strSQL);


	
 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
