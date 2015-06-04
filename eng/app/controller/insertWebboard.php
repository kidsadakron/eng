<?php
include '../model/Webboard.php';
session_start();
$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['user_id'];

if(isset($_POST["txtQuestion"])&&isset($_POST["txtDetails"])){
    $Webboard = new Webboard();
    
    $Webboard->setUserID($id_number);
    $Webboard->setDetails($_POST["txtQuestion"]);
     $Webboard->setQuestion($_POST["txtDetails"]);
    $Webboard->insertWebboard();
    header("location:../../index.php?page=webboard");
    
}else{
    
}
