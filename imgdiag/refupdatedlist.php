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

	
	
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

#customers td, #customers th {
  border: 1px solid #588181;
  padding: 7px;
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
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
</style>

  <?php		
	
include('connection.php');
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];


echo"<table id='customers'>
			<tr>
				<th colspan=12><b><center>Updated Records from $date1 to $date2</u></b></font></td>
			</tr>
			<tr >
			<td bgcolor='#F9EEDF' ><b>S.no</b></font></td>

			<td bgcolor='#F9EEDF'><b>T.Number</b></font></td>
				<td bgcolor='#F9EEDF'><b>Mrd Number</b></font></td>
				<td bgcolor='#F9EEDF'><b>P.Name</b></font></td>
				<td bgcolor='#F9EEDF'><b>Date</b></font></td>
				
				<td bgcolor='#F9EEDF'><b>&nbsp;&nbsp;Ref.Doctor&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
				
				<td bgcolor='#F9EEDF'><b>Test Name</b></font></td>
				<td bgcolor='#F9EEDF'><b>Test cost</b></font></td>
				<td bgcolor='#F9EEDF'><b>Discount</font></b></td>
				
				<td bgcolor='#F9EEDF'><b>Rad.Discount</font></b></td>

				<td bgcolor='#F9EEDF'><b>Ref. amount</font></b></td>
				<td bgcolor='#F9EEDF'><b>user</font></b></td>
				
			</tr><tr>";		
	
$c=1;

$sql6="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from modi where date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);
$code=strtoupper($myrowc[8]);$category=strtoupper($myrowc[9]);$refamt=strtoupper($myrowc[10]);$tnumber=strtoupper($myrowc[11]);$user=strtoupper($myrowc[12]);


	
	

echo"<tr>

<td>$c</b></font></td>
<td>$tnumber</b></font></td>

<td>$mrd</b></font></td>
				<td>$name</b></font></td>
				<td>$date</b></font></td>";
			
				
echo"<td>$doctor</b></font></td>";
				

echo"<td>$test</b></font></td>";

	echo"<td>$cost</b></font></td>";
	

echo"<td>$discount</td>
<td>$raddis</td>";

echo"<td>$refamt</td>";

echo"<td>$user</td>";

		
		
		
		



{


$sql9="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from updates where tnumber='$tnumber' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs9))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);
$code=strtoupper($myrowc[8]);$category=strtoupper($myrowc[9]);$refamt=strtoupper($myrowc[10]);$tnumber=strtoupper($myrowc[11]);$user=strtoupper($myrowc[12]);




echo"<tr>

<td></td>
<td>$tnumber</b></font></td>

<td>$mrd</b></font></td>
				<td>$name</b></font></td>
				<td>$date</b></font></td>";
			
				
echo"<td>$doctor</b></font></td>";
				

echo"<td>$test</b></font></td>";

	echo"<td>$cost</b></font></td>";
	

echo"<td>$discount</td>
<td>$raddis</td>";

echo"<td>$refamt</td>";

echo"<td>$user</td></tr>";
				
			
	}			
echo "<tr><td colspan=12 bgcolor='#F9EEDF'><font color=white><br>  </td></tr>";
	}	
		$c++;	
			
}

echo"</table>";
		
	echo"<input type=hidden size=5 value='$rowss' name='co'>";
		
			

	
	
	?>
  
    
    
    
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