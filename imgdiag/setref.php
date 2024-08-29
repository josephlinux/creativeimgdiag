<?php
include('connection.php');

 $sql81="SELECT testname,tnumber FROM dataentry  ";
$rs81=mysql_query($sql81) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs81))
{      
 $tname=strtoupper($myrowc[0]);
  $tnum=strtoupper($myrowc[1]);

  $sql82="SELECT sno FROM tests where testname='$tname'";
$rs82=mysql_query($sql82) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs82))
{      
 $testid=strtoupper($myrowc[0]);
 }
 
   $sql83="SELECT refamount FROM referals where reftestid='$testid'";
$rs83=mysql_query($sql83) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs83))
{      
 $refamt=strtoupper($myrowc[0]);
 }
 
 
 $sql8="update dataentry set  refamount='$refamt' where tnumber='$tnum'";
$rd=mysql_query($sql8);
 
 }