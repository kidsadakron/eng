<?php

	ob_start();
	session_start();
	$user = $_SESSION["eng_user"];
        if($user == null || $user == ""){
		header('Location: ../index.php'); 
            }
	
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>บทเรียนออนไลน์</title>

    <!-- Bootstrap core CSS -->
  
    <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../public/js/jquery-1.11.2.min.js" type="text/javascript"></script>

    <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>
    
  

  </head>
 <script>
</script>

  <body>
      <div class="container">
<div class="row">
        <div class="col-sm-2 ">
          
            <?php include '../menu.php';?>
                
        </div>
        <div class="col-sm-10 ">
<?php
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("e_eng");
$strSQL = "SELECT * FROM webboard ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<table width="909" border="1">
  <tr>
    <!--<th width="99"> <div align="center">QuestionID</div></th>-->
    <th width="458"> <div align="center">Question</div></th>
    <th width="90"> <div align="center">Name</div></th>
    <th width="130"> <div align="center">CreateDate</div></th>
    <th width="45"> <div align="center">View</div></th>
    <th width="47"> <div align="center">Reply</div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
<!--    <td><div align="center"><?php echo $objResult["QuestionID"];?></div></td>-->
    <td><a href="ViewWebboard.php?QuestionID=<?php echo $objResult["QuestionID"];?>"><?php echo $objResult["Question"];?></a></td>
    <td><?php echo $objResult["user_id"];?></td>
    <td><div align="center"><?php echo $objResult["CreateDate"];?></div></td>
    <td align="right"><?php echo $objResult["View"];?></td>
    <td align="right"><?php echo $objResult["Reply"];?></td>
  </tr>
<?php
}
?>
</table>

<br>
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
mysql_close($objConnect);
?>



<form action="../app/controller/insertWebboard.php" method="post" name="frmMain" id="frmMain">
  <table width="621" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td>Question</td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="70"></td>
    </tr>
    <tr>
      <td width="78">Details</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
   
  </table>
  
  <input name="btnSave" type="submit" id="btnSave" value="Submit">
</form>

 </div>
        </div>
</div>
  </body>
     <?php include 'footer.php';?>
</html>