<?php

include('connection.php');

	





	include('connection.php');

$sql3="select title,address1,address2 from title where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $title=strtoupper($myrowc[0]); 
  $address1=strtoupper($myrowc[1]); 
 $address2=strtoupper($myrowc[2]); 

	}
	
$age=$_POST['age'];
$pname=$_POST['pname'];
$address=$_POST['address'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$doctor=$_POST['doctor'];
$mobile=$_POST['mobile'];

$did=$_POST['did'];



$sql4="select MAX(mrdnumber) from deletelist";
$rs4=mysql_query($sql4) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs4))
{      
 $dtnum=strtoupper($myrowc[0]); 
}

$sql5="select MAX(mrdnumber) from returns";
$rs5=mysql_query($sql5) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs5))
{      
 $rtnum=strtoupper($myrowc[0]); 
}

$sql6="select MAX(mrdnumber) from dataentry";
$rs6=mysql_query($sql6) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs6))
{      
 $detnum=strtoupper($myrowc[0]); 
}


if(($dtnum >$rtnum) && ($dtnum>$detnum))
{
$sql7="select mrdnumber from deletelist";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
{      
 $mrd=strtoupper($myrowc[0]); 
}
}

 if(($rtnum >$dtnum) && ($rtnum>$detnum))
{
$sql7="select mrdnumber from returns";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
{      
 $mrd=strtoupper($myrowc[0]); 
}
}

if(($detnum >$dtnum) && ($detnum>$rtnum))
{
$sql7="select mrdnumber from dataentry";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
{      
 $mrd=strtoupper($myrowc[0]); 
}
}



$s=0;
if($mrd=='')
{
$mrd="CBS0000001";
$s++;
}

if($mrd!='' && $s==0)
{
$mrd++;
}
echo $mrd;


?>

