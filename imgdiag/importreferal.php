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

	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	



<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:(null)3="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
 
  

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
include('adminsession.php');
include('connection.php');

?>	
	
	
	
	
	
	
	<?php
	date_default_timezone_set("Asia/Kolkata");
	?>
	
	
	
<?php 
  
if (isset($_POST['submit']))
{ 

 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
  $doct = $csv[0];
  $testt=$csv[1];
  $amt=$csv[2];
  
  $doctor=strtoupper($doct);
    $test=strtoupper($testt);

 
  
  $sql="select did from doctor where id='$id' and doctorname='$doctor'";
  $rs=mysql_query($sql);
    while($myrow=mysql_fetch_array($rs))
     {
           $doctid=strtoupper($myrow[0]); 
 		
      }
      
       $sql1="select sno from tests where id='$id' and testname='$test'";
  $rs1=mysql_query($sql1);
    while($myrow=mysql_fetch_array($rs1))
     {
           $testid=strtoupper($myrow[0]); 
 		
      }
  
   if($testt !="reftest")
  {
  mysql_query("INSERT INTO referals(id,refdoctorid,reftestid,refamount) VALUES ('$id','$doctid','$testid','$amt')");
  $doctid='';
  }
  
 }
} 
?> 
	
	
	
	
	
	
	
	
	
	
	
	
	
		<p>&nbsp;Template for Import Referals : <a href="referal_templates.csv">Click here</a><p>&nbsp;<p>&nbsp;<form method="post" action="#" enctype="multipart/form-data">
  <input type="file" name="file"/>
  <input type="submit" name="submit" value="Submit"/>
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