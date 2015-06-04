<?php

	ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
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
    <link rel="icon" href="../../favicon.ico">

    <title>สื่อการสอนออนไลน์</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/normal.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  
<script>

	$(document).ready(function(){
		var data = '<?php echo $user;?>';
		var obj = jQuery.parseJSON(data);
		//alert(obj[0].pname+""+obj[0].fname+" "+obj[0].lname);
		$("#text-name").text(obj[0].pname+""+obj[0].fname+" "+obj[0].lname);
		$(".btlogout").on("click",function(){
				
		});
                if(obj[0].role == 0 ){
                    $("#admin-mode").css("display","");
                } 
	});
</script>
  </head>

  <body>
  

<div >
        <div class="home1" style="z-index: -1;">
			<a href="index.php?page=study" >
				<div class = "home1-b">
					<div class = "title-menu"> 
						<h1>เข้าเรียน</h1>
					
					</div>
				</div>
			</a>
		</div>
        <div class="home2" style="z-index: -1;"  >
            <a href="index.php?page=score" >
			<div class = "home1-b">
				<div class = "title-menu"> 
					<h1>ดูคะแนน</h1>
				
				</div>				
			</div>
                </a>
		</div>
        <div class="home3" style="z-index: -1;" >
             <a href="index.php?page=account" >
			
			<div class = "home1-b">
				<div class = "title-menu"> 
					<h1>ข้อมูลส่วนตัว</h1>
				
				</div>				
			</div>
             </a>
		</div>
		<div class="home4" style="z-index: -1;" >
                     <a href="index.php?page=contacts" >
			<div class = "home1-b">
				<div class = "title-menu"> 
					<h1>ติดต่อครูผู้สอน</h1>
				
				</div>				
			</div>
                         </a>
		</div>
		</div>
<form action="dist/logout.php" method="POST"> 	<input class="btlogout" type="submit" name="submit" class="submit action-button" value="ออกจากระบบ" /><span class="text-name" id="text-name" >ssssss</span></form>
<form action="admin/" method="POST"> <input id="admin-mode" type="submit"  style=" display: none; width: 120px;  right: 5px; margin-top: 60px;" class="btlogout" value="สำหรับครูผู้สอน"/></form>
  </body>
</html>
