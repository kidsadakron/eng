<script>
     var countWork = 0;
     var unit = <?php echo $_SESSION["eln_unit"];?>;
$(document).ready(function(){ 
   
    
    $.ajax({
        type: "POST",
        url: "../dist/selectUnit.php",
        cache: false,
        success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
            if(obj.length != 0){
                
		$(".topic").text("หน่วยที่ "+obj[0].unit_id+" "+obj[0].unit_name);
                $("#topic2").text("<?php  echo $_SESSION["eln_name"];?> ใบงานที่ "+obj[0].unit_id);
            }
         }                       
    });
   
    
     var data = {"unit":<?php echo $_SESSION["eln_unit"];?> 
                ,"id_number" : <?php echo $_SESSION["eln_id"];?>};  
      
      
 
    $.ajax({
        type: "POST",
        url: "../dist/selectWork.php",
        data : data,
        cache: false,
       
        success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
            var dataText = "";
          if(obj[0].work_answer_content.status == 0){
                        $("#btSubmit").replaceWith('<input id="edit-work" onclick="updateWork();" style="top: 120px;width: 100%;  background: #E89423;" class="pervadeTest" type="submit" name="submit" value="ส่ง">');  
                    }else if (obj[0].work_answer_content.status != 1){
                      $("#btSubmit").replaceWith('<input id="submit-work" onclick="insertWork();" style="top: 120px;width: 100%;" class="pervadeTest" type="submit" name="submit" value="ส่ง">');                            
               
                    }
            for(var i = 0 ; i < obj.length ; i++){
                
               countWork = obj[i].work_id;
              // alert(obj[i].work_answer_content.length);
                if(obj[i].work_answer_content.length >=0){
                      dataText+='<div class="panel panel-default"> <div><h1>เต็ม '+obj[i].max_score+' ได้ <input name="score-input'+obj[i].work_id+'" style="width: 54px;" min="0" max="'+obj[i].max_score+'" type="number" value="'+obj[i].work_answer_content.score+'"></h1></div><div class="panel-body" ><div class="bs-example" data-example-id="textarea-form-control"><h2>ข้อ '+obj[i].work_id+' '+obj[i].work_content+' </h2><div id="'+obj[i].work_id+'" rows="9" style="font-size: 25px;"placeholder="ตอบ"></div></div></div></div>';
                }else if(obj[i].work_answer_content.length == undefined){
                          
                     dataText+='<div class="panel panel-default"><div><h1>เต็ม '+obj[i].max_score+' ได้ <input name="score-input'+obj[i].work_id+'" style="width: 54px;" min="0" max="'+obj[i].max_score+'" type="number" value="'+obj[i].work_answer_content.score+'"></h1></div> <div class="panel-body" ><div class="bs-example" data-example-id="textarea-form-control"><h2>ข้อ '+obj[i].work_id+' '+obj[i].work_content+' </h2><div id="'+obj[i].work_id+'" rows="9" style="font-size: 25px;"placeholder="ตอบ"><h3 style="color:red ">ตอบ</h3>'+obj[i].work_answer_content.work_answer_content+'</div></div></div></div>';
                   
                  
                  
                                                  }
               
               
                           
            }
            $("#dataWork").replaceWith(dataText);
      
         }                       
    });
});

 function insertWork(){
        for(var i = 0 ; i < countWork ; i++){
          var content = $("#"+(i+1)).val();
          var score = $("input[name='score-input"+(i+1)+"']")
          var data = {"content":content,
                        "work_id":(i+1),
                        "id_number": <?php echo $_SESSION["eln_id"];?>
            };  

            $.ajax({
                url : "dist/updateScoreWorkAnswer.php",
                type: "POST",
                data : data,
                success: function(data, textStatus, jqXHR)
                    {	
                     
                       
                }
            });
            
               
        }
       
                                alert("ส่งใบงานเรียยร้อยแล้ว");
                               //window.location.href = "index.php?page=study&unit="+unit;
                           }   
 function updateWork(){
        for(var i = 0 ; i < countWork ; i++){
           var score = $("input[name='score-input"+(i+1)+"']").val();
          var data = {"score":score,
                        "work_id":(i+1),
                        "id_number": <?php echo $_SESSION["eln_id"];?>
            };  

            $.ajax({
                url : "../dist/updateScoreWorkAnswer.php",
                type: "POST",
                data : data,
                success: function(data, textStatus, jqXHR)
                    {	
                      alert(data);

                }
            });
            
               
        }
       
                                alert("ส่งใบงานเรียยร้อยแล้ว");
                               window.location.href = "index.php?page=study&unit="+unit;
                           }   
        
</script>

<div  style="margin-top: 50px;">

    <span  style="  vertical-align: middle;color: red;"><h1 class='topic'>วิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1> </span>
    <span   style=" vertical-align: middle;color: red;"><h1 class='topic' id="topic2">วิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1> </span>
    <div id="dataWork"></div>
    
        
        
          
      
        
           
    
    <div id="btSubmit"></div>

    </div>
   


	
