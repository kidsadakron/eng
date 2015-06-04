
<script>
	$(document).ready(function(){
		$("#signinBtx").on("click",function(){
			
			var data = {email:email,
						pass:pass
				};  
		 
			$.ajax({
				url : "dist/selectUserByEmail.php",
				type: "POST",
				data : data,
				success: function(data, textStatus, jqXHR)
				{	
					var obj =  jQuery.parseJSON(data);
					if(obj.length != 0){
						
					}
	
				}
			});
		});
	});
	</script>
<fieldset>
	<form action="dist/logins.php" method="POST">
			
			<input type="text" name="email" placeholder="E-mail หรือ  รหัสบัตรประจำตัวประชาชน" style="margin-top: 10px;"/>
		<input type="password" name="pass" placeholder="Password" />
		
		<input type="submit" id="signinBt" class="next action-button" value="เข้าสู่ระบบ" />
		</form>
	</fieldset>
	
		