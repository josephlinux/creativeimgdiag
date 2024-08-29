<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['title'])) {
		$update_field.= "title='".$input['title']."'";
	} else if(isset($input['address1'])) {
		$update_field.= "address1='".$input['address1']."'";
	} else if(isset($input['address2'])) {
		$update_field.= "address2='".$input['address2']."'";
	} else if(isset($input['phone'])) {
		$update_field.= "phone='".$input['phone']."'";
	} 
	echo $update_field;
	if($update_field && $input['id']) {
		$sql_query = "UPDATE title  SET $update_field WHERE id='" . $input['id'] . "'";	
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}

echo weelc;