<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["dof_user"];
	$data = json_decode($user, true);
	$unit_id = $_SESSION["dof_unit"];
	$id_number = $data[0]['id_number'];
$status = $_POST["status"];
//$dataQuestion = json_decode($_POST["dataQuestion"],true);
//$jsonQ = '["208","209","210","211","212", "213","214","215","216","217","218","219","220","221","222","223","224","225","226","227","228","229","230","231","232","233","234","235","236","237","238","239","240","241","242","243","244","245","246","247"]';
$postedData = $_POST["dataSave"];
$tempData = str_replace("\\", "",$postedData);
$dataSave = json_decode($tempData,true);

$postedData = $_POST["dataQuestion"];
$tempData = str_replace("\\", "",$postedData);
$dataQuestion = json_decode($tempData,true);

//INSERT INTO `eln`.`test` (`question_id`, `status`, `question_choice_id`, `id_number`) VALUES ('7', '0', 'ง', '1409800175525');
for($i = 0 ; $i < sizeof($dataQuestion);$i++){
	mysql_query("SET NAMES utf8");
 $strSQL = "INSERT INTO `test` (`question_id`, `status`, `question_choice_id`, `unit_id`,`id_number`) VALUES ('".$dataQuestion[$i]."', '".$status."', '".$dataSave[$i]."','".$unit_id."',  '".$id_number."');";
 $objQuery = mysql_query($strSQL);


	}

 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
