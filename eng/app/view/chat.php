<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script>

$(document).ready(function(){
    $("#ChatText").keyup(function(e){
       if(e.keyCode== 13){
           var ChatText =$("#ChatText").val();
            $.ajax({
                
               type : 'POST',
               url : 'app/Controller/insertMessage.php',
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
               url : 'app/Controller/updateSignal.php',
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
            url : 'app/Controller/selectMessage.php',
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