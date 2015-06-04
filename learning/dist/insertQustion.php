<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
session_start();
$question_number = "";
$question_content = "";
$unit = $_POST["unit"];
$comment = $_POST["comment"];

//INSERT INTO `eln`.`user` (`id_number`, `password`, `pname`, `fname`, `lname`, `bday`, `role`, `email`, `phone`) VALUES ('1409800175525', '19219521', 'นาย', 'กฤษฎากร', 'หาดวรรณ์', '1991-09-27', '1', 'kidsadakron.hd@gmail.com', '0878553384');
 //$strSQL = "INSERT INTO `eln`.`user` (`id_number`, `password`, `pname`, `fname`, `lname`, `bday`, `role`, `email`, `phone`) VALUES ( '".$id_number."', '".$password."', '".$pname."', '".$fname."', '".$lname."', '".$bday."', '1', '".$email."', '".$phone."');";
 //$objQuery = mysql_query($strSQL);

 /*if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();*/
	//echo $comment.'ss';
	$i = 1;
	$question_id = "";
	foreach(preg_split("/((\r?\n)|(\r\n?))/", $comment) as $line){
    	//echo 'line'.$i.' : '.$line.'<br>';
		$question_number = "";
		if($i == 5){
			echo 'line'.$i.' : '.$line.'<br>';
				$question_choice_id = explode(".",$line);
			$strSQL = "INSERT INTO `eln`.`question_choice` (`question_id`, `question_choice_content`, `question_choice_id`, `unit_id` ) VALUES (".$question_id." , '".$line."' , '".trim($question_choice_id[0])."','".$unit."')";
			 $objQuery = mysql_query($strSQL);

			 if ($objQuery == TRUE) {
					echo 'line'.$i.' : ok <br>';
					} else {
					echo 'line'.$i.$strSQL.'<br>';
				 }
			$i = 0;
		}else if ($i == 1){
			$question_number = explode(".",$line);
			echo 'ข้อ'.($question_number[0]).'<br>';
			$strSQL = "SELECT * FROM `question` WHERE unit_id = ".$unit." AND question_number = ".$question_number[0]."";
			   mysql_query("SET NAMES utf8");
			$objQuery = mysql_query($strSQL);
				
				
				
				while ($r = mysql_fetch_assoc($objQuery)) {
					$question_id = $r[question_id];
					
				}
			//echo substr($line,2).'<br>';
			//INSERT INTO `eln`.`question` (`question_id`, `question_content`, `question_answer`, `unit_id`, `question_number`) VALUES (NULL, '1', NULL, '1', '1');
			/*$strSQL = "INSERT INTO `eln`.`question` (`question_id`, `question_content`, `question_answer`, `unit_id`, `question_number`) VALUES (NULL, '".substr($line,2)."', NULL, '".$unit."', '".$question_number[0]."')";
			 $objQuery = mysql_query($strSQL);

			 if ($objQuery == TRUE) {
					echo 'line'.$i.' : ok <br>';
					} else {
					echo 'line'.$i.$strSQL.'<br>';
				 }*/
				
		}else{
			echo 'line'.$i.' : '.$line.'<br>';
			
				echo 'line'.$i.' : '.$question_id.'<br>';
				$question_choice_id = explode(".",$line);
			$strSQL = "INSERT INTO `eln`.`question_choice` (`question_id`, `question_choice_content`, `question_choice_id`, `unit_id` ) VALUES (".$question_id." , '".$line."' , '".trim($question_choice_id[0])."','".$unit."')";
			 $objQuery = mysql_query($strSQL);

			 if ($objQuery == TRUE) {
					echo 'line'.$i.' : ok <br>';
					} else {
					echo 'line'.$i.$strSQL.'<br>';
				 }
		}
		
		$i++;
} 

