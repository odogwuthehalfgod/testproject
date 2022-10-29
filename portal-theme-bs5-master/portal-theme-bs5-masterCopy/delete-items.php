<?php
include "connection.php";

session_start();


$input = file_get_contents("php://input");

 $json = json_decode($input, true);

$e = $json["data"]["rid"];
$f = $json["data"]["prodid"];

$g = $_SESSION["username"];
$h = $_SESSION["approval_level"];
$i = "approved_requisition.php?id=$e";

$no = "no";

$date = date("Y-m-d H:i:s");

$message = $g." deleted an item from a request";

$sql = $pdo->prepare("delete from purchase_request where rid=:req_id and product__id=:prod_id");

$sql2 = $pdo->prepare("insert into notifications (raised_by,approver,message,link,viewed,opened,date,request_not) values 
(:person,:app_id,:message,:link,:view,:open,:date,:request_not)");

$sql->bindParam(":req_id", $e);
$sql->bindParam(":prod_id", $f);

$sql2->bindParam(":person", $g);
$sql2->bindParam(":app_id", $h);
$sql2->bindParam(":message", $message);
$sql2->bindParam(":link", $i);
$sql2->bindParam(":view", $no);
$sql2->bindParam(":open", $no);
$sql2->bindParam(":date",$date);
$sql2->bindParam(":request_not", $e);

$sql->execute();
$sql2->execute();


echo "Data has been deleted";
// //  $sql->bindParam(":prod_id", $f);








?>