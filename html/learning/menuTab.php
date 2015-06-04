<script>
    $.ajax({
        type: "POST",
        url: "dist/selectStudy.php",
	cache: false,
        success: function(data, textStatus, jqXHR){
            if(data == 1){
                $("#postTestBt").css("visibility","hidden");
            }
					
	}
    });
    function upStatus(){
        $.ajax({
                type: "GET",
                url: "dist/updateStudy.php",
                data: {"status":"2"},
                success: function(data, textStatus, jqXHR){
                    window.location.href = 'index.php?page=study&unit='+<?php echo $_SESSION["eln_unit"];?>;
                }
            });
    }
    </script>
<input id="postTestBt" onclick="upStatus()" style="top: 70px;width: 150px;"class="btlogout" type="submit" name="submit" value="แบบทดสอบหลังเรียน">
<input onclick="location.href='index.php?page=work';" style="top: 120px;width: 150px;"class="btlogout" type="submit" name="submit" value="ใบงาน">