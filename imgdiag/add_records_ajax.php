<?php

  require_once('dbconn.php');
  include('connection.php');
  
    $pname= trim($_POST["pname"]);
  $cid= trim($_POST["cid"]);
  $product  = trim($_POST["product"]);
  $price    = trim($_POST["price"]);
  $category = trim($_POST["category"]);
  $raddisc = trim($_POST["raddisc"]);
  $user = trim($_POST["user"]);

$sql6="Select cost,category from tests where testname='$product'";
$rs6=mysql_query($sql6) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs6))
 {
           
$cost=strtoupper($myrowc[0]);$cate=strtoupper($myrowc[1]);

}

// prepare sql and bind parameters
    $stmt = $dbconn->prepare("INSERT INTO dummy(testname, discount,refamount,cost,raddiscount,id,name,category,user)
    VALUES (:product, :price, :category, :cost, :raddiscount, :cid, :pname, :cate ,:user )");
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':cost', $cost);
    $stmt->bindParam(':raddiscount', $raddisc);
    $stmt->bindParam(':cid', $cid);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':cate', $cate);    
    $stmt->bindParam(':user', $user);
    // insert a row
    if($stmt->execute()){
      $result =1;
    }

    echo $result;
    $dbconn = null;
