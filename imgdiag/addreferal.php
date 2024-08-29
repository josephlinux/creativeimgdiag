<?php
include('adminsession.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>

	<title>Creative Billing Software</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    
    <!-- Favicon -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    
    <link rel="stylesheet" href="mycss.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</head>




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
include('css2.php');

?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>

	
	
<form name=ex action=# method=post enctype="multipart/form-data">


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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


    
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search2").keyup(function() 
{ 
var searchid2 = $(this).val();
var dataString = 'search2='+ searchid2;
if(searchid2!='')
{
	$.ajax({
	type: "POST",
	url: "testsearch2.php",
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
	#searchid2
	{
		width:200px;
		border:solid 1px #000;
		padding:10px;
		font-size:12px;
		align :center;
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

    
    
     
    
    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	

<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<script type="text/javascript" src="table_script.js"></script>
</head>

	
   <script>
var total=0;
var count=1;
function add_row()
{
 var searchid=document.getElementById("searchid").value;
  var amount=document.getElementById("amount").value;
 var searchid2=document.getElementById("searchid2").value;




 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<center><tr  id='row"+table_len+"'><td  id='searchid"+table_len+"'><center>"+"<font color=blue size=3>"+searchid+"</td><td id='searchid2"+table_len+"'><center>"+"<font color=blue size=3>"+searchid2+"</td><td id='amount"+table_len+"'><center>"+"<font color=blue size=3>"+amount+"</td><input type='hidden' name='n1[]' value='"+searchid+"'><input type='hidden' name='n2[]' value='"+searchid2+"'><input type='hidden' name='n3[]' value='"+amount+"'><input type='hidden' name='count' value='"+count+"'></td><td><input type='button' class='btn btn-success' style='color:darkred; width: 100px; height: 30px' value='DELETE' class='delete' onclick='delete_row("+table_len+")'></td></tr>";


 document.getElementById("searchid").value="";
 
 

 count++;
 
 
}
</script>

	
	
	
	
	
	
	<?php
	date_default_timezone_set("Asia/Kolkata");
	?>
	
	
	
		<p align="center"><b><font size="4">Add Referal Form</font></b></p>
	<div align="center">

						
						<table cellspacing=1 cellpadding=1 id="data_table" border=1 style="border-collapse: collapse" width=60%>
<tr>
<th bgcolor="#588181" width="501"><center><font color="#FFFFFF">Doctor Name</font></th>
<th bgcolor="#588181" width="501"><center><font color="#FFFFFF">Test Name</font></th>
<th bgcolor="#588181" width="501"><center><font color="#FFFFFF">Amount</font></th>

<th width=20% bgcolor="#588181" width="501"><center><font color="#FFFFFF">Action</font></th>

</tr>


<tr>


<div class="content">

<td width="25%" bgcolor=" #f2f2f2" align="center" >
<input type="text" size="60" class="search" id="searchid" name="searchid" placeholder="Type Doctors Name" autocomplete="off">
<div id="result">
</div>
</div>
</td>

<div class="content">
<td width="25%" bgcolor=" #f2f2f2" align="center" >
<input type="text" size="60" class="search2" id="searchid2" name="searchid2" placeholder="Type Test Name" autocomplete="off" >
<div id="result2">
</div>
</div>
</td>


<td width="20%" bgcolor=" #f2f2f2" align="center" >
<font size="4">
<input type="textbox" name="amount" class="textbox" id="amount" size="16" placeholder="Enter Ref Amount"  required></td>

<td width="20%" bgcolor=" #f2f2f2" align="center" >
<input type="button" class="add" onclick="add_row();"  value="Add"></td>


	</tr>
		
		</table>

</div>
						<p>&nbsp;</p>
	<p style="text-align: center">
	<input type="submit" value="Submit"   name="submit"></p>
						<p>&nbsp;</p>
					
                </form>

<form name=dd method=post>
	
	<?php
	 include('connection.php');
  
  
  $count=$_POST['count'];
  
  if($count >= 1)
  {
  
   $kv1 =array(); $kv2 = array(); $kv3 = array();$kv4 = array();$kv5 = array();$kv6 = array();


 
foreach ($_POST['n1'] as $i1 => $value1)
{
  $kv1[] = "$value1";
}

foreach ($_POST['n2'] as $i2 => $value2)
{
  $kv2[] = "$value2";
}
foreach ($_POST['n3'] as $i3 => $value3)
{
  $kv3[] = "$value3";
}



for($s=0; $s<$count; $s++)
{
$tid='';
$sql="select sno from tests where id='$id' and testname='$kv2[$s]'";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $tid=strtoupper($myrow[0]); 
}

$did='';
$sql1="select did from doctor where id='$id' and doctorname='$kv1[$s]'";
    
    $rs1=mysql_query($sql1);

    while($myrow=mysql_fetch_array($rs1))
     {
   
        $did=strtoupper($myrow[0]); 
}

if(($kv3[$s] !='')&&($tid !=''))
{

$sql3="insert into referals(id,refdoctorid,reftestid,refamount) values ('$id','$did','$tid','$kv3[$s]')";
$rd=mysql_query($sql3);
 }

}
 	echo "REFERALS INSERT SUCESSFULLY...";
 	
 	echo"<script>
         setTimeout(function(){
            window.location.href = 'addreferal.php';
         }, 1000);
      </script>";

 	
 	}
?>
	
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