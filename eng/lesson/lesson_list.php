 <?php 
 include("../../config.php");
            header("Content-Type: text/html;charset=UTF-8");
            mysql_connect($host,$username,$password);

          	$user = $_SESSION["eng_user"];
			$data = json_decode($user, true);
			
			$user_id = $data[0]['user_id'];
		
            //mysql_query("SET NAMES utf8");
            mysql_query("SET NAMES utf8");
            $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = 0";
            $objQuery = mysql_query($strSQL);
            if(mysql_num_rows($objQuery) > 0){
                echo '<a href="index.php?unit=1">หน่วยที่ 1 Personal Pronouns</a>';
            }else{
                echo 'หน่วยที่ 1 Personal Pronouns';
            }
            echo '<br>';
             $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = 1 AND status = 1" ;
            $objQuery = mysql_query($strSQL);
            if(mysql_num_rows($objQuery) > 0){
                echo '<a href="index.phpunit=2">หน่วยที่ 2 Possessive Pronouns and Reflexive Pronouns</a>';
            }else{
                echo 'หน่วยที่ 2 Possessive Pronouns and Reflexive Pronouns';
            } 
            echo '<br>';
             $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = 2 AND status = 1";
            $objQuery = mysql_query($strSQL);
           
            if(mysql_num_rows($objQuery) > 0){
                echo '<a href="index.php?unit=3">หน่วยที่ 3 Indefinite Pronouns</a>';
            }else{
                echo 'หน่วยที่ 3 Indefinite Pronouns';
            } 
            echo '<br>';
             $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = 3 AND status = 1";
            $objQuery = mysql_query($strSQL);
            if(mysql_num_rows($objQuery) > 0){
                echo '<a href="index.php?unit=4">หน่วยที่ 4 Demonstrative Pronouns</a>';
            }else{
                echo 'หน่วยที่ 4 Demonstrative Pronouns';
            } 
            $strSQL = "SELECT * FROM `study` WHERE `user_id` = '".$user_id."' AND unit_id = 4 AND status = 1";
            $objQuery = mysql_query($strSQL);
            echo '<div>';
            if(mysql_num_rows($objQuery) > 0){
               
                 echo '  <a style="width: 49%;" href="index.php?test=0"  class="btn btn-lg btn-primary">แบบทดสอบหลังเรียน</a>';
            }else{
                 echo '  <a style="width: 49%;" disabled="disabled" href="index.php?test=4" disabled="disabled" class="btn btn-lg btn-primary">แบบทดสอบหลังเรียน</a>';
            } 
            echo '</div>';
             //echo $strSQL;
        ?>







