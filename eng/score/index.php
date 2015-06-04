<?php

	ob_start();
	session_start();
	$user = $_SESSION["eng_user"];
         if($user == null || $user == ""){
		header('Location: ../index.php'); 
            }
	
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>บทเรียนออนไลน์</title>

    <!-- Bootstrap core CSS -->
  
    <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../public/js/jquery-1.11.2.min.js" type="text/javascript"></script>

    <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>
    
  

  </head>
 <script>
</script>

  <body>
      <div class="container">
<div class="row">
        <div class="col-sm-2 ">
          
            <?php include '../menu.php';?>
            
          
        </div>
        <div class="col-sm-10 ">
<?php
//************ select pretest 
//SELECT COUNT(*) FROM test AS a INNER JOIN question AS b ON a.question_id = b.question_id  AND a.unit_id = b.unit_id WHERE a.question_choice_id = b.question_answer AND a.id_number = '".$id_number."' AND b.unit_id = ".$r[unit_id]." AND a.status = 0
?>
<table style="width:100%">
  <tr>
    <td>หน่วย</td>
    <td>ชื่อ</td>
    <td>คะแนนก่อนเรียน</td> 
    <td>คะแนนหลังเรียน</td>
  </tr>
  <tr>
    <td>#</td>
    <td> </td> 
    <td> </td> 
    <td> </td> 
  </tr>
  <tr>
    <td>1</td>
    <td>Personal Pronouns</td> 
    <td> **</td> 
    <td> **</td> 
  </tr>
  <tr>
    <td>2</td>
    <td>Possessive Pronouns and Reflexive Pronouns</td> 
    <td> **</td> 
    <td> **</td> 
  </tr>
  <tr>
    <td>3</td>
    <td>Indefinite Pronouns</td> 
    <td> **</td> 
    <td> **</td> 
  </tr>
  <tr>
    <td>4</td>
    <td>Demonstrative Pronouns</td> 
    <td> **</td> 
    <td> **</td> 
  </tr>
</table>
   </div>
        </div>
</div>
  </body>
     <?php include '../footer.php';?>
</html>