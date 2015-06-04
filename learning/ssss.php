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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="dist/js/jquery-1.11.2.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  

  </head>

  <body>
<script >

$(document).ready(function(){
    $.ajax({
    type: "POST",
    url: "dist/selectScoreAll.php",
    success: function(data, textStatus, jqXHR){
            var obj =  jQuery.parseJSON(data);
           // alert(data);
           var line = '<tbody id="score-tab">';
           for(var i = 0 ; i < obj.length ; i++){
              line += '<tr >'; 
               if(i == 0){ 
                 line += '<td>#</td>';  
               }else{
                   line += '<td>'+(i)+'</td>';  
               }
               
               line += '<td><a href="index.php?page=study&page="'+i+'>'+obj[i].unit_name+'</a></td>';
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
	
<div class="container content" style="padding-top: 50px;">
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="width: 5%">บทที่</th>
          <th style="width: 40%">ชื่อ</th>
          <th style="width: 15%">คะแนนก่อนเรียน</th>
          <th style="width: 15%">คะแนนใบงาน</th>
          <th style="width: 15%">คะแนนหลังเรียน</th>
        </tr>
      </thead>
      <tbody id="score-tab">
        <tr>
          <th scope="row">1</th>
          <td >Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
  
  </body>
</html>