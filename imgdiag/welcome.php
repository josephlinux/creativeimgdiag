<?php
require_once('connection.php');
$userid=$_POST['username'];
$password=$_POST['password'];
$userid = stripslashes($userid);
$password = stripslashes($password);
$userid = mysql_real_escape_string($userid);
$password = mysql_real_escape_string($password);

 
   $sql="select username,password,type,id from login where username='$userid' and password='$password'";
    
    $rs=mysql_query($sql);
$l=0;

    while($myrow=mysql_fetch_array($rs))
     {
 
	  
        $u=$myrow[0]; $p=$myrow[1];$type=$myrow[2];$id=$myrow[3];


   		
      }


      

	    if($userid !='' && $password==$p && $password !='' && $type=="admin")
	    {
	     session_start();
    	$_SESSION['uname'] = $userid;
    	$_SESSION['id'] = $id;
    	 $_SESSION['type'] = $type;
    	session_register("id");
    	session_register("type");
	    session_register("userid");
		session_register("password");
       	header('Location:main.php');
       	
       	$ip=$_SERVER['REMOTE_ADDR'];

 $date = date('Y-m-d'); 
$day = date('l', strtotime($date));

$offset= strtotime("+5 hours 30 minutes"); 
$noww = date("H:i:s",$offset);

if($noww>"12:00")
{
$session="PM";
}
if($noww<"12:00")
{
$session="AM";
}
 $time=$noww.$session;
 
$date=date('Y-m-d');
$sql7="insert into userlog(id,user,login,date,type,ip)values('$id','$userid','$time','$date','$type','$ip')";
$rd=mysql_query($sql7);
       	
       	}
       	
       if($userid !='' && $password==$p && $password !='' && $type=="user")
	    {
	     session_start();
    	$_SESSION['uname'] = $userid;
    	$_SESSION['id'] = $id;
    	 $_SESSION['type'] = $type;
    	session_register("id");
    	session_register("type");
	    session_register("userid");
		session_register("password");
		
       	header('Location:usermain.php');
       	
       	$ip=$_SERVER['REMOTE_ADDR'];

 $date = date('Y-m-d'); 
$day = date('l', strtotime($date));

$offset= strtotime("+5 hours 30 minutes"); 
$noww = date("H:i:s",$offset);

if($noww>"12:00")
{
$session="PM";
}
if($noww<"12:00")
{
$session="AM";
}
 $time=$noww.$session;
	
$date=date('Y-m-d');
$sql7="insert into userlog(id,user,login,date,type,ip)values('$id','$userid','$time','$date','$type','$ip')";
$rd=mysql_query($sql7);
       	}



       	
       if($userid !='' && $password==$p && $password !='' && $type=="referal")
	    {
	     session_start();
    	$_SESSION['uname'] = $userid;
    	$_SESSION['id'] = $id;
    	 $_SESSION['type'] = $type;
    	session_register("id");
    	session_register("type");
	    session_register("userid");
		session_register("password");
		
       	header('Location:referalmain.php');
       	
       	$ip=$_SERVER['REMOTE_ADDR'];

 $date = date('Y-m-d'); 
$day = date('l', strtotime($date));

$offset= strtotime("+5 hours 30 minutes"); 
$noww = date("H:i:s",$offset);

if($noww>"12:00")
{
$session="PM";
}
if($noww<"12:00")
{
$session="AM";
}
 $time=$noww.$session;
	
$date=date('Y-m-d');
$sql7="insert into userlog(id,user,login,date,type,ip)values('$id','$userid','$time','$date','$type','$ip')";
$rd=mysql_query($sql7);
       	}



 if($userid !='' && $password==$p && $password !='' && $type=="sadmin")
	    {
	     session_start();
    	$_SESSION['uname'] = $userid;
    	$_SESSION['id'] = $id;
    	 $_SESSION['type'] = $type;
    	session_register("id");
    	session_register("type");
	    session_register("userid");
		session_register("password");
		
       	header('Location:smain.php');
       	
       	$ip=$_SERVER['REMOTE_ADDR'];

 $date = date('Y-m-d'); 
$day = date('l', strtotime($date));

$offset= strtotime("+5 hours 30 minutes"); 
$noww = date("H:i:s",$offset);

if($noww>"12:00")
{
$session="PM";
}
if($noww<"12:00")
{
$session="AM";
}
 $time=$noww.$session;
	
$date=date('Y-m-d');
$sql7="insert into userlog(id,user,login,date,type,ip)values('$id','$userid','$time','$date','$type','$ip')";
$rd=mysql_query($sql7);
       	}




       	
	 

	else
	header('Location:index1.php');
	   		  ?>

