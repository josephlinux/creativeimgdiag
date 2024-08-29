<?php
include('adminsession.php');
?>
<html>




<head>
	<meta charset="UTF-8">
	<title>Creative Billing Software</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 1px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>




	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
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


</head>


<style>
a:link {
  text-decoration: none;
}
<?php
include('connection.php');
$sql="select title from title where id='$id'";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $title=strtoupper($myrow[0]); 

 		
      }
?>


</style>
	<div id="header"><br><br>
<center><font color=white size=7><?php echo $title; ?></font></center>
	<br>

		
		</font>

		
		</div>

<?php
include('menu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>


<form name=cc action=actionaction.php method=post>
<?php
						
	include_once('connection.php');
	$s=0;	
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	?>

		<p>&nbsp;</p>
<?php
						
	include_once('connection.php');
	$s=0;	
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	
	echo"<input type=hidden name=date1 value='$date1'><input type=hidden name=date2 value='$date2'><p>&nbsp;</p>
<p>&nbsp;</p>
		<p>&nbsp;</p>
";
	
	
	

echo"<table border=1 width=80% bgcolor=#006699 height=60>
			<tr>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=60% align=center colspan=15>
				<font color=#080808><b><u>Action Records from $date1 to $date2</u></b></font></td>
			</tr>
			<tr>
			<td height=30  width=10% bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=14% align=center>
				<font color=#080808 size=2><b>S.no</b></font></td>

			<td height=30  width=10% bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=14% align=center>
				<font color=#080808 size=2><b>T.Number</b></font></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>Mrd Number</b></font></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>P.Name</b></font></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>Date</b></font></td>
				
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=40% align=center>
				<font color=#080808 size=2><b>&nbsp;&nbsp;Ref.Doctor&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
				
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=18% align=center>
				<font color=#080808 size=2><b>Test Name</b></font></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=18% align=center>
				<font color=#080808 size=2><b>Test cost</b></font></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=13% align=center>
				<b><font size=2 color=#000000>Discount Amount</font></b></td>
				
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=13% align=center>
				<b><font size=2 color=#000000>Rad.Discount</font></b></td>

				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=13% align=center>
				<b><font size=2 color=#000000>Referrence amount</font></b></td>
				<td height=30 bgcolor=#F7E1B5 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=13% align=center>
				<b><font size=2 color=#000000>user</font></b></td>
				
			</tr>";	
			
$i=1;
$sql3="Select category from category";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $cate=strtoupper($myrowc[0]);
 
 $c=1;
 
 echo "<tr><td colspan=13><font color=white size=4><center><b> Category : $cate  </td></tr>";

$sql7="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date,category,refamount,tnumber,user from dataentry where date between '$date1' and '$date2' and category='$cate'";
$rs7=mysql_query($sql7) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs7))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);
$category=strtoupper($myrowc[8]);$refamt=strtoupper($myrowc[9]);$tnumber=strtoupper($myrowc[10]);$user=strtoupper($myrowc[11]);


if($c%3==0)
{

echo"<tr>

<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$i</b></font></td>
<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$tnumber</b></font></td><input type=hidden name='n1[]' value='$tnumber'>

<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$mrd</b></font></td>
				<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$name</b></font></td>
				<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$date</b></font></td>";
			
				
echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$doctor</b></font></td>";
				

echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$test</b></font></td>";

	echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$cost</b></font></td>";
	

echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b><center>$discount</td>
<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b><center>$raddis</td>";

echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$refamt</td>";

echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=24% align=center>
				<font color=#080808 size=2><b>$user</td></tr>";
				$i++;
				}
				
				
				$c++;
				
				
	}	
		



echo"<input type=hidden name=count value='$i'>";

}



echo "</table>";
	
			
	
	
	?>
	<br><br>
	<b>
			
				<p align='center'>
                                <button type='submit' class='button' >
								<p style='text-align: left'>
								<font face="MS Serif" size="4">TAKE ACTION</font></button>&nbsp;

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