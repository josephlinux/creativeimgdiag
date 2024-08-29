<?php
include('connection.php');
include('referalsessions.php');



echo "<input type=hidden name=value value='$jj'>";

if($_POST)
{
$qq=$_POST['search'];

$q=strtoupper($qq);

$sql9="select testname from tests where id='$id' and testname like '%$q%'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $username=strtoupper($myrowc[0]); 

 
 $b_username='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
?>
<div class="show" align="left">
<span class="name"><font color=black ><?php echo $username; 
 ?>

</font></span>&nbsp;<br/>
</div>

<?php
?>
<?php
}

}
?>