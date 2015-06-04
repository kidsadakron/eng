
 <script>
        var dataQuestionData = [];
	var dataQuestion = [];
	
	var dataSave = [];
	var dataSaveC = [];
	var testCount = 1;
	$(document).ready(function(){
            $('.score').on('hidden.bs.modal', function () {
            $.ajax({
                type: "GET",
                url: "dist/updateStudy.php",
                data: {"status":"3"},
                success: function(data, textStatus, jqXHR){
                    window.location.href = 'index.php?page=study';
                }
            });
        });
            $("#submitQuestion").on("click",function(){
                var dataAnswer = "";
                for(var i = 0 ; i < 40 ;i++ ){
                    dataAnswer += dataQuestionData[i];
                }
                 $("#answer").replaceWith(dataAnswer);
            });
		selectQuestion(1,testCount);
		//$('#myModal').modal('show')
		$("#submitQuestion").css("visibility","hidden");
		$("#submitQuestion").on("click",function(){
			dataSave[testCount-1] = $( "input[name='question-c1']:checked" ).val();
				dataSave[testCount] = $( "input[name='question-c2']:checked" ).val();
				dataSaveC[testCount-1] = $( "input[name='question-c1']:checked" ).text();
				dataSaveC[testCount] = $( "input[name='question-c2']:checked" ).text();
			for(var i = 0 ; i < dataSave.length ; i++){
							$("#answer-"+dataQuestion[i]).text(dataSaveC[i]);
						}
	
		});

			$('#nextTest1').on("click",function(){
				dataSave[testCount-1] = $( "input[name='question-c1']:checked" ).val();
				dataSave[testCount] = $( "input[name='question-c2']:checked" ).val();
				dataSaveC[testCount-1] = $( "input[name='question-c1']:checked" ).text();
				dataSaveC[testCount] = $( "input[name='question-c2']:checked" ).text();
					if(testCount != 39){
						
						testCount += 2;
						selectQuestion(1,testCount);
					}
					if(testCount == 39){
						
						$("#submitQuestion").css("visibility","visible");
					}
					
				
				$('input[name="question-c1"]').prop('checked', false);
				$('input[name="question-c2"]').prop('checked', false);
				var $radios = $('input[name="question-c1"]');
				$radios.filter('[value="'+dataSave[testCount-1]+'"]').prop('checked', true);
				var $radios = $('input[name="question-c2"]');
				$radios.filter('[value="'+dataSave[testCount]+'"]').prop('checked', true);
			//	}
				
				//alert($( "input[name='question-c1']:checked" ).val());
				
			});
			$('.pervadeTest').on("click",function(){
				$("#submitQuestion").css("visibility","hidden");
					dataSave[testCount-1] = $( "input[name='question-c1']:checked" ).val();
				dataSave[testCount] = $( "input[name='question-c2']:checked" ).val();
				dataSaveC[testCount-1] = $( "input[name='question-c1']:checked" ).text();
				dataSaveC[testCount] = $( "input[name='question-c2']:checked" ).text();
				if(testCount != 1){
						
						testCount -= 2;
						selectQuestion(1,testCount);
					}
				
				
				var $radios = $('input[name="question-c1"]');
								$('input[name="question-c1"]').prop('checked', false);
				$('input[name="question-c2"]').prop('checked', false);
				$radios.filter('[value="'+dataSave[testCount-1]+'"]').prop('checked', true);
				var $radios = $('input[name="question-c2"]');
				$radios.filter('[value="'+dataSave[testCount]+'"]').prop('checked', true);
				
			});
		
	});
        function refresh(){
               $.ajax({
                type: "GET",
                url: "dist/updateStudy.php",
                data: {"status":"3"},
                success: function(data, textStatus, jqXHR){
                    window.location.href = 'index.php?page=study';
                }
            });
           
        }
	function insertTest(){
		var dataQuestionJson = JSON.stringify(dataQuestion);
			var dataSaveJson = JSON.stringify(dataSave);
			$.ajax({
				type: "POST",
				url: "dist/insertTest.php",
				data: {"dataQuestion" : dataQuestionJson
					,"dataSave" : dataSaveJson,
                                        "status" : "1"
				}, 
				cache: false,

				success: function(data1, textStatus, jqXHR){
					if(data1 == 1){
                                            $.ajax({
                                                type: "POST",
                                                data: {"status" : "0"}, 
                                                url: "dist/selectTestScore.php",
                                                
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
	function selectQuestion(unit , question_number) {
		var data = {unit:unit,
						question_number:question_number
				};  
		 
			$.ajax({
				url : "dist/selectQuestion.php",
				type: "POST",
				data : data,
				success: function(data, textStatus, jqXHR)
				{	
					var obj =  jQuery.parseJSON(data);
					//$("#question-t1").text(data);
                                        
					if(obj.length != 0){
                                             dataQuestion[testCount-1] = obj[0].question_id;
                                            dataQuestionData[testCount-1] = ' <tr> <td>ข้อ '+obj[0].question_number+ ' ' +obj[0].question_content+'</td><td id = "answer-'+obj[0].question_id+'"></td> </tr>';
                                            dataQuestion[testCount] = obj[1].question_id;
                                            dataQuestionData[testCount] = ' <tr> <td>ข้อ '+obj[1].question_number+ ' ' +obj[1].question_content+'</td><td id = "answer-'+obj[1].question_id+'"></td> </tr>';
						for(var i = 0 ; i < obj.length;i++){
							
							
								$("#question-t"+(i+1)).text("ข้อ "+obj[i].question_number+ " " +obj[i].question_content);
							var obj2 =  obj[i].question_choice_top;
							
							for(var j = 0 ; j < obj2.length;j++){
							$("#question-c"+(i+1)+"-c"+(j+1)).val(obj2[j].question_choice_id);
							$("#question-c"+(i+1)+"-c"+(j+1)).text(obj2[j].question_choice_content);
							$("#question-c"+(i+1)+"-"+(j+1)).text(" "+obj2[j].question_choice_content);
							
							}
							
						}
					}
	
				}
			});
	}
	
	
	</script>

</script>

<div class="container content" style="padding-top: 50px;">
<img width="100%" src="img/test2.jpg">
 
<div style="height: 75px;display: table;  width: 100%; ">
    <span style="display: table-cell;    vertical-align: middle;color: red;"><h1>วิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1> </span>
   <div><input class="nextTest" id="nextTest1" type="submit" style="float: right;" name="nextTest" value="ถัดไป">
  <input class="pervadeTest" type="submit" name="pervadeTest" value="ย้อนกลับ"></div>
  
  </div>
  

<div class="row container">

  <div class="col-md-6 question" style="border-left: none;">
		<h1 id="question-t1">t1</h1>
	<input type="radio" name="question-c1" value="" id="question-c1-c1"></input><span id="question-c1-1"></span>
	<br>
	<input type="radio" name="question-c1" value="" id="question-c1-c2"></input><span id="question-c1-2"> </span>
	<br>
	<input type="radio" name="question-c1" value="" id="question-c1-c3"></input><span id="question-c1-3"> </span>
	<br>
	<input type="radio" name="question-c1" value="" id="question-c1-c4"></input><span id="question-c1-4"> </span>
  </div>
  <div class="col-md-6 question" style="border-right: none;">
	<h1 id="question-t2">t2</h1>
	
	<input type="radio" name="question-c2" value="ก" id="question-c2-c1"></input><span id="question-c2-1"></span>
	<br>
	<input type="radio" name="question-c2" value="ข" id="question-c2-c2"></input><span id="question-c2-2"> </span>
	<br>
	<input type="radio" name="question-c2" value="ค" id="question-c2-c3"></input><span id="question-c2-3"></span>
	<br>
	<input type="radio" name="question-c2" value="ง" id="question-c2-c4"></input><span id="question-c2-4"> </span>
	
  </div>
  
	

</div> 





  <div class="modal fade score" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
        <h4 class="modal-title"><h1 style="text-align: center;color: red;">แบบทดสอบก่อนเรียนวิชาเครือข่ายคอมพิวเตอร์และอินเทอร์เน็ต </h1></h4>
      </div>
      <div class="modal-body">
      
		 <div>
            
            <h1 style="font-size: 60px;text-align: center;">ได้คะแนน <span id="score-text"></span> / เต็ม 40</h1>
        </div>
      </div>
      <div class="modal-footer">
         <button type="button" onclick="refresh();" class="btn btn-primary">ปิด</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


  <input class="nextTest" type="submit" id="submitQuestion" name="nextTest" style="width: 100%; visibility: visible; background: rgb(39, 102, 174);" value="ส่งคำตอบ" data-toggle="modal" data-target=".test">
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
                  <tbody id="answer"></tbody>
			</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">แก้ไข</button>
        <button type="button" onclick="insertTest();" class="btn btn-primary">ส่ง</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

