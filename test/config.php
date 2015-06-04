<?php
$host = "localhost";
$user = "root";
$pass = "1234";
mysql_connect($host,$user,$pass);
mysql_select_db('testaa');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 
 <input type="button" name="print" value="พิมพ์จ้า" onclick="window.print()">

แนะนำเทคนิคหนึ่งครับ
หากต้องการแบ่งการ Print ออกเป็นแต่ละหน้า สามารถแทรก Script 

<div style="page-break-after: always"></div>
 */

