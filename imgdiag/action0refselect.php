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







</style>
	<div id="header"><br><br>
<center><font color=white size=7><?php echo $title; ?></font></center>
	<br>

		
		</font>

		
		</div>

<?php
include('menu.php');
?>


  <form name=main action=action0refdisplay.php   method=POST >


<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

		<p>&nbsp;</p>
		&nbsp;<center>
		<p>&nbsp;</p>
<?php
                
            echo"<div align='center'>
		<table border=1 height=60 width=50% id=customers>
			<tr>
				<td height='30' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' width='84%' align='center' colspan='4'>
				<font face='Arial' size='4.5' color='#080808'>
				<b>Select Start and End Date For 0 Referal Action</font></td>
			</tr>
			<tr>
				<td height='63' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' width='17%' align='center'>
				<b>
				<font color='#000000' face='Arial Unicode MS'>
            	Date 1:</font></td>
				<td height='63' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' width='20%' align='center'>
                <b>
				<font color='#000000' size='4' face='Verdana'>
				<input type='date'  name='date1'   size=1 class='textbox' size='23' style='float: left; font-family:Verdana; font-size:10pt' size=1></font></td>
				<td height='63' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' width='17%' align='center'>
                
				<b><font color='#000000' face='Arial Unicode MS'>Date 2 :</font></b></td>
				<td height='63' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' width='20%' align='center'>
                <b>
				<font color='#000000' size='4' face='Verdana'>
				<input type='date'  name='date2'   size=1 class='textbox' size='23' style='float: left; font-family:Verdana; font-size:10pt' size=1></font></td>
			</tr>
			<tr>
				<td height='70' bgcolor='#F7E1B5' bordercolorlight='#000000' bordercolordark='#000000' style='border-style: solid; border-width: 1px' colspan='4'>
                <b>
				<p align='center'>
                                <button type='submit' class='button' >
								<p style='text-align: left'>
								<font face='MS Serif' size='4'> 
								NEXT</font></button>
				</td>
			</tr>
			</table>";
		
			
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