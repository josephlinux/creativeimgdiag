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




<?php
					include_once('connection.php');
	$s=0;	
	$password=$_POST['password'];
	$type="action";
	$usern="action";	
	$k=0;
$sql3="select password from login where username='$usern' and password='$password' and type='$type'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $ps=strtoupper($myrowc[0]); 
 $k++;
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


  <form name=main action=actiondisplay.php   method=POST >


<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

		<p>&nbsp;</p>
		&nbsp;<center>
		<p>&nbsp;</p>
<?php
                if($k>0)
                {
          
	echo"<table border='0' width='20%' height='147' bgcolor='#FFEFDF'>
		<tr>
			<td width='40' align='center' height='79'><b><font size='5'>1.</font></b></td>
			<td height='79'><b><font size='5'><a href='action0refselect.php'>0 Referals Task</font></b></td>
		</tr>
		<tr>
			<td width='40'><b><font size='5'>&nbsp;2.</font></b></td>
			<td><b><font size='5'><a href='actionselect.php'>30% Task</a></font></b></td>
		</tr>
	</table>";
			}
			
			if($k==0)
			{
			
			echo "<center><font color=red size=4>WRONG PASSWORD TRY AGAIN";
			}
			?>
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