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

	
	
	<form name=img action="reg.php" method="post">

    
     
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




$count=$_POST['count'];






$kv1 =array(); $kv2 = array(); $kv3 = array(); $kv4 = array();$kv5 = array();$kv8 = array();







foreach ($_POST['n2'] as $i2 => $value2)
{
 $kv2[] = "$value2";
}


foreach ($_POST['n3'] as $i3 => $value3)
{
 $kv3[] = "$value3";
}

foreach ($_POST['n4'] as $i4 => $value4)
{
 $kv4[] = "$value4";
}

foreach ($_POST['n5'] as $i5 => $value5)
{
 $kv5[] = "$value5";
}



foreach ($_POST['n8'] as $i8 => $value8)
{
 $kv8[] = "$value8";
}

	
for($j=0;$j<$count;$j++)

{ 

    

$sql2="update doctor set hospital='$kv3[$j]',phone='$kv4[$j]',address='$kv5[$j]',doctorname='$kv2[$j]' where did='$kv8[$j]' and id='$id'";
$rd=mysql_query($sql2);


}

echo "<center><font color=green size=4>DOCTOR INFO UPDATED SUCESSFULLY...";
	
	?>

	
	<script>
         setTimeout(function(){
            window.location.href = 'main.php';
         }, 5000);
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