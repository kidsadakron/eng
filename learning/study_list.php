
 <script>

    function upStatus(){
        $.ajax({
                type: "GET",
                url: "dist/updateStudy.php",
                data: {"status":"2"},
                success: function(data, textStatus, jqXHR){
                    window.location.href = 'index.php?page=study&unit=0';
                }
            });
    }
     
    </script>
   
    <?php 

		include("config.php");
		header("Content-Type: text/html;charset=UTF-8");
		mysql_connect($host,$username,$password);

		mysql_select_db("dof");
	
			$user = $_SESSION["dof_user"];
			$data = json_decode($user, true);
			
			$id_number = $data[0]['id_number'];
		$strSQL = "SELECT * FROM `eln`.`study` WHERE `id_number` = '".$id_number."' AND unit_id = 0";
			
				//echo $strSQL;
		   mysql_query("SET NAMES utf8");
		$objQuery = mysql_query($strSQL);
			
			 if (mysql_num_rows($objQuery) > 0) {
                                $status ="";
                                while ($r = mysql_fetch_assoc($objQuery)) {
                                 $status = $r["status"];
                                }
                                echo $status;
                                 if ($status != 3) {
   //  print '<input id="postTestBt" onclick="upStatus()" style="top: 70px;width: 150px;"class="btlogout" type="submit" name="submit" value="แบบทดสอบหลังเรียน" /> ';
     
 }
				
			 }else{
				
			 }
			 
	        
        

                       
?>
<div class="container">
<!--<div ><img src="img/banners.png" style="width: 80%; padding-top:50px;display: block;      margin-left: auto;      margin-right: auto;"></div>-->
<div  style="width: 80%; padding-top:50px;display: block;      margin-left: auto;      margin-right: auto;">
	<div class="row">
		<div class="col-md-6" >
			<!--<div id = "bg1-6" class="container-fluid" ></div>-->
			<ul style="list-style: none;padding-left: 0px;">
				<li >
				<a href="index.php?page=study&unit=1"><img class="container-fluid" style="width: 100%;"  >หน่วยที่ 1 ความรู้พื้นฐานเกี่ยวกับการผลิตพืช</a>
				</li>
				<li>
				<a href="index.php?page=study&unit=2"><img class="container-fluid" style="width: 100%;"></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=3"><img class="container-fluid" style="width: 100%;"></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=4"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=5"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=6"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=7"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=8"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				
			</ul>
		</div>
		<div class="col-md-6">
			<ul style="list-style: none;padding-left: 0px;">
                            <li>
				<a href="index.php?page=study&unit=9"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=10"><img class="container-fluid" style="width: 100%;"></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=11"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=12"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=13"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=14"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=15"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
				<li>
				<a href="index.php?page=study&unit=16"><img class="container-fluid" style="width: 100%;" ></a>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>



