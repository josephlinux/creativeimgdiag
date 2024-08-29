<?php
session_start();
$userid = $_SESSION["userid"];
$id = $_SESSION["id"];
$type = $_SESSION["type"];

$log=1;

if($type !="admin")
{
header("location:logout.php");

}
$user = $_SESSION["uname"];

if(!session_is_registered('userid'))
{
header("location:index1.php");
}
$uu=$user;
?>