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
$status = $_POST["status"];
$dataQuestion = json_decode($_POST["dataQuestion"],true);
$dataSave = json_decode($_POST["dataSave"],true);

//INSERT INTO `eln`.`test` (`question_id`, `status`, `question_choice_id`, `id_number`) VALUES ('7', '0', 'ง', '1409800175525');
for($i = 0 ; $i < sizeof($dataSave);$i++){
 $strSQL = "INSERT INTO `eln`.`test` (`question_id`, `status`, `question_choice_id`, `id_number`) VALUES ('".$dataQuestion[$i]."', '".$status."', '".$dataSave[$i]."', '".$id_number."');";
 $objQuery = mysql_query($strSQL);


	}
 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
