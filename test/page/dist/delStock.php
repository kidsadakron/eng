<?php
include '../../config.php';
mysql_connect($host,$user,$pass);
mysql_select_db('testaa');
$goos_id = $_GET["goods_id"];
$sqlStr = "DELETE FROM goods_name WHERE goods_id = ".$goos_id." ";
$sqlQuery = mysql_query($sqlStr);
if($sqlQuery == TRUE){
    header("Refresh:0; url=../index.php?page=stock");
}else{
    echo $sqlStr;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

