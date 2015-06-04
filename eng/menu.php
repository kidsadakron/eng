
        <div class="sidebar">
          <ul class="nav nav-sidebar">
              <?php   if($user != null && $user != ""){
                  $data = json_decode($user, true);
                  $id_number = $data[0]['name'];
                 echo '<li>'.$id_number.'</li>';
                }
             ?>
<!--              <li><a href="index.php">จุดประสงค์การเรียนรู้</a></li>-->
              <li class="active"><a href="/eng/lesson">เข้าสู่บทเรียน</a></li>
       <li><a href="/eng/chats">ห้องสนทนา</a></li>
       <li><a href="/eng/webboard">Webboard</a></li>
       <li><a href="/eng/score/">คะแนนทั้งหมด</a></li>
          <!--  <li><a href="#">Export</a></li>-->
            
             <?php   if($user != null && $user != ""){
                 echo '<li><a href="/eng/logout.php">logout</a></li>';
                }
             ?>
          </ul>
       
        </div>
      
     
      



