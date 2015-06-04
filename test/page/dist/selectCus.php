<?php

include '../../config.php';
$cus_id = $_POST["cus_id"];

$sqlStr = "SELECT * FROM cus_name WHERE cus_id = '".$cus_id."'";
$result = mysql_query($sqlStr);
$jsonResult="{";

while($r = mysql_fetch_assoc($result)){
    $jsonResult .= '"cus_id":"'.$r["cus_id"].'","cus_name":"'.$r["cus_name"].'"';
}
$jsonResult .="}";
echo $jsonResult;
//echo $sqlStr;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

