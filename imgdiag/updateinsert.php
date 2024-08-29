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


$date1=$_POST['date1'];
$name1=$_POST['name1'];
$category1=$_POST['category1'];
$testname1=$_POST['test1'];
$doctor1=$_POST['doctor1'];
$mrd1=$_POST['mrd1'];
$discount1=$_POST['discount1'];
$refamt1=$_POST['refamt1'];
$cost1=$_POST['cost1'];
$code1=$_POST['code1'];
$tnumber=$_POST['tnumber'];
$raddis1=$_POST['raddis1'];

$tnum='';
 $sql9="select tnumber from modi where tnumber='$tnumber' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $tnum=strtoupper($myrowc[0]); 
}
        
   if($tnum =='')
   {         
$sql2="insert into modi(tnumber,mrd,date,name,doctor,category,test,cost,discount,raddis,refamt,user,id)values
('$tnumber','$mrd1','$date1','$name1','$doctor1','$category1','$testname1','$cost1','$discount1','$raddis1','$refamt1','$uu','$id')";
$rd=mysql_query($sql2);
}


$date=$_POST['date'];
$name=$_POST['name'];
$category=$_POST['category'];
$testname=$_POST['test'];
$searchid=$_POST['searchid'];
$mrd=$_POST['mrd'];
$discount=$_POST['discount'];
$refamt=$_POST['refamt'];
$searchid2=$_POST['searchid2'];
$tnumber=$_POST['tnumber'];

$raddis=$_POST['raddis'];


$sql9="select cost,category from tests where testname='$searchid2' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $cost=strtoupper($myrowc[0]); 
 $category=strtoupper($myrowc[1]);
}


$sql7="select did from doctor where doctorname='$searchid' and id='$id'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
{      
 $did=strtoupper($myrowc[0]); 
}




$sql8="SELECT did FROM doctor where doctorname='$searchid' and id='$id'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
{      
 $doctid=strtoupper($myrowc[0]);
 }
 
 $sql91="SELECT sno FROM tests where testname='$searchid2' and id='$id'";
$rs91=mysql_query($sql91) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs91))
{      
 $testid=strtoupper($myrowc[0]);
 }

$rc=0; 
$sql1="SELECT refamount FROM referals where reftestid='$testid' and refdoctorid='$did' and refdoctorid !='' and id='$id'";
$rs1=mysql_query($sql1) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs1))
{      
 $refamt=strtoupper($myrowc[0]);
 $rc++;
 }
 

 if($rc==0)
 {
 $sql2="SELECT refamount FROM referals where reftestid='$testid' and refdoctorid='' and id='$id'";
$rs2=mysql_query($sql2) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs2))
{      
 $refamt=strtoupper($myrowc[0]);
}
 
 }


          
$sql4="insert into updates(tnumber,mrd,date,name,doctor,category,test,cost,discount,raddis,refamt,user,id)values
('$tnumber','$mrd','$date','$name','$searchid','$category','$searchid2','$cost','$discount','$raddis','$refamt','$uu','$id')";
$rd=mysql_query($sql4);


$sql6="update dataentry set mrdnumber='$mrd',name='$name',refdoctor='$searchid',did='$did',category='$category',testname='$searchid2',cost='$cost',discount='$discount',refamount='$refamt',raddiscount='$raddis',date='$date' where tnumber='$tnumber' and id='$id'";
$rd=mysql_query($sql6);


echo"<center><font color=green size=4><b>Updated Sucessfully";



?>	

		
		
		
	
	<script>
         setTimeout(function(){
            window.location.href = 'main.php';
         }, 3000);
      </script>

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