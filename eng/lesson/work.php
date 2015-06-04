

<h2>กิจกรรมกลุ่ม หน่วยที่ <?php echo $_GET["unit_id"];?></h2>
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
$work_content = "";
while ($r = mysql_fetch_assoc($objQuery)) {
    $work_content = $r["work_content"];
}
echo "<p>".$work_content."</p>";


?>

<form action="../app/Controller/upload.php" method="post" enctype="multipart/form-data" name="form1" class="form-inline"  target="upload_target">
 <div class="form-group">
      <label for="exampleInputName2">เลือกไฟล์กิจกรรมที่ต้องการส่ง:</label>
      </div>
     <div  class="form-group">
     <input type="file" name="fileUpload">
     </div>
    <div  class="form-group">
<input type="submit" name="Submit" value="Submit">
</div>
</form>

<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>     
 
<?php
$strSQL = "SELECT * FROM work WHERE  user_id like '".substr($user_id,0,2)."%' AND unit_id = ".$unit."";
$objQuery = mysql_query($strSQL);
$part ="";
$user_work = "";
$date_work = "";
while ($r = mysql_fetch_assoc($objQuery)) {
    $part = $r["part"];
    $user_work = $r["user_id"];
    $date_work = $r["date"];
            
   
}
if($part !== ""){
    echo "<div style='border: 5px solid #F66; padding : 5px;'> มีรายงานที่สมาชิกกลุ่มส่งมาแล้ว <br> ผู้ส่ง : ".$user_work."<br> ไฟล์ที่ส่ง : ".$part."<br> ส่งเมือเวลา : ".$date_work."</div>";
}
 
?>