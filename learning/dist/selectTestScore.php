<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("phol_dof");
ob_start();

	session_start();
	$user = $_SESSION["dof_user"];
	$data = json_decode($user, true);
	$unit = $_SESSION["dof_unit"];
	$id_number = $data[0]['id_number'];
           mysql_query("SET NAMES utf8");
       $status = $_POST["status"];
$strSQL = " INSERT INTO `study`(`id_number`, `unit_id`, `status`) VALUES ('".$id_number."','".$unit."',1)";
$objQuery = mysql_query($strSQL);
$strSQL = "SELECT * FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.question_choice_id = b.question_answer AND a.id_number = '".$id_number."' AND b.unit_id = '".$unit."' AND status = '".$status."'";
	

$objQuery = mysql_query($strSQL);
    
$score = 0 ;
 $row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
        $score++;
		
    }
//	$encoded =  json_encode($row);
//$unescaped = preg_replace_callback('/\\\\u(\w{4})/', function ($matches) {
//    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
//}, $encoded);	
//print $unescaped;
//			
echo $score;
	mysql_close();
