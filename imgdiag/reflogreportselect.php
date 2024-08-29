<?php
include('referalsessions.php');
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

	<div id="header">
	<br><br>
<center><font color=white size=6><?php echo $title; ?></font></center>
		
	<br>

		
		</div>
<?php
include('referalmenu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
	<form name=img action="referallogreport.php" method="post" target="_blank">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	



<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
 
  
		<p>&nbsp;</p>
		<p align="center"><b>L<font size="4">og Report Selection Form</font></b></p>
	<div align="center">
	<table border="1" width="49%" cellpadding="10" style="border-collapse: collapse">


<tr>
<td width="18%" bgcolor=" #f2f2f2">
<p align="center">From Date :</td>


<td width="22%" bgcolor=" #f2f2f2" align="center" >
<input type="date" name="date1" class="search" value="<?php echo date('Y-m-d'); ?>" size="24" min="2020-01-01" max="2030-12-31" required></td>


<td width="15%" bgcolor=" #f2f2f2" align="center" >
To Date:</td>


<td width="22%" bgcolor=" #f2f2f2" align="center" >
		<input type="date" name="date2" class="search" value="<?php echo date('Y-m-d'); ?>" size="24" min="2020-01-01" max="2030-12-31" required></td>


	</tr>
	
	


	</table>

</div>

<center>
<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			<input type=submit  value="Next" class='button'>
			</form>
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