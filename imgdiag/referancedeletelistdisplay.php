<?php
include('adminsession.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8"> 

	<title>Creative Billing Software</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure to Delete Referal?');
}
</script>



</head>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #588181;
  color: white;
}
</style>


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

	<div id="header"><br><br>
<center><font color=white size=6><?php echo $title; ?></font></center>
		
	<br>

		
		</div>
<?php
include('menu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
	<form name=img action="reg.php" method="post">

    
     
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
	<?php
						
include('connection.php');




echo "<table id=customers><th colspan=50 bgcolor=wheat><font color=white  size=4 ><b><center>DELETE REFERAL </th>
 <tr>
<th><b><center>S.No</th>
<th><b><center>DOCTOR NAME</th>
<th><b><center>TEST NAME</th>
<th><b><center>TEST COST</th>
<td bgcolor=red><font color=white>ACTION</td></tr>";


$sql6="Select refid,refdoctorid,reftestid,refamount from referals";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$refid=strtoupper($myrowc[0]);$doctor=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);


$sql7="Select doctorname from doctor where id='$id' and did='$doctor'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
            
$refdoctor=strtoupper($myrowc[0]);
}


$sql8="Select testname from tests where id='$id' and sno='$test'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
            
$reftest=strtoupper($myrowc[0]);
}

$i++;

echo "<tr><td><center> $i</td>
<td> $refdoctor</td>
<td> $reftest</td>
<td><center> $refamt</td>
<td><center><a href='referancedelete.php?refid=$refid' onclick='return checkDelete()'></i>Delete <i class='fa fa-trash'></a></td>

</tr>";

}
echo "</table>";
		
		
			
			
	
	
	?>
	
	
</div>

<center>
<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			</form>
			<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>

		
	</div>			
	<div id="header">
		<div style="width: 1258px; height: 35px">
				<b>
				<span><?php include('footer.php'); ?></span>
			</b>
			
	
</html>