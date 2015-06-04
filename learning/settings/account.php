<?php 
include("config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect($host,$username,$password);


        ob_start();
	session_start();
	$user = $_SESSION["eln_user"];
     	 
	$data = json_decode($user, true);
mysql_select_db("phol_eln");


$strSQL = "SELECT * FROM `user` WHERE (`email` = '".$data[0]["email"]."' OR id_number = '".$data[0]["id_number"]."')  ";
   mysql_query("SET NAMES utf8");
$objQuery = mysql_query($strSQL);
    
	
 	$row = array();
	while ($r = mysql_fetch_assoc($objQuery)) {
    	$row[] = $r;
		
    }

			$encoded =  json_encode($row);
			$unescaped = preg_replace_callback('/\\\\u(\w{4})/',enUtf8, $encoded);
			$_SESSION["eln_user"] = $unescaped;
                       

			//echo "<script type='text/javascript'> window.location.href = 'default.php'";
		
	


				
	mysql_close();

     
		$user = $_SESSION["eln_user"];
     	 
	$data = json_decode($user, true);
	$bday = date_create( $data[0]['bday']);

        $fbday = date_format($bday, 'j-M-Y');
	
		 function enUtf8($matches) {
				return html_entity_decode('&#x' . $matches[1] . ';', ENT_COMPAT, 'UTF-8');
			}
			
?>

<script>
    var edNameOpenCheck = 0;
    var edPassOpenCheck = 0;
    var edPhoneOpenCheck = 0;
    var edBdayOpenCheck = 0;
$(document).ready(function(){
    $('.datepicker').datepicker();
    $('#name-form').attr("autocomplete","off");
   // setTimeout('$("input[name="pass"]").val("");', 2000);
});
function edNameOpen(){
    if(edNameOpenCheck == 0){
         $("#nameold").text("");
         $("#name-form").css("display","inline");
         edNameOpenCheck= 1;
    }else{
        $("#nameold").text("<?php echo $data[0]['pname'].$data[0]['fname'].'  '.$data[0]['lname']; ?>");
         $("#name-form").css("display","none");
         edNameOpenCheck= 0;
    }
    
    
}
function edPassOpen(){

    if(edPassOpenCheck == 0){
        $("#passold").text("");
        $("#pass-form").css("display","inline");
         edPassOpenCheck= 1;
    }else{
        $("#passold").text("************");
         $("#pass-form").css("display","none");
         edPassOpenCheck= 0;
    }
        
    
    
}
function edPhoneOpen(){

    if(edPhoneOpenCheck == 0){
        $("#phoneold").text("");
        $("#phone-form").css("display","inline");
         edPhoneOpenCheck= 1;
    }else{
        $("#phoneold").text("<?php echo $data[0]['phone']; ?>");
         $("#phone-form").css("display","none");
         edPhoneOpenCheck= 0;
    }    
}
function edBdayOpen(){

    if(edBdayOpenCheck == 0){
    $("#bdayold").text("");
    $("#bday-form").css("display","inline");
         edBdayOpenCheck= 1;
    }else{
        $("#bdayold").text("<?php echo $fbday; ?>");
         $("#bday-form").css("display","none");
         edBdayOpenCheck= 0;
    }        
}
</script>
<div class="container content" style="margin-top: 50px">
        <h1>ข้อมูลบัญชี</h1>
 <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<div class="panel panel-default">
  <div class="panel-body">
    <table class="table table-hover" style="    border-bottom: 1px solid #ddd;  margin-bottom: 0px;">
 
      <tbody id="score-tab">
       <tr>
          <td style="  width: 25%">ชื่อ</td>
          <td style="width: 60%"><span id="nameold"><?php echo $data[0]['pname'].$data[0]['fname'].'  '.$data[0]['lname']; ?></span>
          
              <form class="navbar-form navbar-left " action="dist/updateName.php" id="name-form" autocomplete="off" style="display: none  " method="post" target="iframe_target">
                  
               <div>
                   <input style="font-size: 22px;" type="text" name="pname" placeholder="คำนำหน้าชื่อ " value="<?php echo $data[0]['pname'] ?>" class="form-control"/> </div>
                  <div class="form-group">
                      <input style="font-size: 22px;" type="text" name="fname" placeholder="ชื่อ" value="<?php echo $data[0]['fname'] ?>" class="form-control"/> </div>
		 <div class="form-group">
                     <input style="font-size: 22px;" type="text" name="lname" placeholder="นามสกุล" value="<?php echo $data[0]['lname']; ?>" autocomplete="off" class="form-control"/> </div>
                <input style="font-size: 22px;" type="password" name="pass-con-name" placeholder="ยืนยัน ผ่านอีกครั้ง" autocomplete="off"  class="form-control"/>
		
                 <button type="submit" class="btn btn-success">ยืนยัน</button>
               </form>
             </td>
             <td style="text-align: right; width: 15%"><button type="submit" class="btn btn-warning" onclick="edNameOpen()" style="  font-family: initial;">แก้ไข</button></td>
          
        </tr>
         <tr>
          <td style="  width: 25%">รหัสผ่าน</td>
          <td style="width: 60%"><span id="passold">************</span>
              
           <form class="navbar-form navbar-left "  id="pass-form" autocomplete="off" style="display: none  " action="dist/updatePassword.php" method="post" target="iframe_target">
              
                   <div><input style="font-size: 22px;" type="password" name="pass-old" placeholder="ผ่านเดิม" autocomplete="off"  class="form-control"/></div>
                   <div><input style="font-size: 22px;" type="password" name="pass-new" placeholder="ผ่านใหม่" autocomplete="off"  class="form-control"/></div>
                   <div><input style="font-size: 22px;" type="password" name="pass-con-pass" placeholder="ยืนยัน ผ่านใหม่อีกครั้ง" autocomplete="off"  class="form-control"/></div>
			<button type="submit" class="btn btn-success">ยืนยัน</button>
             
               </form>
          </td>
          <td style="text-align: right; width: 15%">  <button type="submit" class="btn btn-warning" onclick="edPassOpen()" style="  font-family: initial;">แก้ไข</button></td>
          
        </tr>
        <tr>
          <td style="  width: 25%">เลขบัตรประจําตัวประชาชน</td>
          <td style="width: 60%"><?php echo substr($data[0]['id_number'],0,9); ?>***</td>
          <td style="text-align: right; width: 15%"></td>
          
        </tr>
        <tr>
          <td style="  width: 25%">E-mail</td>
          <td style="width: 60%"><?php echo $data[0]['email']; ?></td>
          <td style="text-align: right; width: 15%"></td>
          
        </tr>
        <tr>
          <td style="  width: 25%">หมายเลขโทรศัพท์
          
          </td>
          <td style="width: 60%"><span id="phoneold"><?php echo $data[0]['phone']; ?></span>
          
          <form class="navbar-form navbar-left "  id="phone-form" autocomplete="off" style="display: none  " action="dist/updatePhone.php" method="post" >
              
              <div><input style="font-size: 22px;" type="tel" name="phone" placeholder="เบอร์โทนศัพท์" value="<?php echo $data[0]['phone']; ?>" autocomplete="off"  class="form-control"/></div>
                   <div><input style="font-size: 22px;" type="password" name="pass-con-phone" placeholder="ยืนยันผ่านอีกครั้ง" autocomplete="off"  class="form-control"/></div>
			<button type="submit" class="btn btn-success">ยืนยัน</button>
             
               </form>
          </td>
          <td style="text-align: right; width: 15%"><button type="submit" class="btn btn-warning" onclick="edPhoneOpen()" style="  font-family: initial;">แก้ไข</button></td>
          
        </tr>
         <tr>
          <td style="  width: 25%">วันเกิด</td>
          <td style="width: 60%"><span id="bdayold"><?php echo $fbday; ?></span>
              <form class="navbar-form navbar-left "  id="bday-form" autocomplete="off" style="display: none  " action="dist/updateBday.php" method="post" >
              
              <div>   <input  style="font-size: 22px;"  type="text"  data-date-format="dd-M-yyyy" name="bday" class="datepicker form-control" value="<?php echo $fbday; ?>" ></div>
                   <div><input style="font-size: 22px;" type="password" name="pass-con-bday" placeholder="ยืนยันผ่านอีกครั้ง" autocomplete="off"  class="form-control"/></div>
			<button type="submit" class="btn btn-success">ยืนยัน</button>
             
               </form>
       
          
          </td>
           <td style="text-align: right; width: 15%"><button type="submit" class="btn btn-warning" onclick="edBdayOpen()" style="  font-family: initial;">แก้ไข</button></td>
          
        </tr>
        
      </tbody>
    </table>
  </div>
</div>
</div>