<?php
include('sadminsession.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8"> 

	<title>Creative Billing Software</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>


<style>
a:link {
  text-decoration: none;
}
</style>

<?php
include('connection.php');
$sql="select title from title where id='$id'";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $title=strtoupper($myrow[0]); 

 		
      }
?>

	<div id="header">
	<br><br>
<center><font color=white size=6><?php echo $title; ?></font></center>
		
	<br>

		
		</div>
<?php
include('smenu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
<?php 
include_once("db_connect.php");
include("header.php"); 
?>


<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
	<table id="data_table">
		<thead>
			<tr>
				<th>Id</th>
				<th>title</th>
				<th>address1</th>
				<th>address2</th>	
				<th>phone</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT id, title, address1, address2, phone FROM title LIMIT 10";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			   <tr id="<?php echo $developer ['id']; ?>">
			   <td><?php echo $developer ['id']; ?></td>
			   <td><?php echo $developer ['title']; ?></td>
			   <td><?php echo $developer ['address1']; ?></td>
			   <td><?php echo $developer ['address2']; ?></td>   
			   <td><?php echo $developer ['phone']; ?></td>
			   </tr>
			<?php } ?>
		</tbody>
    </table>
    
<script type="text/javascript">
$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: false,
		editButton: true,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'title'], [2, 'address1'], [3, 'address2'], [4, 'phone']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});
</script>
	
	<div style="margin:50px 0px 0px 0px;">
	</div>
</div>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php include('live_edit.php');?>