<?php

include("../../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("e_eng");
ob_start();

	session_start();
	$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	$unit = $_POST["unit_id"];
	$id_number = $data[0]['user_id'];
           mysql_query("SET NAMES utf8");
       $status = $_POST["status"];
$strSQL = " INSERT INTO `study`(`user_id`, `unit_id`, `status`) VALUES ('".$id_number."','".$unit."',1)";
$objQuery = mysql_query($strSQL);
 if ($objQuery === TRUE) {
     $strSQL = "SELECT * FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.question_choice_id = b.question_answer AND a.user_id = '".$id_number."' AND b.unit_id = '".$unit."' AND status = '".$status."'";
	

    $objQuery = mysql_query($strSQL);

    $score = 0 ;
    $row = array();
           while ($r = mysql_fetch_assoc($objQuery)) {
           $row[] = $r;
           $score++;

       }

   echo $score;
 }else{
      $strSQL = "UPDATE `study` SET `status` = '1' WHERE `study`.`user_id` = '".$id_number."' AND `study`.`unit_id` = ".$unit.";";
 $objQuery = mysql_query($strSQL);

 }

	mysql_close();
