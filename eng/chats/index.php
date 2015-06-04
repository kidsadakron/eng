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
<script>

$(document).ready(function(){
    $("#ChatText").keyup(function(e){
       if(e.keyCode== 13){
           var ChatText =$("#ChatText").val();
            $.ajax({
                
               type : 'POST',
               url : '../app/Controller/insertMessage.php',
               data : {"ChatText" : ChatText},
              success: function(data1, textStatus, jqXHR){
                  
                   $("#ChatText").val("");
               }
            });
        }
       
      
    });
     $("#teaherCall").on("click",function(){
          $.ajax({
                
               type : 'POST',
               url : '../app/Controller/updateSignal.php',
               data : {"status" : "1"},
              success: function(data1, textStatus, jqXHR){
                  
//                  alert(data1);
               }
            });
     });
    chatUpdate();
    setInterval(chatUpdate, 1000);
    
});
function chatUpdate(){
     $.ajax({
            type : 'POST',
            url : '../app/Controller/selectMessage.php',
           // data : {"ChatText" : ChatText},
            success: function(data1, textStatus, jqXHR){
                  
                     $("#ChatMessage").replaceWith(data1);
               }
            });
}
</script>
<div id="chatBig">
    <div id="ChatMessage"></div>
<textarea id="ChatText" name="ChatText"></textarea></div>

<div id="teaherCall">ขอให้ครูเข้าร่วมพูดคุย</div>

   </div>
        </div>
</div>
  </body>
     <?php include '../footer.php';?>
</html>