<?php
include '../../config.php';
mysql_connect("$host","$user","$pass");
mysql_select_db("testaa");
$goods_id = $_POST["good-id"];
$goods_name = $_POST["good-name"];
$cost_unit = $_POST["cost-unit"];
$sqlStr = "INSERT INTO goods_name (goods_id , goods_name , cost_unit) VALUES ('".$goods_id."', '".$goods_name."' , $cost_unit)";
 $objQuery = mysql_query($sqlStr);

			 if ($objQuery == TRUE) {
					
 header("Refresh:0; url=../index.php?page=stock");
					} else {
					$sqlStr = "UPDATE goods_name SET goods_name = '".$goods_name."' , cost_unit ='".$cost_unit."' WHERE goods_id = '".$goods_id."'";
                                        mysql_query($sqlStr);
                                       // echo $sqlStr;
                                        header("Refresh:0; url=../index.php?page=stock");
				 }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

mysql_close();