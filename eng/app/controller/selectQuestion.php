<?php

include("../../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("e_eng");
ob_start();
	session_start();
	
//$unit = $_SESSION["eln_unit"];
        $unit = $_POST["unit_id"];;
$question_number = 0;
//mysql_query("SET NAMES utf8");
mysql_query("SET NAMES utf8");
$strSQL = "SELECT * FROM question WHERE  unit_id = ".$unit."";
$objQuery = mysql_query($strSQL);
 
       // print_r($objQuery);
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
        
		$strSQL1 = "SELECT * FROM question AS a INNER JOIN question_choice AS b ON a.question_id = b.question_id  AND a.unit_id = b.unit_id WHERE b.unit_id = ".$unit." AND a.question_id  = ".$question_number."";
		//echo $strSQL1;
                $objQuery1 = mysql_query($strSQL1);
			$row1 = array();
			while ($r1 = mysql_fetch_assoc($objQuery1)) {
				$row1[] = $r1;	
			}
			array_put_to_position($row[$i],$row1,0,'question_choice_top');
			$i++;
			
		$question_number = $question_number + 1;
		
		
    }
	//print_r(array_values($row));
	$encoded =  json_encode($row);
$unescaped = preg_replace_callback('/\\\\u(\w{4})/',enUtf8 , $encoded);	
print $unescaped;
		
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