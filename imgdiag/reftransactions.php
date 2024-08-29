<?php
include('referalsessions.php');
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
include('referalmenu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
	<form name=img action="reg.php" method="post">

    
     
   

    
	<?php
						
include('connection.php');

$date1=$_POST['date1'];

$date2=$_POST['date2'];



echo "<table id=customers><th colspan=50 bgcolor=wheat><font  size=4 ><b><center>TRANSACTIONS LIST($date1 to $date2)</th>
 <tr>
<th><b><center>S.No</th>
<th><b><center>T.NUMBER</th>
<th><b><center>BILL NUMBER</th>
<th><b><center>PATIENT NAME</th>
<th><b><center>AGE</td>
<th><b><center>GENDER</th>
<th><b><center>PHONE</th>
<th><b><center>DOCTOR NAME</th>
<th><b><center>CATEGORY</th>
<th><b><center>TEST NAME</th>
<th><b><center>TEST COST</th>
<th><b><center>DISCOUNT</th>
<th><b><center>REF AMOUNT</th>
<th><b><center>USER</th></tr>";


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,testname,category,refamount,age,gender,phone,tnumber,user from dataentry where date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);
$testname=strtoupper($myrowc[6]);$category=strtoupper($myrowc[7]);$refamt=strtoupper($myrowc[8]);
$age=strtoupper($myrowc[9]);$gender=strtoupper($myrowc[10]);$phone=strtoupper($myrowc[11]);$tnumber=strtoupper($myrowc[12]);$user=strtoupper($myrowc[13]);



$i++;

echo "<tr><td><center> $i</td>
<td><center> $tnumber</td>
<td><center> $mrd</td>
<td><center> $name</td>
<td><center> $age</td>
<td><center> $gender</td>
<td><center> $phone</td>
<td> $doctor</td>
<td><center> $category</td>
<td> $testname</td>
<td><center> $cost</td>
<td><center> $discount</td>
<td><center> $refamt</td>
<td><center> $user</td>

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