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
       
         $data = json_decode($user, true);
         $id_number = $data[0]['name'];
         $data = json_decode($user, true);
         $id_number = $data[0]['name'];
         //******************** test **************
        switch ($_GET["test"]) {
        case "1": 
            $_GET["unit_id"] = "1";
            include("test.php");
            break;
        case "2": 
            $_GET["unit_id"] = "2";
            include("test.php");
            break;
        case "3": 
            $_GET["unit_id"] = "3";
            include("test.php");
            break;
        case "4": 
            $_GET["unit_id"] = "4";
            include("test.php");
            break;
         case "0":
               
                 if (checkRoom(0) == 1 && checkRoom(4) == 1) {
                    include("postTestRoom.php");
                }else{
                     include("lesson_list.php");
                }
                break;
        }
         switch ($_GET["work"]) {
        case "1": 
            
            $_GET["unit_id"] = "1";
            $_SESSION["eng_unit"] = "1";
            include("work.php");
            break;
        case "2": 
            $_GET["unit_id"] = "2";
            $_SESSION["eng_unit"] = "2";
            include("work.php");
            break;
        case "3": 
            $_GET["unit_id"] = "3";
            $_SESSION["eng_unit"] = "3";
            include("work.php");
            break;
        case "4": 
            $_GET["unit_id"] = "4";
            $_SESSION["eng_unit"] = "4";
            include("work.php");
            break;
        }
        if(!isset($_GET["test"])&&!isset($_GET["work"])){
            switch ($_GET["unit"]) {	
            case "1":
                include '../public/data/unit1.html';
                echo '<div>';
                if(checkRoom(1) == 1){
                    //http://localhost/eng/index.php?test=1
                       echo '  <a style="width: 49%;" href="index.php?test=1" disabled="disabled" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
            
                }else{
                    echo '  <a style="width: 49%;"  href="index.php?test=1" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
                }
                
                echo '<a style="width: 49%;"  href="index.php?work=1"  class="btn btn-lg btn-warning">กิจกรรมประจำบท</a>';
            echo '</div>';
                break;
            case "2":
                include '../public/data/unit2.html';
                echo '<div>';
                if(checkRoom(2) == 1){
                    //http://localhost/eng/index.php?test=1
                       echo '  <a style="width: 49%;" href="index.php?test=2" disabled="disabled" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
            
                }else{
                    echo '  <a style="width: 49%;"  href="index.php?test=2" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
                }
                
                echo '<a style="width: 49%;" href="index.php?work=2"   class="btn btn-lg btn-warning">กิจกรรมประจำบท</a>';
            echo '</div>';
                break;
            case "3":
                include '../public/data/unit3.html';
                echo '<div>';
                if(checkRoom(3) == 1){
                    //http://localhost/eng/index.php?test=1
                       echo '  <a style="width: 49%;" href="index.php?test=3" disabled="disabled" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
            
                }else{
                    echo '  <a style="width: 49%;"  href="index.php?test=3" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
                }
                
                echo '<a style="width: 49%;" href="index.php?work=3"   class="btn btn-lg btn-warning">กิจกรรมประจำบท</a>';
            echo '</div>';
                break;
            case "4":
                include '../public/data/unit4.html';
                echo '<div>';
                if(checkRoom(4) == 1){
                    //http://localhost/eng/index.php?test=1
                       echo '  <a style="width: 49%;" href="index.php?test=4" disabled="disabled" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
            
                }else{
                    echo '  <a style="width: 49%;"  href="index.php?test=4" class="btn btn-lg btn-primary">แบบฝึกหัดท้ายบท</a>';
                }
                
                echo '<a style="width: 49%;" href="index.php?work=4"   class="btn btn-lg btn-warning">กิจกรรมประจำบท</a>';
            echo '</div>';
                break;
           
            default:
                $_SESSION["eln_unit"] = 0;
                if(checkRoom(0) == 0){
                    include("perTestRoom.php");
		}else{
                    
                    include("lesson_list.php");
		}
		break;
		}
        }
        
       
          ?>
           
          </div>
        </div>
</div>
  </body>
     <?php include '../footer.php';?>
</html>

<?php 
function checkRoom($unit){
		include("../config.php");
		header("Content-Type: text/html;charset=UTF-8");
		mysql_connect($host,$username,$password);

		mysql_select_db("e_eng");
	
			$user = $_SESSION["eng_user"];
			$data = json_decode($user, true);
			
			$user_id = $data[0]['user_id'];
		$strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = ".$unit."";
			
				
		   mysql_query("SET NAMES utf8");
		$objQuery = mysql_query($strSQL);
			
			 if (mysql_num_rows($objQuery) > 0) {
                                $status ="";
                                while ($r = mysql_fetch_assoc($objQuery)) {
                                 $status = $r["status"];
                                }
				 return  $status;
			 }else{
                           //  echo $strSQL;
				 return  0;
			 }
			 
	}
?>