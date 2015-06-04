<?php

	ob_start();
	session_start();
	$user = $_SESSION["eng_user"];
	
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
          
            <?php include '../app/View/menu.php';?>
                
        </div>
        <div class="col-sm-10 ">
<?php
$objConnect = mysql_connect("localhost","root","1234") or die("Error Connect to Database");
$objDB = mysql_select_db("e_eng");


?>
<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
//*** Select Question ***//
$strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysql_fetch_array($objQuery);

//*** Update View ***//
$strSQL = "UPDATE webboard ";
$strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL);	
?>
<table width="738" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2"><center><h1><?php echo $objResult["Question"];?></h1></center></td>
  </tr>
  <tr>
    <td height="53" colspan="2"><?php echo nl2br($objResult["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">Name : <?php echo $objResult["user_id"];?> Create Date : <?php echo $objResult["CreateDate"];?></td>
    <td width="253">View : <?php echo $objResult["View"];?> Reply : <?php echo $objResult["Reply"];?></td>
  </tr>
</table>
<br>
<br>
<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysql_fetch_array($objQuery2))
{
	$intRows++;
?> No : <?php echo $intRows;?>
<table width="738" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td height="53" colspan="2"><?php echo nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">Name :
        <?php echo $objResult2["user_id"];?>      </td>
    <td width="253">Create Date :
    <?php echo $objResult2["CreateDate"];?></td>
  </tr>
</table><br>
<?php
}
?>
<br>
<a href="Webboard.php">Back to Webboard</a> <br>
<br>
<form action="../app/controller/insertReply.php?QuestionID=<?php echo $_GET["QuestionID"];?>" method="post" name="frmMain" id="frmMain">
  <table width="738" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="78">Details</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>

  </table>
  
  <input name="btnSave" type="submit" id="btnSave" value="Submit">
</form>
</body>
</html>
<?php
mysql_close($objConnect);
?>
 </div>
        </div>
</div>
  </body>
     <?php include 'footer.php';?>
</html>