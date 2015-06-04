<script type="text/javascript" language="javascript" class="init" charset="utf-8">


$(document).ready(function() {
      
	$('#example').dataTable( {
		"processing": true,
		"serverSide": true,
                "bSort": false,
		"ajax": {
			"url": "listWork.php",
			"type": "POST"
                        },
		"columns": [
                        { "data": "unit_id" },
			{ "data": "unit_name" },
                        { "data": "pname" },
			{ "data": "fname" },
			{ "data": "lname" }
			
			
                     
                       
                        ],
                "order": [[ 0, "asc" ]],
                 fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    // Row click
                    $(nRow).on('click', function() {
                      console.log('Row Clicked. Look I have access to all params, thank You closures.',  aData);
                       //var obj =  jQuery.parseJSON(aData);
                       window.location.href = 'index.php?tab=workUser&id='+aData.id_number+'&name='+aData.pname+''+aData.fname+' '+aData.lname+'&unit='+aData.unit_id;
                    });

                 
                  }
               
	} );


} );
 
</script>

<table id="example" class="display" cellspacing="0" width="100%" style="cursor: pointer; ">
				<thead>
					<tr>    <th>หน่วยที่</th>
                                                <th>ชื่อหน่วย</th>
                                               
                                                <th>คำนำหน้าชื่อ</th>
						<th>ชื่อ</th>
						<th>นามสกุล</th>
                                              
                                                
                                               
                                                
					</tr>
				</thead>

				<tfoot>
					<tr>    
                                               <th>หน่วยที่</th>
                                                <th>ชื่อหน่วย</th>
                                               
                                                <th>คำนำหน้าชื่อ</th>
						<th>ชื่อ</th>
						<th>นามสกุล</th>
						
					</tr>
				</tfoot>
			</table>
        
