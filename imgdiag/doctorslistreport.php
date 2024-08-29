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

	
	
	<form name=img action="updatedoctorlistinsert.php" method="post">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	



<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
 
    
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "doctorsearch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{

$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});

$('#searchid').click(function()

{
	jQuery("#result").fadeIn();
	

});
});
</script>




<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:18px;
		color:black
	}
	.content{
		width:300px;
		margin:0 auto;
	}
	#searchid
	{
		width:200px;
		border:solid 1px #000;
		padding:10px;
		font-size:12px;
		align :center;
	}
	#result
	{
		position:absolute;
		width:200px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
		font-color:black
		
	}
	.show
	{
		padding:8px; 
		border-bottom:1px #999 dashed;
		font-size:12px; 
		height:30px;
		font-color:black
		
	}
	.show:hover
	{
		background:white;
		color:#FFF;
		cursor:pointer;
	}
</style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    
    
     
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
	date_default_timezone_set("Asia/Kolkata");
	?>
	
	<style>
select {
  width: 70%;
  min-width: 15ch;
  max-width: 30ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.25rem;
  cursor: pointer;
  line-height: 1.1;
  background-color: #fff;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
}
}
</style>
	
		<p>&nbsp;</p>
		<p align="center"><font size="4"><b>Complete Doctors Information and also Update here anything else</b></p>
<p align="center">
		<?php
						
include('connection.php');






echo"<table border=1 width=90% bgcolor= #f2f2f2 height=60>
			<tr>
				<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=30% align=center colspan=7>
				<font color=#080808><b><u>DOCTORS DETAILS</u></b></font></td>
			</tr>
			<tr>
				
				<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=14% align=center>
				<font color=#080808 size=2><b>S.no</b></font></td>
				
				
				<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=14% align=center>
				<font color=#080808 size=2><b>DOCTOR ID</b></font></td>

				
				<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=50% align=center>
				<font color=#080808 size=2><b>Name</b></font></td>
				
				<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=10% align=center>
				<font color=#080808 size=2><b>hospital</b></font></td>

<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=20% align=center>
				<font color=#080808 size=2><b>phone</b></font></td>


<td height=30 bgcolor= #f2f2f2 bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=50% align=center>
				<font color=#080808 size=2><b>address</b></font></td>

				
			</tr><tr>";		
	
	

$sql6="Select doctorname,hospital,phone,address,did from doctor where id='$id' ";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$dname=strtoupper($myrowc[0]);
$hospital=strtoupper($myrowc[1]);
$phone=strtoupper($myrowc[2]);
$address=strtoupper($myrowc[3]);
$did=strtoupper($myrowc[4]);

$i++;



echo"<tr>";

echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=12% align=center>
				<font color=#080808 size=2><b>$i</b></font></td>";
				
				echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=12% align=center>
				<font color=#080808 size=2><b>$did<input type=hidden name='n8[]' value='$did'></b></font></td>";
				

				
				echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=20% align=center>
				<font color=#080808 size=2><b><input type=text name='n2[]' value='$dname' size=40></b></font></td>";
				
				echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=6% align=center>
				<font color=#080808 size=2><b><input type=text name='n3[]' size=40 value='$hospital'></b></font></td>";
				
echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=12% align=center>
				<font color=#080808 size=2><b><input type=text name='n4[]' value='$phone'></b></font></td>";
				
echo"<td height=30 bgcolor=white bordercolorlight=#000000 bordercolordark=#000000 style=border-style: solid; border-width: 1px width=12% align=center>
				<font color=#080808 size=2><b><input type=text size=50 name='n5[]' value='$address'></b></font></td>";

				
				echo"</tr>";
				
				
}

echo"<input type=hidden  name='count' value='$i'></table>";
?>
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