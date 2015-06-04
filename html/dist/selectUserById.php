<?php

include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);

mysql_select_db("eln");
$id_number = $_POST["id_number"];
//mysql_query("SET NAMES utf8");
$strSQL = "SELECT * FROM `eln`.`user` WHERE `id_number` = '".$id_number."' ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
	$encoded =  json_encode($row);
$unescaped = preg_replace_callback('/\\\\u(\w{4})/',enUtf8, $encoded);	
print $unescaped;
				
	mysql_close();
        
         function enUtf8($matches) {
    return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
}
?>