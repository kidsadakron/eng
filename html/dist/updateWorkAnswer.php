<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("eln");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$content = $_POST["content"];
$work_id = $_POST["work_id"];
$unit_id = $_SESSION["eln_unit"];
echo $unit_id."ss";
//UPDATE `eln`.`work_answer` SET `work_answer_content` = '1' WHERE `work_answer`.`unit_id` = '1' AND `work_answer`.`work_id` = '1' AND `work_answer`.`id_number` = '1409800175525';

 $strSQL = "UPDATE `eln`.`work_answer` SET `work_answer_content` = '".$content."' WHERE `work_answer`.`unit_id` = '".$unit_id."' AND `work_answer`.`work_id` = '".$work_id."' AND `work_answer`.`id_number` = '".$id_number."';";
 $objQuery = mysql_query($strSQL);


	
 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
