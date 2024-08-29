<?php
include('adminsession.php');
?>
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

		<p>&nbsp;</p>
		&nbsp;<center>
<?php
						
include('connection.php');


$date1=$_POST['date1'];

$date2=$_POST['date2'];



$sql2="update dataentry set refamount='' where date between '$date1' and 'date2'";
$rd=mysql_query($sql2);


echo"<font color=green size=4><center><b>Perform Sucessfully";
		
		echo"<script>
         setTimeout(function(){
            window.location.href = 'main.php';
         }, 2000);
      </script>";

	
	
	?>
	
<p>&nbsp;</p>
<p>&nbsp;</p>
		
	</div>			
	<div id="header">
		<div style="width: 1258px; height: 35px">
				<b>
				<span><?php include('footer.php'); ?></span>
			</b>
			
	
</html>