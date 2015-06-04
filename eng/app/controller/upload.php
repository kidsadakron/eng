
<?php
include("../../config.php");
header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");

mysql_select_db("e_eng");
ob_start();
	session_start();
	$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	$unit_id = $_SESSION["eng_unit"];
	$id_number = $data[0]['user_id'];
$target_dir = "../../uploads/";
$ext = pathinfo(basename($_FILES["fileUpload"]["name"]), PATHINFO_EXTENSION);
$target_file = $target_dir . $id_number."_".$unit_id.".".$ext;
echo $unit_id."kk<br>";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $ss = mb_convert_encoding($target_file, "UTF-8");
   echo $ss."ss".$_FILES["fileToUpload"]["name"]."<br>";

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        mysql_query("SET NAMES utf8");
 $strSQL = "INSERT INTO `work` (`unit_id`, `user_id`, `part`, `date`) VALUES ('".$unit_id."', '".$id_number."', '".$target_file."','".date("Y-m-d H:i:s")."');";
 $objQuery = mysql_query($strSQL);
 if ($objQuery === TRUE) {
     echo "<script>alert('ok');</script>";
 }else{
      echo "<script>alert('no');</script>";
 }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}