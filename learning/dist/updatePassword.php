﻿<?php


include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("phol_dof");
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
$passOld = $_POST["pass-old"];
$passNew = $_POST["pass-new"];

$passNewCon = $_POST["pass-con-pass"];


$strSQL = "SELECT * FROM `user` WHERE (`email` = '".$id_number."' OR id_number = '".$id_number."') AND `password` = '".$passOld."' ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }
    
	if(mysql_num_rows($objQuery) > 0 ){
			if($passNew == $passNewCon){
                            
                             $strSQL = "UPDATE user SET password = '".$passNewCon."' WHERE id_number = '".$id_number."' AND password = '".$passOld."';";
                            $objQuery = mysql_query($strSQL);


                            if ($objQuery === TRUE) {
                                $strSQL = "SELECT * FROM `user` WHERE (`email` = '".$data[0]["email"]."' OR id_number = '".$data[0]["id_number"]."') AND `password` = '".$passNewCon."' ";
                            mysql_query("SET NAMES utf8");
                         $objQuery = mysql_query($strSQL);


                                 $row = array();
                                 while ($r = mysql_fetch_assoc($objQuery)) {
                                 $row[] = $r;

                                }

                                    $encoded =  json_encode($row);
                                    $unescaped = preg_replace_callback('/\\\\u(\w{4})/',enUtf8 , $encoded);
                                    $_SESSION["eln_user"] = $unescaped;
                                           //header('Location: ../index.php?page=account'); 
                                          // echo "<script type='text/javascript'> window.location.href = 'index.php?page=account'";
                                  echo "<!DOCTYPE html>";
                               echo "<head>";
                               echo "<title>Form submitted</title>";
                              //  echo "<script type='text/javascript'>alert('.$objQuery.');</script>";
                               echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                               echo "</head>";
                               echo "<body></body></html>";
                                   } else {
                                     echo "<!DOCTYPE html>";
                               echo "<head>";
                               echo "<title>Form submitted</title>";
                               echo "<script type='text/javascript'>alert('รหัสผ่านใหม่ไม่ตรงกัน');</script>";
                               echo "</head>";
                               echo "<body></body></html>";
                                    }
                            
                        }
                       
               
		
                    else{
                             echo "<!DOCTYPE html>";
                               echo "<head>";
                               echo "<title>Form submitted</title>";
                               echo "<script type='text/javascript'>alert('รหัสผ่านใหม่ไม่ตรงกัน');</script>";
                               echo "</head>";
                               echo "<body></body></html>";
                    }
        }else{
             echo "<!DOCTYPE html>";
                   echo "<head>";
                   echo "<title>Form submitted</title>";
                   echo "<script type='text/javascript'>alert('รหัสผ่านเดิมไม่ถูกต้อง');</script>";
                   echo "</head>";
                   echo "<body></body></html>";
        }


				
	mysql_close();

function enUtf8($matches) {
                                            return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
                                    }

//UPDATE user SET pname = 'นายย', fname = 'กฤษฎา' , lname = 'หาดวรรณ์.' WHERE id_number = '1409800175525';

