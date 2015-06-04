<?php
include '../model/room.php';
session_start();
$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['user_id'];

if(isset($_POST["ChatText"])){
    $chat = new chat();
    $chat->setUserID($id_number);
    $chat->setChatContent($_POST["ChatText"]);
    $chat->insertMessage();
}
