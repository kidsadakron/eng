<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);
ob_start();
	session_start();
mysql_select_db("phol_eln");

	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $_POST['id_number'];
//mysql_query("SET NAMES utf8");
$unit = $_POST["unit"];
mysql_query("SET NAMES utf8");
$strSQL = "SELECT * FROM `work` WHERE unit_id = ".$unit." ORDER BY work_id";
   
$objQuery = mysql_query($strSQL);
    
	$i = 0;
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
        $strSQL1 = "SELECT * FROM work_answer WHERE unit_id = ".$unit." AND id_number = '".$id_number."' AND work_id = '".$r["work_id"]."'";
        $objQuery1 = mysql_query($strSQL1);
			$row1 = array();
                        
			while ($r1 = mysql_fetch_assoc($objQuery1)) {
				$row1 = $r1;	
			}
			array_put_to_position($row[$i],$row1,0,'work_answer_content');
                      //$row[$i]["work_answer_content"] = $row1 ;
			$i++;
		
		
		
    }
    //print_r ($row);	
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