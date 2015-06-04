<?php
include '../model/Webboard.php';
session_start();
$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['user_id'];

if(isset($_POST["txtDetails"])){
    
    $Reply = new Reply();
    
    
    $Reply->setUserID($id_number);
    $Reply->setDetails($_POST["txtDetails"]);
     $Reply->setQuestionID($_GET["QuestionID"]);
    $Reply->insertReply();
   
    header("location:../../webboard/ViewWebboard.php?QuestionID=".$_GET["QuestionID"]);
    
}else{
    
}
