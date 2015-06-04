	<script>
	$(document).ready(function(){
		var checkEmail = 0;
		var checkId = 0;
		$('.datepicker').datepicker();
		$("[name='pass']").on("blur",function(){
						$("[name='pass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});			
		});
		$("[name='pname']").on("keyup",function(){
						$("[name='pname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});			
		});
		$("[name='fname']").on("keyup",function(){
						$("[name='fname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});			
		});
		$("[name='lname']").on("keyup",function(){
						$("[name='lname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});			
		});
		$("[name='phone']").on("keyup",function(){
						$("[name='phone']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});			
		});
		$("[name='cpass']").on("keyup",function(){
			
			var password = $("[name='pass']").val();
			var password2= $("[name='cpass']").val();
			if(password!= password2){
		
				$("[name='cpass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#f00"});													
			}else{
		
				$("[name='cpass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});					
			}
						
		});
		
		$("[name='email']").on("blur",function(){
			var email = $("[name='email']").val();
			var data = {email:email
				};  
		 
			$.ajax({
				url : "dist/selectUserByEmail.php",
				type: "POST",
				data : data,
				success: function(data, textStatus, jqXHR)
				{	
					var obj =  jQuery.parseJSON(data);
				
					if(obj.length == 0){
						checkEmail = 0;
						$("[name='email']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});
					}else{
						
						checkEmail= 1;
						$("[name='email']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
					}
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
			 
				}
			});
		});
		$("[name='id']").on("blur",function(){
			var id_number = $("[name='id']").val();
			var data = {id_number:id_number
				};  
			
			$.ajax({
				url : "dist/selectUserById.php",
				type: "POST",
				data : data,
				success: function(data, textStatus, jqXHR)
				{	
					var obj =  jQuery.parseJSON(data);
					
					if(obj.length == 0){
						checkId = 0;
						$("[name='id']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#4B73CB"});
					}else{
					
						checkId= 1;
						$("[name='id']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
					}
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
			 
				}
			});
		});
		/* 
Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 

*/
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$("#next2").click(function(){
	var pname = $("[name='pname']").val();
	var fname = $("[name='fname']").val();
	var lname = $("[name='lname']").val();
	if(pname != "" && fname != "" && lname != "" ){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	}else {
		if(pname == "" ){
			$("[name='pname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
		if(fname == ""){
		$("[name='fname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
		if(lname == ""){
		$("[name='lname']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"})
		}
	}
});
$("#next1").click(function(){
	var email = $("[name='email']").val();
	var password = $("[name='pass']").val();
	var password2= $("[name='cpass']").val();
	if(email != "" && password != "" && password2 != "" && checkEmail != 1){
		if(password == password2){
			if(animating) return false;
			animating = true;
			
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			
			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
			
			//show the next fieldset
			next_fs.show(); 
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50)+"%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({'transform': 'scale('+scale+')'});
					next_fs.css({'left': left, 'opacity': opacity});
				}, 
				duration: 800, 
				complete: function(){
					current_fs.hide();
					animating = false;
				}, 
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		}else{
			$("#passText").text("รหัสผ่านไม่ตรงกัน");
			$("[name='pass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
						$("[name='cpass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
	}else {
		if(email == "" ){
			$("[name='email']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
		if(password == ""){
		$("[name='pass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
		if(password2 == ""){
		$("[name='cpass']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"})
		}
												
	}
});
$("#previous1").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$("#previous2").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$(".submit").click(function(){
	var email = $("[name='email']").val();
	var password = $("[name='pass']").val();
	var pname = $("[name='pname']").val();
	var fname = $("[name='fname']").val();
	var lname = $("[name='lname']").val();
	var phone = $("[name='phone']").val();
	var id_number = $("[name='id']").val();
	var bday = $("[name='bday']").data('datepicker').getFormattedDate('yyyy-mm-dd');
	if(email != "" && password != "" && pname != "" && fname != "" && lname != "" && phone != "" && id_number != "" && checkEmail != 1 && checkId != 1  ){
		var data = {email:email,
					password:password,
					pname:pname,
					fname:fname,
					lname:lname,
					phone:phone,
					id_number:id_number,
					bday:bday
					};  
	 
		$.ajax({
			url : "dist/insertUser.php",
			type: "POST",
			data : data,
			success: function(data, textStatus, jqXHR)
			{
				if(data = "1"){
					alert("ท่านได้สมัครสมาชิกเรียนร้อยแล้วกรุณาเข้าสู่ระบบเพื่อใช้งาน");
					location.reload();
				}
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
		 
			}
		});	
	}else{
	
		if(phone == "" ){
			$("[name='phone']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
		if(id_number == "" ||checkId == 1 ){
		$("[name='id']").css({
												"border": "4px",
												"border-style": "solid",
												"border-color":"#F00"});
		}
	}
	
})



	});
	
	</script>
	<ul id="progressbar" style=" margin-top: 3px;">
		<li class="active">Account Setup</li>
		<li>Personal Details</li>
		<li>Personal Details</li>
		
	</ul>
	<fieldset>
	
		<h2 class="fs-title">สร้างบัญชีผู้ใช้</h2>
		Email
		<input type="text" name="email" placeholder="Email" />
		Password
		<input type="password" name="pass" placeholder="Password" />
		
		Confirm Password
		<input type="password" name="cpass" placeholder="Confirm Password" />
		<h2 class="fs-title" id="passText"></h2>
		<input type="button" name="next" id="next1" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">สร้างข้อมูลส่วนตัว</h2>
		คำนำหน้าชื่อ
		 <input type="text" name="pname" placeholder="คำนำหน้าชื่อ " />
		 ชื่อ
		<input type="text" name="fname" placeholder="ชื่อ" />
		นามสกุล
		<input type="text" name="lname" placeholder="นามสกุล" />
		
		
		<input type="button" name="previous" id="previous1" class="previous action-button" value="ย้อนกลับ" />
		<input type="button" name="next" id="next2" class="next action-button" value="ถัดไป" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">สร้างข้อมูลส่วนตัว</h2>
		เบอร์มือถือ
	<input type="text" name="phone" placeholder="เบอร์มือถือ" />
	รหัสบัตรประจำตัวประชาชน
		<input type="text" name="id" placeholder="รหัสบัตรประจำตัวประชาชน" />
		วันเกิด
		<input type="text" value="02/16/12" data-date-format="mm/dd/yy" name="bday" class="datepicker" >

		<input type="button" name="previous" id="previous2"  class="previous action-button" value="Previous" />
		<input type="button" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
	