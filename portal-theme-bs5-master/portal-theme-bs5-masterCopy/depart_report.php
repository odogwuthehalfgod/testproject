<?php

include "connection.php";

$depart_report = $pdo->prepare("select product_name,sum(stock_in),store_name from inventory_transaction,products_table,store 
where products_table.id=inventory_transaction.product_id and inventory_transaction.store_to=store.id group by store_to");

$depart_report->execute();

while($row=$depart_report->fetch(PDO::FETCH_ASSOC)){
    if($row["store_name"]!="Admin Store"){
        print_r($row);
    }
}



?>