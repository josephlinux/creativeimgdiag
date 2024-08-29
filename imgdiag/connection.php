<?php
 $host="localhost";
 $user="root";
 $password="";
$link=mysql_connect($host,$user,$password) or die ("could not connect to the mysql".mysql_error());
mysql_select_db("imgdiag");

?>

