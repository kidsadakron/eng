  <?php

	ob_start();
	session_start();

	
?>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="default.php">บทเรียนออนไลน์</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="study" ><a  href="index.php?page=study">เข้าเรียน</a></li>
            <li id="score"><a href="index.php?page=score">ดูคะแนน</a></li>
<!--            <li  id="account"><a href="index.php?page=account">ข้อมูลส่วนตัว</a></li>
			<li id="contacts"><a href="index.php?page=contacts">ติดต่อครูผู้สอน</a></li>-->
          </ul>
		  <ul class="nav navbar-nav navbar-right">
               <li><a style="color: white;" id = "name-user"></a></li>
			   <li><a href="dist/logout.php" id="menu-logout">ออกจากระบบ</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
<script>
	$(document).ready(function(){
		var data = '<?php echo $user;?>';
		var obj = jQuery.parseJSON(data);
		$("#name-user").text(obj[0].pname+""+obj[0].fname+" "+obj[0].lname);	
		var page = "#<?php echo $_GET["page"]; ?>";
		 $(".nav").find(".active").removeClass("active");
		$(page).addClass("active");
	
	});
</script>