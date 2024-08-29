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
	url: "refdoctorsearch.php",
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

















<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >

<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search2").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid2!='')
{
	$.ajax({
	type: "POST",
	url: "reftestsearch2.php",
	data: dataString,
	cache: false,
	success: function(html)
	{

$("#result2").html(html).show();
	}
	});
}return false;    
});

jQuery("#result2").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid2').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search2")){
	jQuery("#result2").fadeOut(); 
	}
});

$('#searchid2').click(function()

{
	jQuery("#result2").fadeIn();
	

});
});
</script>

















<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:12px;
		color:black
	}
	.content{
		width:200px;
		margin:0 auto;
	}
	#searchid
	{
		width:170px;
		border:solid 1px #000;
		padding:10px;
		font-size:10px;
	}
	#result
	{
		position:absolute;
		width:200px;
		padding:8px;
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
		font-size:10px; 
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






<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
		font-size:12px;
		color:black
	}
	.content{
		width:200px;
		margin:0 auto;
	}
	#searchid2
	{
		width:170px;
		border:solid 1px #000;
		padding:10px;
		font-size:10px;
	}
	#result2
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
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:10px; 
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
include('referalmenu.php');
?>
<table width=100% ><tr><td align=right width=98%><font face="Arial">Welcome Mr./ 
	Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
  <form name=main action=refamntupdateinsert.php   method=POST>

    
     
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
  background-color: #4CAF50;
  color: white;
}
</style>

  
		<?php
						
include('connection.php');


$refid=$_GET['refid'];



$sql6="Select refdoctorid,reftestid,refamount from referals where refid='$refid'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$doctor=strtoupper($myrowc[0]);$test=strtoupper($myrowc[1]);
$refamt=strtoupper($myrowc[2]);

}

$sql7="Select doctorname from doctor where id='$id' and did='$doctor'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
            
$refdoctor=strtoupper($myrowc[0]);
}


$sql8="Select testname from tests where id='$id' and sno='$test'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
            
$reftest=strtoupper($myrowc[0]);
}


echo"<input type=hidden name=refid value=$refid>";




echo"<table id='customers'>
			<tr>
				<td colspan=8 bgcolor='#588181'><b><u><center><font color=white>DISPLAY OF DETAILS FOR UPDATE</u></b></font></td>
			</tr>
			<tr>
				
				
				<td><b><center>&nbsp;&nbsp;Ref.Doctor&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
				<td><b><center>Test Name</b></font></td>
				<td><center>Referrence amount</font></b></td>
				
			</tr><tr>";		
	
	

				
echo"<td><div class=content>
<input type=text  class='search' id='searchid' name='searchid' value='$refdoctor' placeholder='Search for doctors'  style='text-transform:uppercase'>
<div id='result'>
</div>
</div></td>";
				

				
echo"<td><div class=content>
<input type=text  class='search2' id='searchid2' name='searchid2' value='$reftest' placeholder='Search for Tests'  style='text-transform:uppercase'>
<div id='result2'>
</div>
</div></td>";
		
echo"<td><input type=text name='refamt' value='$refamt' size=10></td>";




echo"</table>";
		
	echo"<input type=hidden size=5 value='$rowss' name='co'>";
		





	
	?>

	


</div>
<p>&nbsp;</p>
		<p>&nbsp;</p>

<input type=submit value='Next to Submit' class=button>
			</form>
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