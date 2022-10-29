<?php

include_once "connection.php";





$e = $pdo->prepare("select * from products_table");
$f = $pdo->prepare("select * from purchase_request, products_table where purchase_request.product__id = products_table.id");




$e->execute();
$f->execute();


$row = $e->fetchAll(PDO::FETCH_ASSOC);
$row2 = $f->fetchAll(PDO::FETCH_ASSOC);


$merged_data = array_merge($row,$row2);

// print_r($merged_data);


$json = json_encode($merged_data);

// $json2 = json_encode($row2);


header("content-type:application/json");

echo $json;
// echo $json2;

exit();




?>