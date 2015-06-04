
<?php

include '../model/ClassRoom.php';
session_start();
$user = $_SESSION["eng_user"];
	$data = json_decode($user, true);
	
	$id_number = $data[0]['user_id'];

       
    $ClassRoom = new ClassRoom();
    $ClassRoom->setClassID(substr($id_number,0,2));
    $ClassRoom->setClassSignal($_POST["status"]);
    $ClassRoom->updateSignal();
    
   