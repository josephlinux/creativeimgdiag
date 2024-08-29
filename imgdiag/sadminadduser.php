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
  $center=$_POST['center'];
  $name=$_POST['name'];
 $uname=$_POST['uname'];
 $utype=$_POST['utype'];


$sql="select id from title where title='$center'  ";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {   
      $idnum=strtoupper($myrow[0]);  		
     }
     
    
$un=0;
 $sql1="select username from login where username='$uname'";
    
    $rs1=mysql_query($sql1);

    while($myrow=mysql_fetch_array($rs1))
     {
   
        $user=($myrow[0]); 
 		
 		$un++;
     }
     
   if($un>0)
   {
   echo '<script>alert("username already assign")</script>'; 

	}
  
  
  if($un==0)
 {
$password="welcome";
$sql2="insert into login(id,name,username,password,type) values('$idnum','$name','$uname','$password','$utype')";
$rd2=mysql_query($sql2);

   echo '<script>alert("user Created Sucessfully")</script>'; 

}



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
		<p align="center"><b><font size="4">User Enroll&nbsp; Form</font></b></p>
	<div align="center">
	<table border="0" width="47%" cellpadding="10" style="border-collapse: collapse" height="279">

<tr>
<td width="46%" bgcolor=" #f2f2f2" align="center">Select Center </td><td bgcolor=" #f2f2f2" align="center">
<select name=center style="font-size: 12pt; font-family: Times New Roman; color: #008000; text-align: justify; word-spacing: 1; border: 1px solid #C0C0C0; margin-top: 1; margin-bottom: 3" size="1">
<option>Select Center</option>
<?php
$sql="select title from title";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $title=strtoupper($myrow[0]); 
echo "<option>$title</option>";
 		
      }

?>
</select></td></tr>

<tr>
<td width="46%" bgcolor=" #f2f2f2" align="center">
Name of the Person :</td>


<td width="35%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="name" size=36 required></td>


	</tr>
	
	





<tr>
<td width="46%" bgcolor=" #f2f2f2" align="center">
Enter User Name :</td>


<td width="35%" bgcolor=" #f2f2f2" align="center" >

		<input type="text" name="uname" size=36 required></td>


	</tr>
	
	





<tr>
<td width="35%" bgcolor=" #f2f2f2" align="center" >
User Type:</td><td bgcolor=" #f2f2f2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=radio name=utype value=admin>Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <input type=radio name=utype value=user>User </td>


	</tr>
	
	





<tr>
<td width="81%" bgcolor=" #f2f2f2" align="center" colspan="2">

</left>
		You are Adding User Default <b>Password : welcome</b> (after login 
change password)</td>


	</tr>
	
	





	</table>

</div>

<center>
<p><font color="#FFFFFF">
<input type=hidden name=refresh value=1><input type=hidden name=id value='<?php echo $id; ?>'>
<input type=hidden name=user value='<?php echo $uu; ?>'>

			<input type=submit  value="submit" class='button' name=submit>
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