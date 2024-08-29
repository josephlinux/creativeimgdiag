<?php

session_start();
$userid = $_SESSION["userid"];

$id = $_SESSION["id"];
$type = $_SESSION["type"];


if($id !='' && $type =="admin")
{
header("location:main.php");
}

if($id !='' && $type =="user")
{
header("location:usermain.php");
}

$uu=$user;


?>