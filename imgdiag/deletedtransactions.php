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
  width: 100%;
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
  background-color:#588181;
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

    
     
   

    
	<?php
						
include('connection.php');

$date1=$_POST['date1'];

$date2=$_POST['date2'];



echo "<table id=customers><th colspan=50 bgcolor=wheat><font size=4 ><b><center>DELETED LIST($date1 to $date2)</th>
 <tr>
<th><b><center>S.No</th>
<th><b><center>PATIENT NAME</th>
<th><b><center>PHONE</th>
<th><b><center>DOCTOR NAME</th>
<th><b><center>TEST NAME</th>
<th><b><center>TEST COST</th>
<th><b><center>DISCOUNT</th>
<th><b><center>REF AMOUNT</th>
<th><b><center>USER</th>
<th><b><center>REMARKS</th></tr>";

$i=1;
$sql5="Select DISTINCT mrdnumber from deletelist where date between '$date1' and '$date2' and id='$id'";
$rs5=mysql_query($sql5) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs5))
 {
$mrd=strtoupper($myrowc[0]);


echo "<tr><td><center> $i</td>";

$sql7="Select name from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs7=mysql_query($sql7) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs7))
 {
$name=strtoupper($myrowc[0]);
}
echo "<td>$name</td>";


$sql7="Select phone from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs7=mysql_query($sql7) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs7))
 {
$phone=strtoupper($myrowc[0]);
}
echo "<td>$phone</td>";


$sql7="Select refdoctor from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs7=mysql_query($sql7) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs7))
 {
$doctor=strtoupper($myrowc[0]);
}
echo "<td>$doctor</td>";


echo "<td>";

$sql8="Select testname from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
$testname=strtoupper($myrowc[0]);
echo $testname;
echo "<br>";
}
echo "</td>";

echo "<td>";
$sql9="Select cost from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
 {
$cost=strtoupper($myrowc[0]);
echo $cost;
echo "<br>";
}
echo "</td>";

echo "<td>";
$sql99="Select discount,raddiscount from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs99=mysql_query($sql99) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs99))
 {
$discount=strtoupper($myrowc[0]);$raddisc=strtoupper($myrowc[1]);
$tdisc=$discount+$raddisc;

echo $tdisc;
echo "<br>";
}
echo "</td>";


echo "<td>";
$sql19="Select refamount from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs19=mysql_query($sql19) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs19))
 {
$refamount=strtoupper($myrowc[0]);
echo $refamount;
echo "<br>";
}
echo "</td>";
$sql199="Select user from deletelist where date between '$date1' and '$date2' and id='$id' and mrdnumber='$mrd'";
$rs199=mysql_query($sql199) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs199))
 {
$user=strtoupper($myrowc[0]);
}
echo "<td>$user</td>";


echo "</td>";
$sql1="Select remark from deleteremarks where id='$id' and mrdnumber='$mrd'";
$rs1=mysql_query($sql1) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs1))
 {
$remark=strtoupper($myrowc[0]);
}
echo "<td>$remark</td>";

echo"</tr>";
$remark='';
$i++;
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