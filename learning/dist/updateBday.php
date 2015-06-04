<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_eln");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
        //22-Apr-2015
$d = strtolower($_POST["bday"])."";
$fbday =      date_create($d );  
  $bday =  date_format($fbday, 'Y/m/d');   
$password = $_POST["pass-con-bday"];


$strSQL = "SELECT * FROM `user` WHERE (`email` = '".$id_number."' OR id_number = '".$id_number."') AND `password` = '".$password."' ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
	if(mysql_num_rows($objQuery) > 0){
			
                $strSQL = "UPDATE user SET bday = '".$bday."' WHERE id_number = '".$id_number."' AND password = '".$password."';";
                $objQuery = mysql_query($strSQL);


                if ($objQuery === TRUE) {
                               header('Location: ../index.php?page=account'); 
                              // echo "<script type='text/javascript'> window.location.href = 'index.php?page=account'";
                   
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

