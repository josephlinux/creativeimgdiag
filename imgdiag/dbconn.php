<?php

$username  = 'root';
$password  = '';
$result = 0;
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=imgdiag', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>