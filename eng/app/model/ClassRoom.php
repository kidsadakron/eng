<?php

class ClassRoom{
    private $class_id,$class_signal;
    public function getClassID(){
        return $this->class_id;
        
    }
    public function setClassID($class_id){
        $this->class_id=$class_id;
    }
    public function getClassSignal(){
        return $this->class_signal;
        
    }
    public function setClassSignal($class_signal){
        $this->class_signal=$class_signal;
    }
    
    public function updateSignal(){
         include("../../conn.php");
        //***** if status equals 0 is default then if status equals 1 is techer clling
          $str = "UPDATE class SET class_signal = :class_signal WHERE class_id = :class_id;";
          
        $req=$conn->prepare($str);
        
        $req->execute(array(
            ':class_signal'=>  $this->getClassSignal(),
            ':class_id'=>  $this->getClassID()));
       
    }
}