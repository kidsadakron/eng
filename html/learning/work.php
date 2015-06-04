<?php 
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number'];
?>
<script>
     var countWork = 0;
     var unit = <?php echo $_SESSION["eln_unit"];?>;
$(document).ready(function(){ 
   
    
    $.ajax({
        type: "POST",
        url: "dist/selectUnit.php",
        cache: false,
        success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
            if(obj.length != 0){
                
		$(".topic").text("หน่วยที่ "+obj[0].unit_id+" "+obj[0].unit_name);
                $("#topic2").text("ใบงานที่ "+obj[0].unit_id);
            }
         }                       
    });
   
    
    var data = {"unit":<?php echo $_SESSION["eln_unit"];?> 
                ,"id_number" : "<?php echo $id_number?>"};  
      
 
    $.ajax({
        type: "POST",
        url: "dist/selectWork.php",
        data : data,
        cache: false,
       
        success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
            var dataText = "";
          if(obj[0].work_answer_content.status == 0){
                        $("#btSubmit").replaceWith('<input id="edit-work" onclick="updateWork();" style="top: 120px;width: 100%;  background: #E89423;" class="pervadeTest" type="submit" name="submit" value="แก้ไข">');  
                    }else if (obj[0].work_answer_content.status != 1){
                      $("#btSubmit").replaceWith('<input id="submit-work" onclick="insertWork();" style="top: 120px;width: 100%;" class="pervadeTest" type="submit" name="submit" value="ส่ง">');                            
               
                    }
            for(var i = 0 ; i < obj.length ; i++){
                
               countWork = obj[i].work_id;
              // alert(obj[i].work_answer_content.length);
                if(obj[i].work_answer_content.length >=0){
                      dataText+='<div class="panel panel-default"> <div class="panel-body" ><div class="bs-example" data-example-id="textarea-form-control"><h2>ข้อ '+obj[i].work_id+' '+obj[i].work_content+' </h2><form><textarea class="form-control" id="'+obj[i].work_id+'" rows="9" style="font-size: 25px;"placeholder="ตอบ"></textarea></form></div></div></div>';
                }else if(obj[i].work_answer_content.length == undefined){
                          
                     dataText+='<div class="panel panel-default"> <div class="panel-body" ><div class="bs-example" data-example-id="textarea-form-control"><h2>ข้อ '+obj[i].work_id+' '+obj[i].work_content+' </h2><form><textarea class="form-control" id="'+obj[i].work_id+'" rows="9" style="font-size: 25px;"placeholder="ตอบ">'+obj[i].work_answer_content.work_answer_content+'</textarea></form></div></div></div>';
                   
                  
                  
                                                  }
               
               
                           
            }
            $("#dataWork").replaceWith(dataText);
      
         }                       
    });
});

 function insertWork(){
        for(var i = 0 ; i < countWork ; i++){
          var content = $("#"+(i+1)).val();
          var data = {"content":content,
                        "work_id":(i+1)
            };  

            $.ajax({
                url : "dist/insertWorkAnswer.php",
                type: "POST",
                data : data,
                success: function(data, textStatus, jqXHR)
                    {	
                     
                       
                }
            });
            
               
        }
       
                                alert("ส่งใบงานเรียยร้อยแล้ว");
                               window.location.href = "index.php?page=study&unit="+unit;
                           }   
 function updateWork(){
        for(var i = 0 ; i < countWork ; i++){
          var content = $("#"+(i+1)).val();
          var data = {"content":content,
                        "work_id":(i+1)
            };  

            $.ajax({
                url : "dist/updateWorkAnswer.php",
                type: "POST",
                data : data,
                success: function(data, textStatus, jqXHR)
                    {	
                    // alert(data);

                }
            });
            
               
        }
       
                                alert("ส่งใบงานเรียยร้อยแล้ว");
                               window.location.href = "index.php?page=study&unit="+unit;
                           }   
        
</script>
<div class="container content" style="margin-top: 50px;">
    <span  style="  vertical-align: middle;color: red;"><h1 class='topic'>วิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1> </span>
    <span   style=" vertical-align: middle;color: red;"><h1 class='topic' id="topic2">วิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1> </span>
    <div id="dataWork"></div>
    
        
        
          
      
        
           
    
    <div id="btSubmit"></div>

    </div>
   


	
