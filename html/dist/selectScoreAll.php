<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("eln");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $_POST["id_number"];	
$unit = $_SESSION["eln_unit"];
$question_number = $_POST["question_number"];
//mysql_query("SET NAMES utf8");
mysql_query("SET NAMES utf8");
$strSQL = "SELECT * FROM unit ORDER BY unit_id";
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	$i = 0;
	while ($r = mysql_fetch_assoc($objQuery)) {
                $strSQL1 = "SELECT COUNT(*) FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.id_number = '".$id_number."' AND b.unit_id = ".$r[unit_id]." AND a.status = 0";
		$objQuery1 = mysql_query($strSQL1);
              
			$row1 = array();
			while ($r1 = mysql_fetch_assoc($objQuery1)) {
                        if( $r1["COUNT(*)"]>0){
                            $strSQL1 = "SELECT COUNT(*) FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.question_choice_id = b.question_answer AND a.id_number = '".$id_number."' AND b.unit_id = ".$r[unit_id]." AND a.status = 0";
                            $objQuery1 = mysql_query($strSQL1);
              
                            $row1 = array();
                            while ($r1 = mysql_fetch_assoc($objQuery1)) {
                                    $r["pertest"] = $r1["COUNT(*)"];
                              
                            }
                        }else{
                            $r["pertest"] = "-1";
                        }
                              
		}
		$strSQL1 = "SELECT COUNT(*) FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.id_number = '".$id_number."' AND b.unit_id = ".$r[unit_id]." AND a.status = 1";
		$objQuery1 = mysql_query($strSQL1);
              
			$row1 = array();
			while ($r1 = mysql_fetch_assoc($objQuery1)) {
                        if( $r1["COUNT(*)"]>0){
                            $strSQL1 = "SELECT COUNT(*) FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id WHERE a.question_choice_id = b.question_answer AND a.id_number = '".$id_number."' AND b.unit_id = ".$r[unit_id]." AND a.status = 1";
                            $objQuery1 = mysql_query($strSQL1);
              
                            $row1 = array();
                            while ($r1 = mysql_fetch_assoc($objQuery1)) {
				$r["posttest"] = $r1["COUNT(*)"];
                              
                            }
                        }else{
                            $r["posttest"] = "-1";
                        }
                              
		}
               
                $strSQL1 = "SELECT * FROM work_answer WHERE id_number = '".$id_number."' AND unit_id = ".$r[unit_id]."";
		$objQuery1 = mysql_query($strSQL1);
              
			$row1 = array();
                        $r["work"] = 0;
                        if(mysql_num_rows($objQuery1) > 0)
                        {
                            while ($r1 = mysql_fetch_assoc($objQuery1)) {
                               // print $r1["status"];
                                if($r1["status"] == 0){
                                   $r["work"] = "-2";
                                }else{
                                    $r["work"] += $r1["score"];

                                }
                            }
                        }else{
                             $r["work"] = "-1";
                        }
			
                        
                $row[] = $r;
                   //  print_r($row) ;

//			array_put_to_position($row[$i],$row1,0,'question_choice_top');
//			$i++;
//			
//		$question_number = $question_number + 1;
//		
		
    }
	//print_r(array_values($row));
	$encoded =  json_encode($row);
$unescaped = preg_replace_callback('/\\\\u(\w{4})/',enUtf8 , $encoded);	
//print_r($row) ;

print $unescaped;
//print		$strSQL1;
	mysql_close();
	
	
	function array_put_to_position(&$array, $object, $position, $name = null)
{
        $count = 0;
        $return = array();
        foreach ($array as $k => $v) 
        {   
                // insert new object
                if ($count == $position)
                {   
                        if (!$name) $name = $count;
                        $return[$name] = $object;
                        $inserted = true;
                }   
                // insert old object
                $return[$k] = $v; 
                $count++;
        }   
        if (!$name) $name = $count;
        if (!$inserted) $return[$name];
        $array = $return;
        return $array;
}

function enUtf8($matches) {
    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
}
?>