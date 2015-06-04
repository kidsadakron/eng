<?php
include '../../config.php';
mysql_connect($host,$user,$pass);
mysql_select_db('testaa');
$goods_name = $_POST["goods-name-ed"];
$cost_unit = $_POST["cost-unit-ed"];
$goods_id = $_POST["goods-id-ed"];
$sqlStr = "UPDATE goods_name SET  goods_name = '".$goods_name."' , cost_unit = ".$cost_unit." WHERE  goods_id = '".$goods_id."'";

if(mysql_query($sqlStr) == TRUE){
    
     header("refresh:0; url=../index.php?page=stock");
}else{
    echo $sqlStr;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

