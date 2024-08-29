<?php
include('usersession.php');
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->

<html>
<head>


<META HTTP-EQUIV='refresh'>

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
		
		
		<p align="center"><font size="5">
		
		<form name=ggh action=userreport.php method=post target="_blank">
	<?php
include('connection.php');

$pname=$_POST['pname'];
$uu=$_POST['user'];

?>	
<?php
include('usermenu.php');
?>
<table width=100%><tr><td align=right width=98%><font face="Arial">Welcome Mr./ Ms. : <?php echo $uu; ?>&nbsp;</td><td align=center> <img src="images/login.png" height=50 width=50></td></tr></table>


<br><br>
		<u>Add Tests to Patient</u> [<?php echo $pname; ?>]
<br>

<?php
include('connection.php');

$date = $_POST['date'];
$pname=$_POST['pname'];
$mrd=$_POST['mrd'];
$age=$_POST['age'];
$doctor=$_POST['searchid'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$aadhar=$_POST['aadhar'];
$uu=$_POST['user'];
$id=$_POST['id'];

$mode=$_POST['mode'];

$d=0;
$sql3="select did from doctor where doctorname='$doctor' and id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $did=strtoupper($myrowc[0]); 
 $d++;
}
echo "<input type=hidden name=did value='$did'>";
if($d>0)
{
echo"<input type=hidden name=pname value='$pname'><input type=hidden name=date value='$date'><input type=hidden name=mrd value='$mrd'>
<input type=hidden name=doctor value='$doctor'><input type=hidden name=address value='$address'><input type=hidden name=gender value='$gender'>

<input type=hidden name=mobile value='$mobile'><input type=hidden name=age value='$age'><input type=hidden name=aadhar value='$aadhar'> <input type=hidden name=mode value='$mode'>";


echo"<br><table border=0 width=70%  style='border-collapse: collapse'>



<tr>
<td width='17%' bgcolor=#F9EEDF>
<p align='center'><font size=3> Ref.Doctor Name :</td>


<td width='25%'  align='center' bgcolor=#EEFCA0>
<font size=3>$doctor</td>


<td width='17%' bgcolor=#F9EEDF align='center' >
<font size=3>Patient Name :</td>


<td width='17%'  align='center' bgcolor=#EEFCA0>
<font size=3>$pname </td>


	</tr></table>";
}

if($d==0)
{
echo"<center> <font color=red size=5><p class=blink> YOU ARE SELECTED WRONG DOCTOR </p>";

}
?>
	
	
	

<?php

require_once('dbconn.php');



$sth = $dbconn->prepare("SELECT tnumber,testname,discount,refamount,cost,raddiscount FROM dummy where name='$pname' and user='$uu'");
$sth->execute();
/* Fetch all of rows in the result set */
$results = $sth->fetchAll();



?>


<?php 
  
  $sth= $dbconn->prepare("SELECT count(*) FROM dummy");
  $sth->execute();
  $result1=$sth->fetchColumn();
  //echo $result1;
  
  ?>

  </font></p>

  <div class="tab-content">
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>
 

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
	url: "usertestsearch.php",
	data: dataString,
	cache: false,
	success: function(html)
	{

$("#resultt").html(html).show();
	}
	});
}return false;    
});

jQuery("#resultt").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#resultt").fadeOut(); 
	}
});

$('#searchid').click(function()

{
	jQuery("#resultt").fadeIn();
	

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
	#resultt
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
	
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">

<head>


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
    
    
    
    
    
    
    
    
    
    
    
    
    

    <input type="hidden" id ='prod_id' value='' />



<br>
  <div align="center">


  <table  border="1" width="75%" cellpadding="10" style="border-collapse: collapse">
  
  <tr>
        <!-- <th>#</th> -->
        	<th bgcolor="#588181"><font color="#FFFFFF">Test Name</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Discount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Rad Discount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Ref. Amount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Action</font></th>
     <input type="hidden" id ='cid' value='<?php echo $id; ?>' />
     <input type="hidden" id ='pname' value='<?php echo $pname; ?>' />
     <input type="hidden" id ='user' value='<?php echo $uu; ?>' />


		</tr>


      <tr>

<td><div class="content">

<input type="text" size="60" class="search" id="searchid" name="searchid" placeholder="Search for Tests"  style='text-transform:uppercase' autocomplete="off"></left>

<div id="resultt">
</div>
</div></td>
  
         <td> <input type='text'  id='price'  placeholder=' Enter Discount' autocomplete="off" /></td>
         
                  <td> <input type='text'  id='raddisc'  placeholder='Enter Rad Dsicount' autocomplete="off" /></td>

          
         <td> <input type='number' id='category'  placeholder='Enter Ref.Amount'  autocomplete="off" /></td>
         


          
<td><button type='button' id='saverecords'  class="button"   value ='Add Records'><i class="fa fa-plus"></i>
			&nbsp;&nbsp;Add Test</button></td></tr></table>
        

 
</div>
        

 
<?php 
  
$sth= $dbconn->prepare("SELECT SUM(cost) AS ctot FROM dummy where name='$pname'");
$sth->execute();
$ctot=$sth->fetchColumn();


$sth= $dbconn->prepare("SELECT SUM(discount) AS disc FROM dummy where name='$pname'");
$sth->execute();
$disc=$sth->fetchColumn();

$sth= $dbconn->prepare("SELECT SUM(raddiscount) AS raddisc FROM dummy where name='$pname'");
$sth->execute();
$raddisc=$sth->fetchColumn();

$result2=$ctot-($disc+$raddisc);

?><?php 
  
$sth= $dbconn->prepare("SELECT count(*) FROM dummy");
$sth->execute();
$result1=$sth->fetchColumn();
//echo $result1;

?>

<div class="panel panel-info">
         
         <!-- <div class="panel-title pull-right"><span class="badge badge-secondary"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $result2; ?></span></div>             -->
           
         </div>
        
			
    <table border="1" width="75%" cellpadding="10" style="border-collapse: collapse" align="center">
		<tr>
        <!-- <th>#</th> -->
        	<th bgcolor="#588181"><font color="#FFFFFF">Test Name</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Cost</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Discount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Rad Discount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Ref. Amount</font></th>
			<th bgcolor="#588181"><font color="#FFFFFF">Action</font></th>
		</tr>
  <?php
  /* FetchAll foreach with edit and delete using Ajax */
  if($sth->rowCount()):
   foreach($results as $row){ ?>
     	<tr>
       <!-- <td><?php //echo $row['id']; ?></td> -->
       		<td style="font-size:14px;color:black; text-transform: uppercase;" bgcolor="#d1e0e0">
       <?php echo $row['testname']; ?></td>
			<td bgcolor="#d1e0e0"><center><?php echo $row['cost']; ?></td>
			<td bgcolor="#d1e0e0"><center><?php echo $row['discount']; ?></td>
			<td bgcolor="#d1e0e0"><center><?php echo $row['raddiscount']; ?></td>
			<td bgcolor="#d1e0e0"><center><?php echo $row['refamount']; ?></td>
			<td bgcolor="#d1e0e0">
			<center><font color="#FFFFFF">
			<input type=button  value="Delete" class='delbtn button3' data-pid=<?php echo $row['tnumber']; ?> href='javascript:void(0)' style="color: #FFFFFF; font-size: 12pt; font-weight: bold"></font></a></td>
		</tr>
   <?php }  ?>
  <?php endif;  ?>
  	</table>
  	<div class="panel-heading">
         <h3 class="panel-title pull-right"><i class="fa fa-money"></i>Net Amount :&nbsp;&nbsp;<span class="badge badge-secondary"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $result2; ?></span></h3>
       
       
	<p>&nbsp;</div>
     <p align="center">
     </div>
  

  </div>
  <script>
    $(function(){

      /* Delete button ajax call */
      $('.delbtn').on( 'click', function(){
        if(confirm('This action will delete this record. Are you sure?')){
          var pid = $(this).data('pid');
          $.post( "delete_ajax.php", { pid: pid })
          .done(function( data ) {
            if(data > 0){
              $('.success').show(30).html("Record deleted successfully.").delay(32).fadeOut(60);
            }else{
              $('.error').show(3000).html("Record could not be deleted. Please try again.").delay(3200).fadeOut(6000);;
            }
            setTimeout(function(){
                window.location.reload(1);
            }, 50);
          });
        }
      });

     /* Edit button ajax call */
      $('.editbtn').on( 'click', function(){
          var pid = $(this).data('pid');
          $.get( "getrecord_ajax.php", { id: pid })
            .done(function( product ) {
              data = $.parseJSON(product);

              if(data){
                $('#prod_id').val(data.id);
                $('#searchid').val(data.searchid);
                $('#price').val(data.price);
                $('#category').val(data.category);
                $("#saverecords").val('Save Records');
            }
          });
      });

      /* Edit button ajax call */
      $('#saverecords').on( 'click', function(){
           var prod_id  = $('#prod_id').val();
           var product = $('#searchid').val();
           var price   = $('#price').val();
           var raddisc   = $('#raddisc').val();
           var category = $('#category').val();
            var cid = $('#cid').val();
            var pname = $('#pname').val();
            var user = $('#user').val();


           if(!product){
             $('.error').show(30).html("All fields are required.").delay(32).fadeOut(30);
           }else{
                if(prod_id){
                var url = 'edit_record_ajax.php';
              }else{
                var url = 'add_records_ajax.php';
              }
                $.post( url, {prod_id:prod_id, product: product, category: category, price: price,raddisc:raddisc,cid:cid,pname:pname,user:user  })
               .done(function( data ) {
                 if(data > 0){
                   $('.success').show(30).html("Record saved successfully.").delay(20).fadeOut(10);
                 }else{
                   $('.error').show(30).html("Record could not be saved. Please try again.").delay(20).fadeOut(1000);
                 }
                 $("#saverecords").val('Add Records');
                 setTimeout(function(){
                     window.location.reload(1);
                 }, 15);
             });
          }
       });
    });
 </script>
<input type=submit  value="Next to Submit" class='button' style="font-weight: 700" >
	</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	</form>	
	</div>			
	<div id="header">
		<div style="width: 1258px; height: 35px">
				<b>
				<span><?php include('footer.php'); ?></span>
			</b>
			
	
</html>