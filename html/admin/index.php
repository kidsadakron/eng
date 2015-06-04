<?php

	ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	if($user == null && $user == ""){
		 header('Location: ../default.php'); 
	}
        if($_SESSION["eln_role"] != 0){
            header('Location: ../default.php'); 
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
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/lesson.css" rel="stylesheet">
	<link href="../css/normal.css" rel="stylesheet">
        <link href="../dist/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../dist/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../dist/js/jquery-1.11.2.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../dist/DataTables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>

  </head>
 <script>

 
    </script>
  <body>

      <div class="container content" style="font-size: 20px;padding-top: 20px">
      <div class="row ">
          <div class="col-md-2" >
                    <ul class="nav ">
                        <li role="presentation" class="active"><a href="../default.php">กลับหน้าแรก</a></li>
                        
                        <li role="presentation" class="active"><a href="index.php">รายชื่อทั้งหมด</a></li>
  <li role="presentation"><a href="index.php?tab=work">ตรวจบงาน</a></li>
   <li role="presentation" class="active"><a href="../dist/logout.php">ออกจากระบบ</a></li>
 
</ul>
              
              
          </div>
  <div class="col-md-10" style="border-left-style: outset;">

	<?php 
        
        switch ($_GET["tab"]) {
               
        case "scoreUser":   
           // echo '<div class="container content" style="padding-top: 50px;"></div>';
            $_SESSION["eln_id"]= $_GET["id"];
            $_SESSION["eln_name"]= $_GET["name"];
            include("score.php");
            break; 
        case "workUser":   
           // echo '<div class="container content" style="padding-top: 50px;"></div>';
            $_SESSION["eln_id"]= $_GET["id"];
            $_SESSION["eln_name"]= $_GET["name"];
            $_SESSION["eln_unit"]= $_GET["unit"];
            include("work.php");
            break; 
        case "work" :
             include("listWorkAll.php"); 
            break; 
        default :  
            //echo $_GET["page"];
            include("listUserAll.php"); 
            break; 
        }
        ?></div>
	</div></div>
  </body>
</html>
