<script>
$(document).ready(function(){
    $("input[name='cus-id']").on("blur",function(){
        $.ajax({
            url:"dist/selectCus.php",
            type:"POST",
            data:{"cus_id":$("input[name='cus-id']").val()},
            success:function(data){
                //alert(data);
                var obj = jQuery.parseJSON(data);
                $("span[name='cus-name']").text(obj.cus_name);
               // $("#del-cus").replaceWith('<input value="ลบ" type="button" onclick="location.href=\'dist/delCus.php?cus_id='+obj.cus_id+'\'">');
            }
        });
    });
});
</script>
<input name="cus-id" type="text"> <span  name="cus-name"></span>
<!--<form action="dist/insertCus.php" method="POST">
<table>
    <tr>
        <th>รหัสลูกค้า</th>
        <th>ชื่อลูกค้า</th>
        <th></th>
       
    </tr>
    <tr>
        <td><input name="cus-id" type="text"></td>
          <td><input name="cus-name" type="text"></td>
          <td id="del-cus"></td>
    </tr>
</table>
    <input type="submit" value="ส่ง">
    </form>-->