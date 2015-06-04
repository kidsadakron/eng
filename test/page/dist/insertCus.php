<?php
include '../../config.php';
$cus_id = $_POST["cus-id"];
$cus_name = $_POST["cus-name"];

$sqlStr = "insert into cus_name (cus_id,cus_name) value ('".$cus_id."','".$cus_name."')";
$result = mysql_query($sqlStr);
if($result == true){
    header("Refresh:0; url=../index.php?page=cus");
}else{
      $sqlStr = "update cus_name set cus_name = '".$cus_name."' where cus_id = '".$cus_id."'";
    mysql_query($sqlStr);
     header("Refresh:0; url=../index.php?page=cus");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

