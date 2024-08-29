<?php
include('sadminsession.php');
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

<?php 
  
if (isset($_POST['submit']))
 { 
 
 $tit=$_POST['title'];
  $adrs1=$_POST['adrs1'];
 $adrs2=$_POST['adrs2'];
 $phone=$_POST['phone'];


$sql="select id from title ";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $idnum=strtoupper($myrow[0]); 

 		
      }

$titl=strtoupper($tit);
$address1=strtoupper($adrs1);
$address2=strtoupper($adrs2);
$idnum++;

$sql1="insert into title(id,title,address1,address2,phone) values('$idnum','$titl','$address1','$address2','$phone')";
$rd1=mysql_query($sql1);

 
} 

?>

	<div id="header">
	<br><br>
<center><font color=white size=6><?php echo $title; ?></font></center>
		
	<br>

		
		</div>
<?php
include('smenu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
	<form name=img action="#" method="post">


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
  font-size: 1.0rem;
  cursor: pointer;
  line-height: 1.1;
  background-color: #fff;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
}
}
</style>

	
		<p>&nbsp;</p>
		<p align="center"><b>C<font size="4">enter Enroll&nbsp; Form</font></b></p>
	<div align="center">
	<table border="0" width="47%" cellpadding="12" style="border-collapse: collapse" cellspacing="4">







<tr>
<td width="35%" bgcolor=" #f2f2f2" align="center">
Title of the Center :</td>


<td width="58%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="title"  rows=2 size=56         style="width:400px; height:50px;"  required class="address"></td>


	</tr>
	
	





<tr>
<td width="35%" bgcolor=" #f2f2f2" align="center">
Address Line1 :</td>


<td width="58%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="adrs1" size=56   style="width:400px; height:50px;"required></td>


	</tr>
	
	





<tr>
<td width="35%" bgcolor=" #f2f2f2" align="center">
Address Line 2 :</td>


<td width="58%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="adrs2" size=55  style="width:400px; height:50px;" required></td>


	</tr>
	
	





<tr>
<td width="35%" bgcolor=" #f2f2f2" align="center">
&nbsp;Phone Number :<p>(separate by camas)</td>


<td width="58%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="phone" size=57  style="width:400px; height:30px;" required></td>


	</tr>
	
	





	</table>

</div>

<center>
<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			<input type=submit  value="Enroll" class='button' name=submit>
			</form>
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