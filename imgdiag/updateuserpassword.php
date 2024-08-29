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
  width: 50%;
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
include('menu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
	<form name=img action="reg.php" method="post">

    
     
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
	<?php
						
include('connection.php');

$date1=$_POST['date1'];

$date2=$_POST['date2'];



echo "<table id=customers><th colspan=50 bgcolor=wheat><font color=white  size=4 ><b><center>LOGIN USERS LIST</th>
 <tr>
<th><b><center>S.No</th>
<th><b><center>NAME</th>
<th><b><center>USERNAME</th>
<td bgcolor=red><font color=white>ACTION</td></tr>";
$type="user";

$sql6="Select name,username from login where id='$id' and type='$type'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$name=strtoupper($myrowc[0]);$username=($myrowc[1]);

$i++;

echo "<tr><td><center> $i</td>
<td><center> $name</td>
<td><center> $username</td>

<td><center><a href='updateuserpasswordselect.php?username=$username'><i class='far fa-edit'></i>Edit</a></td>

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