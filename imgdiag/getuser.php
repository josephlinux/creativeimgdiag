
<?php
include('adminsession.php');
?>
<!DOCTYPE html>
<html>
<head>
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
<body>

<?php
include('connection.php');

$q = strval($_GET['q']);

echo"<br><br><table border=1 height=60 width=60% id=customers>
			<tr>
				<th colspan=3><b><center>$q TEST LIST</u></b></font></th>
			</tr>
			<tr>
				
				<td bgcolor=#F9EEDF><b><center>S.no</b></font></td>
							<td bgcolor=#F9EEDF ><b><center>Test Name</b></font></td>

<td bgcolor=#F9EEDF><b><center>Test Cost</b></font></td>

				
			</tr><tr>";		



$sql6="Select testname,cost from tests where category='$q' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$tname=strtoupper($myrowc[0]);
$tcost=strtoupper($myrowc[1]);

$i++;



echo"<tr>";

echo"<td ><center>$i</b></font></td>";
				
					echo"<td >$tname</b></font></td>";

				echo"<td><center>$tcost</font></td>";

				
				echo"</tr>";
				
				
}

echo"</table>";




?>
</body>
</html>