<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $_POST['id_number'];
$content = $_POST["content"];
$work_id = $_POST["work_id"];
$unit_id = $_SESSION["eln_unit"];
$score = $_POST["score"];
echo $unit_id."ss";
//INSERT INTO `eln`.`work_answer` (`unit_id`, `work_id`, `work_answer_content`, `id_number`) VALUES ('1', '2', 'ดดดดดดด', '1409800175525');

 $strSQL = "UPDATE `work_answer` SET `status` = '1' ,score = '".$score."'  WHERE `work_answer`.`unit_id` = '".$unit_id."' AND `work_answer`.`work_id` = '".$work_id."' AND `work_answer`.`id_number` = '".$id_number."';";
 $objQuery = mysql_query($strSQL);


	
 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
