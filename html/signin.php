<?php

	ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	
	if($user != null && $user != ""){
		header('Location: default.php'); 
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
   

    <title>สื่อการสอนออนไลน์</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/singup.css" rel="stylesheet">
	<link href="css/lesson.css" rel="stylesheet">
<link href="dist/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="dist/js/jquery-1.11.2.min.js"></script>
	
    <script src="dist/js/bootstrap.min.js"></script>
<script src="dist/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>


	<script>
	$(document).ready(function(){
		
$('#datetimepicker2').datepicker();
	loadform(1);


	});
	function loadform(isLogin){
		if(isLogin == 1){
			$("#formis").load("loginform.php");
		}else{
			$("#formis").load("signupform.php");
		}
	}
	</script>
        <style>
            #logo1{
                  font-size: 30px
            }#logo2{
                  font-size: 25px
            }
            @media only screen and (min-width: 768px){
           
               #logo1{
                    font-size: 50px
              
            }
             #logo2{
                    font-size: 40px
              
            }
            }
            
        </style>
  </head>

  <body  >
      <div class="container ">
<!--<div class="row">
    <div class="col-md-6"><img src="img/1040051153.png"></div>
  <div class="col-md-6">
      <div id="msform">


	 fieldsets 
		 progressbar 
			<ul class="nav nav-pills nav-justified">
      <li data-toggle="pill" role="presentation" class="active"><a onclick="loadform(1);" >ลงชื่อเข้าใช้</a></li>
      <li data-toggle="pill" role="presentation"><a onclick="loadform(0);">สมัครสมาชิก</a></li>
    </ul>
	<div id="formis"></div>

</div>
</div>
</div>-->
          
          
          <img src="img/1040051153.png" align="middle" style="display: block;       margin-left: auto;      margin-right: auto;">
          <div id="logo1" style="  font-family: Mahaniyom;  text-align: center; ">ยินดีต้อนรับเข้าสู่บทเรียนออนไลน์</div>
                    <div id="logo2" style="  font-family: Mahaniyom;   text-align: center;">รายวิชาเทคโนโลยีสารสนเทศและการสื่อสาร  รหัสวิชา ง 32102 </div>
             <div id="msform">


	<!-- fieldsets -->
		<!-- progressbar -->
			<ul class="nav nav-pills nav-justified">
      <li data-toggle="pill" role="presentation" class="active"><a onclick="loadform(1);" >ลงชื่อเข้าใช้</a></li>
      <li data-toggle="pill" role="presentation"><a onclick="loadform(0);">สมัครสมาชิก</a></li>
    </ul>
	<div id="formis"></div>
</div>
    </body>
    <?php 
include 'footer.php';
    ?>
</html>