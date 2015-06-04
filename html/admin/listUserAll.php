<script type="text/javascript" language="javascript" class="init" charset="utf-8">


$(document).ready(function() {
      
	$('#example').dataTable( {
		"processing": true,
		"serverSide": true,
                "bSort": false,
		"ajax": {
			"url": "listUser.php",
			"type": "POST"
                        },
		"columns": [
                        
                        { "data": "pname" },
			{ "data": "fname" },
			{ "data": "lname" },
                        
                        { "data": "id_number" },
			{ "data": "email" },
			{ "data": "password" },
			//{ "data": "bday" },
			{ "data": "phone" },
                     
                       
                        ],
                "order": [[ 1, "asc" ]],
                 fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    // Row click
                    $(nRow).on('click', function() {
                      console.log('Row Clicked. Look I have access to all params, thank You closures.',  aData);
                       //var obj =  jQuery.parseJSON(aData);
                       window.location.href = 'index.php?tab=scoreUser&id='+aData.id_number+'&name='+aData.pname+''+aData.fname+' '+aData.lname;
                    });

                 
                  }
               
	} );
//        var dataTableObj = $('#example').DataTable();
//	dataTableObj.column(1).search("ห").draw();

} );
 
</script>

<table id="example" class="display" cellspacing="0" width="100%" style="cursor: pointer; ">
				<thead>
					<tr>    
                                                <th>คำนำหน้าชื่อ</th>
						<th>ชื่อ</th>
						<th>นามสกุล</th>
                                                
                                                <th>เลขบัตรประจําตัวประชาชน</th>
                                                <th>E-mail</th>
                                               <th >Password</th>
                                               <!--<th >วันเกิด</th>-->
                                               <th >หมายเลขโทรศัพท์</th>
                                                
					</tr>
				</thead>

				<tfoot>
					<tr>    
                                                <th>คำนำหน้าชื่อ</th>
						<th>ชื่อ</th>
						<th>นามสกุล</th>
                                                
                                                <th>เลขบัตรประจําตัวประชาชน</th>
                                                <th>E-mail</th>
                                               <th >Password</th>
                                               <!--<th >วันเกิด</th>-->
                                               <th >หมายเลขโทรศัพท์</th>
						
					</tr>
				</tfoot>
			</table>
        
