<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("e_eng");
mysql_query("SET NAMES utf8");

 $handle = fopen("inputfile.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $strSQL = "INSERT INTO `e_eng`.`user` (`user_id`, `name`, `tname`, `type`, `password`, `role`) VALUES ('".trim($line)."', NULL, NULL, NULL, '1234', '1');";
        $objQuery = mysql_query($strSQL);
    
	if(mysql_num_rows($objQuery) > 0){
            echo "ok";
        }else{
            echo $strSQL;
        }
    }

    fclose($handle);
} else {
    // error opening the file.
} 
 ?>

