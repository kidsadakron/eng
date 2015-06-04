<?php
include '../../config.php';
$goods_id = $_POST["goods-id"];
$sqlStr = "SELECT * FROM goods_name WHERE goods_id = '".$goods_id."'";
$result = mysql_query($sqlStr);
$jsonResult ="{";
while($r = mysql_fetch_assoc($result)){
    $jsonResult .= '"goods_id":"'.$r["goods_id"].'","goods_name":"'.$r["goods_name"].'","cost_unit":"'.$r["cost_unit"].'"';
}
$jsonResult .="}";

echo $jsonResult;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

