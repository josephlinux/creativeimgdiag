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
</head>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 85%;
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

	
	

    
     
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
	<?php
						
include('connection.php');

$date1=$_POST['date1'];

$date2=$_POST['date2'];



echo "<table id=customers><th colspan=50 bgcolor=wheat><font color=white  size=4 ><b><center>DOCTORS COMPLETE INFORMATION</th>
 <tr>
<th><b><center>S.No</th>
<th><b><center>DID</th>
<th><b><center>DOCTOR NAME</th>
<th><b><center>HOSPITAL</th>
<th><b><center>PHONE NUMBER</th>
<th><b><center>ADDRESS</th>

<td bgcolor=red><font color=white>ACTION</td></tr>";


$sql6="Select did,doctorname,hospital,phone,address from doctor where id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$did=strtoupper($myrowc[0]);$dname=strtoupper($myrowc[1]);$hosp=strtoupper($myrowc[2]);$phone=strtoupper($myrowc[3]);
$address=strtoupper($myrowc[4]);


$i++;

echo "<tr><td><center> $i</td>
<td><center> $did</td>
<td> $dname</td>
<td><center> $hosp</td>
<td><center> $phone</td>
<td> $address</td>";
?>

<td> <a href="deletedoctoraction.php?did=<?php echo $did; ?>" onclick="return confirm('Are you sure you want to Remove?');"><i class="fas fa-user-times">Remove</i></a></td>
<?php
echo"</tr>";
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