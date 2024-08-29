
$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'title'], [2, 'address1'], [3, 'address2'], [4, 'phone']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});