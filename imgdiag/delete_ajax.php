<?php
include('dbconn.php');

$result = 0;
echo $id = intval($_POST['pid']);

if(intval($id)){
  $stmt = $dbconn->prepare("DELETE FROM dummy WHERE tnumber = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  if($stmt->execute()){
    $result = 1;
  }
}
 echo $result;
 $dbconn = null;
 ?>