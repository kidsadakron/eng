<?php 
ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['id_number']
?>
<script >

$(document).ready(function(){
    $.ajax({
    type: "POST",
    data:{id_number : '<?php echo $id_number; ?> '},
    url: "dist/selectScoreAll.php",
    success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
           // alert(data);
           var line = '<tbody id="score-tab">';
           for(var i = 0 ; i < obj.length ; i++){
              line += '<tr >'; 
               if(i == 0){ 
                 line += '<td>#</td>';  
                 line += '<td><a href="index.php?page=study">'+obj[i].unit_name+'</a></td>';
               }else{
                   line += '<td>'+(i)+'</td>';  
                   line += '<td><a href="index.php?page=study&unit='+i+'">'+obj[i].unit_name+'</a></td>';
               }
               
               
               if(i == 0){ 
                   if(obj[i].pertest == "-1"){
                       line += '<td style="background: khaki;">ยังไม่ได้ทดสอบ</td>';
                   }else{
                       line += '<td >'+obj[i].pertest+'/40</td>';
                   }
               }else{
                   if(obj[i].pertest == "-1"){
                       line += '<td style="background: khaki;">ยังไม่ได้ทดสอบ</td>';
                   }else{
                       line += '<td >'+obj[i].pertest+'/10</td>';
                   }               
               }
               
                if(obj[i].work == "-1"){
                   line += '<td style="background: khaki;">ยังไม่ได้ทำใบงาน</td>';
               }else if(obj[i].work == "-2"){
                   line += '<td style="background: khaki;">รอตรวจ</td>';
               }else{
                   line += '<td >'+obj[i].work+'/10</td>';
               }
               if(i == 0){ 
                    if(obj[i].posttest == "-1"){
                        line += '<td style="background: khaki;">ยังไม่ได้ทดสอบ</td>';
                    }else{
                        line += '<td >'+obj[i].posttest+'/40</td>';
                    }
               }else{
                    if(obj[i].posttest == "-1"){
                        line += '<td style="background: khaki;">ยังไม่ได้ทดสอบ</td>';
                    }else{
                        line += '<td >'+obj[i].posttest+'/10</td>';
                    }
               }
              
               
//          '<td>Otto</td>'+
//         '<td>dsd</td>'+
//         '<td>Mark</td>'+                      
//         
                line += '</tr>';
               
           }
           $("#score-tab").replaceWith(line+'</tbody>');
        }
    });
});

</script>
	
<div class="container content" style="padding-top: 50px; top:0px">
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-hover" style=" text-align: center;">
      <thead>
        <tr>
          <th style="text-align: center; width: 5%">บทที่</th>
          <th style="text-align: center; width: 40%">ชื่อ</th>
          <th style="text-align: center; width: 15%">คะแนนก่อนเรียน</th>
          <th style=" text-align: center;width: 15%">คะแนนใบงาน</th>
          <th style="text-align: center; width: 15%">คะแนนหลังเรียน</th>
        </tr>
      </thead>
      <tbody id="score-tab">
      
      </tbody>
    </table>
  </div>
</div>
</div>
  