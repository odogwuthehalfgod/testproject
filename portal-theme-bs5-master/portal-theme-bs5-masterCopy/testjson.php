<?php
include_once "connection.php";


$sql = $pdo->prepare("select * from products_table");

$sql->execute();


$row = $sql->fetchAll(PDO::FETCH_ASSOC);


$json = json_encode($row);




header("content-type:application/json");
echo $json;



?>