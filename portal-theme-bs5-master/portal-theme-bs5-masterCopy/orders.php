<?php

include_once "connection.php";

// $d = $pdo->prepare("select *, sum(stock_in) as stock from inventory_transaction, products_table where store_from=1 
// and inventory_transaction.product_id = products_table.id group by product_id");
// $d = $pdo->prepare("select * from inventory_transaction,products_table where inventory_transaction.product_id = products_table.id");

// "id": "2",
// "inv_trans_id": "0",
// "product_id": "1",
// "stock_in": "8",
// "stock_out": "0",
// "store_from": "1",
// "store_to": "1",
// "date": "2022-09-02"


$e = $pdo->prepare("select * from products_table");
$f = $pdo->prepare("select product_id as invent_id, stock_in, store_from, store_to, date from inventory_transaction");
$g = $pdo->prepare("select id as store_id, store_name from store");
$h = $pdo->prepare("select product_id as waste_id,stock_in,store_from,store_to,date from waste_record");

//1. get the last request date 
//2. get the last request quantity
//3. 
// $e = $pdo->prepare("select * from inventory_transaction where store_from=1 group by product_id ");

$e->execute();
$f->execute();
$g->execute();
$h->execute();

$row = $e->fetchAll(PDO::FETCH_ASSOC);
$row2 = $f->fetchAll(PDO::FETCH_ASSOC);
$row3 = $g->fetchAll(PDO::FETCH_ASSOC);
$row4 = $h->fetchAll(PDO::FETCH_ASSOC);

$merged_data = array_merge($row,$row2,$row3,$row4);

// print_r($merged_data);


$json = json_encode($merged_data);

// $json2 = json_encode($row2);


header("content-type:application/json");

echo $json;
// echo $json2;

exit();




?>