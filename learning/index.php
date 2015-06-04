<?php

	ob_start();
	session_start();
	$user = $_SESSION["dof_user"];
	if($user == null && $user == ""){
		header('Location: signin.php'); 
	}
	
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
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/lesson.css" rel="stylesheet">
	<link href="css/normal.css" rel="stylesheet">
        <link href="dist/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/jquery-1.11.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  

  </head>
 <script>

    function upStatus(){
        $.ajax({
                type: "GET",
                url: "dist/updateStudy.php",
                data: {"status":"2"},
                success: function(data, textStatus, jqXHR){
                    window.location.href = 'index.php?page=study&unit=0';
                }
            });
    }
    </script>
  <body>
	<?php include("menu.php"); ?>


	<?php 

	switch ($_GET["page"]) {
	case "study":
                 //$_SESSION["dof_unit"] = 0;
                 
                switch ($_GET["unit"]) {
		case "1":
                        $_SESSION["dof_unit"] = 1;
			if(checkRoom(1) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(1) == 2) {
                          
                            include("postTestLesson.php");
                        }
                        else{
                           include("menuTab.php");
                            include("data1.html");
                            
                               
			}
			
			break;
		case "2":
                        $_SESSION["dof_unit"] = 2;
			if(checkRoom(2) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(2) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data2.html");
			}
			
			break;
		case "3":
                         $_SESSION["dof_unit"] = 3;
			if(checkRoom(3) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(3) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data3.html");
			}
			break;

		case "4":
                         $_SESSION["dof_unit"] = 4;
			if(checkRoom(4) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(4) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data4.html");
			}
			break;

		case "5":
                        $_SESSION["dof_unit"] = 5;
			if(checkRoom(5) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(5) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data5.html");
			}
			break;

		case "6":
                        $_SESSION["dof_unit"] = 6;
			if(checkRoom(6) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(6) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data6.html");
			}
			
			break;

		case "7":
                        $_SESSION["dof_unit"] = 7;
			if(checkRoom(7) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(7) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data7.html");
			}
			break;

		case "8":
                        $_SESSION["dof_unit"] = 8;
			if(checkRoom(8) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(8) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data8.html");
			};
			break;

		case "9":
                        $_SESSION["dof_unit"] = 9;
			if(checkRoom(9) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(9) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data9.html");
			}
			break;

		case "10":
                    $_SESSION["dof_unit"] = 10;
			if(checkRoom(10) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(10) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data10.html");
			}
			break;

		case "11":
                    $_SESSION["dof_unit"] = 11;
			if(checkRoom(11) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(11) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data11.html");
			}
			break;

		case "12":
                    $_SESSION["dof_unit"] = 12;
			if(checkRoom(12) == 0){
				
				include("perTestLesson.php");
			}else if (checkRoom(12) == 2) {
                          
                            include("postTestLesson.php");
                        }else{
                             include("menuTab.php");
				include("data12.html");
			}
			break;

		

		default:
//                        $_SESSION["dof_unit"] = 0;
//			if(checkRoom(0) == 0){
//				
//				include("perTestRoom.php");
//			}else if (checkRoom(0) == 2) {
//                          
//                            include("postTestRoom.php");
//                        }else{
//				include("study_list.php");
//			}
//			
                    include("study_list.php");
                    
			break;
		}
                
                break;
        case "work":   
            //echo $_GET["page"];
            include("work.php");
            break;   
        case "contacts":   
            //echo $_GET["page"];
            include("contacts.php");
            break;  
        case "score":   
            //echo $_GET["page"];
            include("score.php");
            break; 
        case "account":   
            //echo $_GET["page"];
            include("settings/account.php");
            break; 
        default:

                    include("study_list.php");
                    
			break;
	}
	
	function checkRoom($unit){
		include("config.php");
		header("Content-Type: text/html;charset=UTF-8");
		mysql_connect($host,$username,$password);

		mysql_select_db("phol_dof");
	
			$user = $_SESSION["dof_user"];
			$data = json_decode($user, true);
			
			$id_number = $data[0]['id_number'];
		$strSQL = "SELECT * FROM `study` WHERE `id_number` = '".$id_number."' AND unit_id = ".$unit."";
			
				echo $strSQL;
		   mysql_query("SET NAMES utf8");
		$objQuery = mysql_query($strSQL);
			
			 if (mysql_num_rows($objQuery) > 0) {
                                $status ="";
                                while ($r = mysql_fetch_assoc($objQuery)) {
                                 $status = $r["status"];
                                }
				 return  $status;
			 }else{
				 return  0;
			 }
			 
	}
        
        function checkStudy($unit){
		include("config.php");
		header("Content-Type: text/html;charset=UTF-8");
		mysql_connect($host,$username,$password);

		mysql_select_db("phol_dof");
	
			$user = $_SESSION["dof_user"];
			$data = json_decode($user, true);
			
			$id_number = $data[0]['id_number'];
		$strSQL = "SELECT * FROM `study` WHERE `id_number` = '".$id_number."' AND unit_id = ".$unit." AND status = 2";
			
				echo $strSQL;
		   mysql_query("SET NAMES utf8");
		$objQuery = mysql_query($strSQL);
			
			 if (mysql_num_rows($objQuery) > 0) {
				 return  1;
			 }else{
				 return  0;
			 }
			 
	}
	?>
	
  </body>
     <?php 
include 'footer.php';
    ?>
</html>
