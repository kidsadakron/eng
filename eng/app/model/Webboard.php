<?php
class Webboard {
 private $QuestionID,$CreateDate,$Question,$Details,$View,$Reply,$UserID;
 public function getQuestionID(){
     return $this->QuestionID;
 }
 public function setQuestionID($QuestionID){
     $this->QuestionID=$QuestionID;
 }
 public function getCreateDate(){
     return $this->CreateDate;
 }
 public function setCreateDate($CreateDate){
     $this->CreateDate=$CreateDate;
 }
 public function getQuestion(){
     return $this->Question;
 }
 public function setQuestion($Question){
     $this->Question=$Question;
 }
 public function getDetails(){
     return $this->Details;
 }
 public function setDetails($Details){
     $this->Details=$Details;
 }
 public function getUserID(){
     return $this->UserID;
 }
 public function setUserID($UserID){
     $this->UserID=$UserID;
 }
 public function getView(){
     return $this->View;
 }
 public function setView($View){
     $this->View=$View;
 }
 public function getReply(){
     return $this->Reply;
 }
 public function setReply($Reply){
     $this->Reply=$Reply;
 }

 
 public function insertWebboard(){
       include("../../conn.php");
       $str = "INSERT INTO webboard(CreateDate,Question,Details,user_id) VALUES('".date("Y-m-d H:i:s")."','".$this->getQuestion()."' , '".$this->getDetails()."','".$this->getUserID()."')";
        $req=$conn->prepare($str);
        $req->execute();


    }
 }
class Reply {
    private $QuestionID,$ReplyID,$CreateDate,$Details,$UserID;
    public function getQuestionID(){
        return $this->QuestionID;
    }  
    public function setQuestionID($QuestionID){
        $this->QuestionID=$QuestionID;
    }
    public function getCreateDate(){
        return $this->CreateDate;
    }
     public function setCreateDate($CreateDate){
        $this->CreateDate=$CreateDate;
    }
     public function getDetails(){
     return $this->Details;
 }
 public function setDetails($Details){
     $this->Details=$Details;
 }
 public function getUserID(){
     return $this->UserID;
 }
 public function setUserID($UserID){
     $this->UserID=$UserID;
 }
  public function getReplyID(){
     return $this->ReplyID;
 }
 public function setReply($ReplyID){
     $this->ReplyID=$ReplyID;
 }
  public function insertReply(){
       include("../../conn.php");
       $str = "INSERT INTO reply(CreateDate,QuestionID,Details,user_id) VALUES('". date("Y-m-d H:i:s")."' , '".$this->getQuestionID()."' ,'".$this->getDetails()."' ,'".$this->getUserID()."' )";
        $req=$conn->prepare($str);
        $req->execute();
        echo $str;
    }
}


/*
	$strSQL = "INSERT INTO reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = mysql_query($strSQL);
	

	$strSQL = "UPDATE webboard ";
	$strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$objQuery = mysql_query($strSQL);*/
 ?>


