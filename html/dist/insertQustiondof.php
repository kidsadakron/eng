<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("dof");
ob_start();
session_start();
$question_number = "";
$question_content = "";
$unit = $_POST["unit"];



for($i = 0 ;$i<10; $i++){
    $question_content = $_POST["topic".($i+1)];
    $question_answer = $_POST["answer".($i+1)];
    $data1 = $_POST["data".($i+1)."_1"];
    $data2 = $_POST["data".($i+1)."_2"];
    $data3 = $_POST["data".($i+1)."_3"];
    $data4 = $_POST["data".($i+1)."_4"];
     $strSQL = "INSERT INTO `question` (`question_id`, `question_content`, `question_answer`, `unit_id`, `question_number`) VALUES ('".($i+1)."', '".$question_content."', '".$question_answer."', '".$unit."', '".($i+1)."');";
 $objQuery = mysql_query($strSQL);
 $strSQL = "INSERT INTO `question_choice` (`question_id`, `question_choice_id`, `question_choice_content`, `unit_id`) VALUES ('".($i+1)."', 'ก', '".$data1."', '".$unit."');";
 $objQuery = mysql_query($strSQL);
 $strSQL = "INSERT INTO `question_choice` (`question_id`, `question_choice_id`, `question_choice_content`, `unit_id`) VALUES ('".($i+1)."', 'ข', '".$data2."', '".$unit."');";
 $objQuery = mysql_query($strSQL);
 $strSQL = "INSERT INTO `question_choice` (`question_id`, `question_choice_id`, `question_choice_content`, `unit_id`) VALUES ('".($i+1)."', 'ค', '".$data3."', '".$unit."');";
 $objQuery = mysql_query($strSQL);
 $strSQL = "INSERT INTO `question_choice` (`question_id`, `question_choice_id`, `question_choice_content`, `unit_id`) VALUES ('".($i+1)."', 'ง', '".$data4."', '".$unit."');";
 $objQuery = mysql_query($strSQL);
  if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	
}
//INSERT INTO `dof`.`question_choice` (`question_id`, `question_choice_id`, `question_choice_content`, `unit_id`) VALUES ('1', 'ก', 'ก.ฟหกฟหก', '1');
////INSERT INTO `dof`.`question` (`question_id`, `question_content`, `question_answer`, `unit_id`, `question_number`) VALUES ('1', '45445245245', 'ก', '0', '1');
//INSERT INTO `eln`.`user` (`id_number`, `password`, `pname`, `fname`, `lname`, `bday`, `role`, `email`, `phone`) VALUES ('1409800175525', '19219521', 'นาย', 'กฤษฎากร', 'หาดวรรณ์', '1991-09-27', '1', 'kidsadakron.hd@gmail.com', '0878553384');

 
 /*if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();*/
	


