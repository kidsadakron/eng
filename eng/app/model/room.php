<?php

class chat {
    private $userID,$chatContent,$date,$class;
    public function getUserID(){
        return $this->userID;
    }
    public function setUserID($userID){
        $this->userID = $userID;
    }
    public function getChatContent(){
        return $this->chatContent;
    }
    public function setChatContent($chatContent){
        $this->chatContent = $chatContent;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getClass(){
        return $this->class;
    }
    public function setClass($class){
        $this->date = $class;
    }
    
    public function insertMessage(){
       include("../../conn.php");
       $str = "INSERT INTO chat(user_id,content,class,date) VALUES('".$this->userID."','".$this->chatContent."','".substr($this->userID,0,2)."','".date("Y-m-d H:i:s")."')";
        $req=$conn->prepare($str);
        $req->execute(array(
            'user_id'=>  $this->getUserID(),
            'content'=>  $this->getChatContent(),
            'class'=> $this->getClass(),
            'date'=> $this->getDate()));
        echo $str;
    }
    public function selectMessage(){
        include("../../conn.php");
         $str = "SELECT * FROM chat AS a INNER JOIN user AS b ON a.user_id = b.user_id WHERE a.class = '".substr($this->userID,0,2)."' ORDER BY a.chat_id ASC";
         $req=$conn->prepare($str);
         $req->execute();
         echo '<div id="ChatMessage">';
         while($DataChat = $req->fetch()){
               
            ?>
<p> <span class="userNames"><?php echo $DataChat['user_id']; ?></span>
                <span class="userNames"><?php echo $DataChat['content']; ?></span></p>
                           <?php
         }
          echo '</div >';
    }
    
}
?>