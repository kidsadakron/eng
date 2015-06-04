<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$phone = $_POST["phone"];

$password = $_POST["pass-con-phone"];


$strSQL = "SELECT * FROM `user` WHERE (`email` = '".$id_number."' OR id_number = '".$id_number."') AND `password` = '".$password."' ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
	if(mysql_num_rows($objQuery) > 0){
			
                $strSQL = "UPDATE user SET phone = '".$phone."' WHERE id_number = '".$id_number."' AND password = '".$password."';";
                $objQuery = mysql_query($strSQL);


                if ($objQuery === TRUE) {
                             header('Location: ../index.php?page=account'); 
                        }
		
	}else{
		 echo "<!DOCTYPE html>";
                echo "<head>";
                   echo "<title>Form submitted</title>";
                   echo "<script type='text/javascript'>alert('รหัสผ่านไม่ถูกต้อง'); window.location.href = '../index.php?page=account'</script>";
				  
                   echo "</head>";
                   echo "<body></body></html>";
	}


				
	mysql_close();



//UPDATE user SET pname = 'นายย', fname = 'กฤษฎา' , lname = 'หาดวรรณ์.' WHERE id_number = '1409800175525';

