<?php
include '../../config.php';
$cus_id = $_GET["cus_id"];


$sqlStr = "delete from cus_name where cus_id =  '".$cus_id."'";
$result = mysql_query($sqlStr);
if($result == true){
    header("Refresh:0; url=../index.php?page=cus");
}else{
   
     header("Refresh:0; url=../index.php?page=cus");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

