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
	
	
	<form name=img action="deleteaction.php" method="post">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	



<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
 
    
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>


    
    
     
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
  text-align: center;
  background-color: #588181;
  color: white;
}
</style>


	
	
	
	
	
	<?php		
	
include('connection.php');




$mrdnumber=$_POST['mrdnumber'];
		
		
$sql6="Select date,name,refdoctor,age,gender,phone,address from dataentry where mrdnumber='$mrdnumber' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$age=strtoupper($myrowc[3]);
$gender=strtoupper($myrowc[4]);$phone=strtoupper($myrowc[5]);$address=strtoupper($myrowc[6]);


}






echo"<input type=hidden name=mrdnumber value=$mrdnumber>";



echo "<br><br><center><font face='Arial'><b>DELETE BILL NUMBER DETAILS ($mrdnumber)";



echo"<br><br><table id='customers'>
			
			<tr>
				<th><b>Bill Number</b></font></th>
				<th ><b>P.Name</b></font></th>
				<th><b>Date</b></font></th>
				<th><b>Ref Doctor</b></font></th>

				
		<tr>";		
	
	

echo"<tr><td>$mrdnumber</font></td>
				<td>$name</b></font></td>
				<td>$date</b></font></td>
			
	<td >$doctor</font></td></tr></table><br>";

			
	echo"<br><table id='customers'>
			
			<tr>
				<th><b>S.No</b></font></th>
				<th><b>Test Name</b></font></th>
				<th><b>Amount</b></font></th>
				<th><b>Discount</b></font></th>
				<th><b>Rad.Dis</b></font></th>
								<th><b>Netamount</b></font></td>	</th>";		



$q=1;
$sql6="Select testname,cost,discount,raddiscount from dataentry where mrdnumber='$mrdnumber' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$testname=strtoupper($myrowc[0]);$testcost=strtoupper($myrowc[1]);$discount=strtoupper($myrowc[2]);$raddis=strtoupper($myrowc[3]);


				echo"<tr><td>$q</b></font></td>
				<td>$testname</b></font></td>
				<td>$testcost</b></font></td>
				<td>$discount</b></font></td>
				<td>$raddis</b></font></td>";
								

            


$ded=$discount+$raddis;

		$net=$testcost-$ded;
		
	
echo"<td>$net</b></font></td>	</tr>";	
				
$q++;
		$tnet=$tnet+$net;

}
	
echo"<tr><td colspan=7><b><center>Total Net Amount= $tnet</b></font></td>	</tr>";	
				
echo"<tr><td colspan=2><b><center><font color=red>Remarks for Deleting Bill :</b></font></td><td colspan=4><b><center><textarea name=remarks rows=3 cols=50 required></textarea></b></font></td>	</tr>";	


echo"</table>";
	
	?>
	

	
	
	
	
<center>
<p>&nbsp;<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			<input type=submit  value="Next" class='button'>
			</form>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		
	</div>			
	<div id="header">
		<div style="width: 1258px; height: 35px">
				<b>
				<span><?php include('footer.php'); ?></span>
			</b>
			
	
</html>