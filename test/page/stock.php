<script>
$(document).ready(function (){
    $("input[name='good-id']").on("blur",function(){
       $.ajax({
           url:"dist/selectStock.php",
           type:"POST",
           data:{"goods-id":$("input[name='good-id']").val()},
           success:function(data){
               var obj = jQuery.parseJSON(data);
              // $("input[name='good-id']").val(obj.goods_id);
               $("input[name='good-name']").val(obj.goods_name);
               $("input[name='cost-unit']").val(obj.cost_unit);
               $("#del-stock").replaceWith('<input type="button" onclick="location.href=\'dist/delStock.php?goods_id='+obj.goods_id+'\'" value="ลบ">');
           }
       });
   
    });
});
function updateStock(ids){
     var names = $("input[name='goods-name-ed"+ids+"']").val();
   //var ids = $("input[name='goods-id-ed']").val();
    var unit = $("input[name='cost-unit-ed"+ids+"']").val();
   alert("input[name='goods-name-ed"+ids+"']");
   alert(names);
   $.ajax({
       
      url:"dist/updateStock.php",
        type:"POST",
        data:{"goods-name-ed":names,
                "cost-unit-ed":unit,
                "goods-id-ed":ids},
           
    });
}
</script>

<form action="dist/insertStock.php" method="post">
<table border="1">
    <tr>
        <th>รหัสสินค้า</th>
         <th>รายละเอียดสินค้า</th>
          <th>หน่วยราคา</th>
          <th></th>
    </tr>
    <tr>
        <td><input name="good-id" type="text"></td>
        <td><input name="good-name" type="text"></td>
        <td><input name="cost-unit" type="number"></td>
        <td id="del-stock"></td>
    </tr>
</table>
    <input type="submit" vale="ok">
</form>

<table>
    <tr>
        <th>รหัสสินค้า</th>
        <th>รายละเอียดสินค้า</th>
        <th>หน่วยราคา</th>
        <th></th>
    </tr>
    <?php
  
        include '../config.php';
        mysql_connect($host,$user,$pass);
        mysql_select_db('testaa');
        $sqlStr = "SELECT * FROM goods_name ";
        $sqlQuery = mysql_query($sqlStr);
        while($r = mysql_fetch_assoc($sqlQuery)){
            echo '<tr><td>'.$r["goods_id"].'</td><td><input name="goods-name-ed'.$r["goods_id"].'" type="text" value="'.$r["goods_name"].'"></td><td><input name="cost-unit-ed'.$r["cost_unit"].'" type="text" value="'.$r["cost_unit"].'"></td><td><input type="button" onClick="location.href=\'dist/delStock.php?goods_id='.$r["goods_id"].'\'" value="ลบ"><input type="button" onclick="updateStock('.$r["goods_id"].')" class="ed-goods" value="แก้ไข"></td></tr>';
        }       
       
         
    ?>
</table>