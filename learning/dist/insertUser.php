<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
session_start();

$id_number = $_POST["id_number"];
$password = $_POST["password"];
$pname = $_POST["pname"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$bday = $_POST["bday"];
$email = $_POST["email"];
$phone = $_POST["phone"];

mysql_query("SET NAMES utf8");
//INSERT INTO `eln`.`user` (`id_number`, `password`, `pname`, `fname`, `lname`, `bday`, `role`, `email`, `phone`) VALUES ('1409800175525', '19219521', 'นาย', 'กฤษฎากร', 'หาดวรรณ์', '1991-09-27', '1', 'kidsadakron.hd@gmail.com', '0878553384');
 $strSQL = "INSERT INTO `user` (`id_number`, `password`, `pname`, `fname`, `lname`, `classroom`, `role`, `email`, `phone`) VALUES ( '".$id_number."', '".$password."', '".$pname."', '".$fname."', '".$lname."', '".$bday."', '1', '".$email."', '".$phone."');";
 $objQuery = mysql_query($strSQL);
;
 if ($objQuery === TRUE) {
   		echo 1;
    	} else {
     	echo $strSQL;
	 }
	mysql_close();

