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
	
	
	
		<p>&nbsp;</p>
		<p align="center"><b><font size="4">Patient Registration Form</font></b></p>
	<div align="center">
	<table border="1" width="70%" cellpadding="10" style="border-collapse: collapse">


<tr>
<td width="18%" bgcolor=" #f2f2f2">
<p align="center">Date :</td>


<td width="27%" bgcolor=" #f2f2f2" align="center" >
<input type="date" name="date" class="search" value="<?php echo date('Y-m-d'); ?>" size="24" min="2020-01-01" max="2030-12-31" autocomplete="off" required></td>


<td width="14%" bgcolor=" #f2f2f2" align="center" >
Patient Name :</td>


<td width="32%" bgcolor=" #f2f2f2" align="center" >
		<input type="text" name="pname" size="24" autocomplete="off" required></td>


	</tr>
<tr>
<td width="18%" bgcolor=" #f2f2f2">
<p align="center">Age :</td>


<td width="27%" bgcolor=" #f2f2f2" align="center" >
<input type="text" name="age" size="24" autocomplete="off"></td>


<td width="14%" bgcolor=" #f2f2f2" align="center" >
Gender :</td>


<td width="32%" bgcolor=" #f2f2f2" align="center" autocomplete="off">
		Male <input type="radio" value="male" name="gender" required>&nbsp;&nbsp; Female
		<input type="radio" value="female" name="gender" required></td>


	</tr>
<tr>
<td width="18%" bgcolor=" #f2f2f2">
<p align="center">Mobile Number :</td>


<td width="27%" bgcolor=" #f2f2f2" align="center" >
<input type="text" name="mobile" size="24" autocomplete="off"></td>


<td width="14%" bgcolor=" #f2f2f2" align="center" >
Payment Mode :</td>


<td width="32%" bgcolor=" #f2f2f2" align="center" >
		<input type="radio" name="mode" size="24" autocomplete="off" value='cash' required> Cash --
		<input type="radio" name="mode" size="24" autocomplete="off" value='card' required> Card --
		<input type="radio" name="mode" size="24" autocomplete="off" value='online' required> Online</td> 

	</tr>


<tr>
<td width="18%" bgcolor=" #f2f2f2">
<p align="center">Address :</td>


<td width="27%" bgcolor=" #f2f2f2" align="center" >
<textarea rows="3" name="address" cols="24" autocomplete="off"></textarea></td>


<td width="14%" bgcolor=" #f2f2f2" align="center" >
Referral Doctor :</td>


<td width="32%" bgcolor=" #f2f2f2" align="center" >
<div class="content">

<input type="text" size="60" class="search" id="searchid" name="searchid" placeholder="Search for Doctors"  style='text-transform:uppercase' autocomplete="off" required></left>

<div id="result">
</div>
</div>

</td>
	</tr>
	
	





	</table>

</div>

<center>
<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			<input type=submit  value="Next" class='button' >
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