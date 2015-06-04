<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_eln");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$unit = $_SESSION["eln_unit"];
$status = $_GET["status"];
//UPDATE `eln`.`study` SET `status` = '2' WHERE `study`.`id_number` = '1409800175525' AND `study`.`unit_id` = 0;

 $strSQL = "UPDATE `study` SET `status` = '".$status."' WHERE `study`.`id_number` = '".$id_number."' AND `study`.`unit_id` = ".$unit.";";
 $objQuery = mysql_query($strSQL);

echo $strSQL;
 if ($objQuery === TRUE) {
//        if($status == 2){
//            header("Location: ../index.php?page=study&unit=".$unit);   
//        }else if($status == 3){
//            header("Location: ../index.php?page=study");  
//        }
   		
    	} else {
     	echo $strSQL;
	 }
	mysql_close();
