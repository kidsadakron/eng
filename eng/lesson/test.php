<?php 
include("../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);
mysql_select_db("e_eng");
$user = $_SESSION["eng_user"];
$data = json_decode($user, true);
$user_id = $data[0]['user_id'];
$unit = $_GET["unit_id"];
$strSQL = "SELECT * FROM unit WHERE  unit_id = ".$unit."";
$objQuery = mysql_query($strSQL);
$unit_content = "";
while ($r = mysql_fetch_assoc($objQuery)) {
    $unit_content = $r["unit_content"];
}
?>
 <script>
       
 var dataAnswer = [];
	$(document).ready(function(){
            $("#submitQuestion").on("click",function(){
               
                for(var i = 0 ; i < 5 ;i++ ){
//                    var  dataAnswer = [];
                   var dataSave = $( "input[name='question-c"+(i+1)+"']:checked" ).val();
                    dataAnswer[i]= dataSave;
                    var dataSaveC = $("#question-c"+(i+1)+"-"+dataSave ).text();
                    $("#answer-"+(i+1)).text(dataSaveC);
                }
                $('.test').modal('show')
                // $("#answer").replaceWith(dataAnswer);
            });
	});
            function refresh(){
            location.reload();
        }
function insertTest(){
		//var dataQuestionJson = JSON.stringify(dataQuestion);
			var dataSaveJson = JSON.stringify(dataAnswer);
			$.ajax({
				type: "POST",
				url: "../app/Controller/insertTest.php",
				data: {"dataSave" : dataSaveJson,
                                        "status" : "1"
                                        ,"unit_id" : "<?php echo $_GET["unit_id"];?>"
                                        
				}, 
				cache: false,

				success: function(data1, textStatus, jqXHR){
					if(data1 == 1){
                                            $.ajax({
                                                type: "POST",
                                                data: {"status" : "1","unit_id" : "<?php echo $_GET["unit_id"];?>"}, 
                                                url: "../app/Controller/selectTestScore.php",
                                                
                                                cache: false,

                                                success: function(data, textStatus, jqXHR){
                                                        $('.test').modal('hide')
                                                        $("#score-text").text(data);
                                                        $('.score').modal('show')
                                                }
                                        });
                                        }
				}
			});
	}
	
	</script>


<div class="container content" style="padding-top: 50px;">

 
<div style="height: 75px;display: table;  width: 100%; ">
    <span style="display: table-cell;    vertical-align: middle;color: red;"><h2>แบบฝึกหัดเก็บคะแนน หน่วยที่ <?php echo $_GET["unit_id"]." ".$unit_content;?> </h2> </span>

  
  </div>
  
<div class="row container">
    <div class="col-md-6 question" style="border-left: none;">
  <?php 
        
            
          
            $i = 1;
            //mysql_query("SET NAMES utf8");
            mysql_query("SET NAMES utf8");
             $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = ".$unit." AND status = 1" ;
            $objQuery = mysql_query($strSQL);
            if(mysql_num_rows($objQuery) > 0){
               // echo $strSQL;
              header('Location: index.php'); 
            }else{
                //echo $strSQL;
            
            $strSQL = "SELECT * FROM question WHERE  unit_id = ".$unit."";
            $objQuery = mysql_query($strSQL);
          //  echo $strSQL."ss".$username;
                   // print_r($objQuery);
                    while ($r = mysql_fetch_assoc($objQuery)) {
//                    $row[] = $r;
                        if($i == 11){
                            echo '</div><div class="col-md-6 question" style="border-right: none;">';
                        }
                    echo '<h3 id="question-t'.$i.'">ข้อที่ '.$r["question_id"].' '.$r["question_content"].'</h3>';
                    $strSQL1 = "SELECT * FROM question AS a INNER JOIN question_choice AS b ON a.question_id = b.question_id  AND a.unit_id = b.unit_id WHERE b.unit_id = ".$unit." AND a.question_id  = ".$i."";

                    $objQuery1 = mysql_query($strSQL1);
			$row1 = array();
                        $j = 1;
			while ($r1 = mysql_fetch_assoc($objQuery1)) {
//				$row1[] = $r1;	
                            echo '<input type="radio" name="question-c'.$i.'" value="'.$r1["question_choice_id"].'" id="question-c'.$i.'-c'.$j.'"></input><span id="question-c'.$i.'-'.$j.'">'.$r1["question_choice_content"].'</span><br>';
                            $j++;
			}
                    $i++;
                    }
            }
        ?>
      </div>
    
	</div> 
  </div>
  
        <button style="width: 100%;" id="submitQuestion" type="submit" class="btn btn-lg btn-primary">ส่งคำตอบ</button>







  <div class="modal fade score" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title"><h1 style="text-align: center;color: red;">แบบฝึกหัดเก็บคะแนน หน่วยที่ <?php echo $_GET["unit_id"]." ".$unit_content;?> </h1></h4>
      </div>
      <div class="modal-body">
      
		 <div>
            
            <h1 style="font-size: 60px;text-align: center;">ได้คะแนน <span id="score-text"></span> / เต็ม 20</h1>
        </div>
      </div>
      <div class="modal-footer">
         <button type="button" onclick="refresh();" class="btn btn-primary">ปิด</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!--<button type="button" class="btn btn-lg btn-primary">Primary</button>
  <input class="nextTest" type="submit" id="submitQuestion" name="nextTest" style="width: 100%; visibility: visible; background: rgb(39, 102, 174);" value="ส่งคำตอบ" data-toggle="modal" data-target=".test">-->
    </div>

  
  

  
  <div class="modal fade test" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title">ใบคำตอบ</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
     
		  <thead>
			<tr>
			 <th>คำถาม</th>
			<th width="30%">คำตอบ</th>
			</tr>
		  </thead>
                  <tbody id="answer">
                      <?php 
                      
                        $strSQL = "SELECT * FROM question WHERE  unit_id = ".$unit."";
            $objQuery = mysql_query($strSQL);

                   // print_r($objQuery);
                    while ($r = mysql_fetch_assoc($objQuery)) {
//                    $row[] = $r;
                    echo '<tr> <td>ข้อ '.$r["question_id"]. ' '.$r["question_content"].'</td><td id = "answer-'.$r["question_id"].'"></td> </tr>';
                    // <tr> <td>ข้อ '.$r["question_number"]. ' '.$r["question_content"].'</td><td id = "answer-'.$r["question_id"].'"></td> </tr>
                    }
                      ?>
                      
                      
                  </tbody>
			</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">แก้ไข</button>
        <button type="button" onclick="insertTest();" class="btn btn-primary">ส่ง</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

