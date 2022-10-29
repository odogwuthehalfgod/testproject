<?php

include_once "connection.php";

$level_query = $pdo->prepare("select count(*) as count from user where role='admin'");

$level_query->execute();

while($row=$level_query->fetch(PDO::FETCH_ASSOC)){
    $level = $row["count"];
    global $level;
}

$final_level = $level + 1;

$sql = $pdo->prepare("select * from raised_request");

// $sql->bindParam(":final_level", $final_level);

$sql->execute();

while($row=$sql->fetch(PDO::FETCH_ASSOC)){
   if($final_level == $row["final_level"]){
    echo $row["req_ref"]." has been approved<br>";
    echo "<a href='transact-copy.php?id=".$row["id"]."'>Accept Goods</a><br>";
}else{
       echo $row["req_ref"]." pending<br>";

   }
}




if(isset($_GET["id"])){

    // echo "working";
$id = $_GET["id"];


$sql2 = $pdo->prepare("select distinct * from purchase_request, products_table where purchase_request.rid=:id and purchase_request.product__id = products_table.id");
// echo $id;

$sql2->bindParam(":id", $id);

$sql2->execute();

$num_of_rows = $sql2->rowCount();

// echo $num_of_rows;

$row1=$sql2->fetchAll(PDO::FETCH_ASSOC);

 $inv_transact = $pdo->prepare("insert into inventory_transaction (inv_trans_id,product_id,stock_in,stock_out,store_from,store_to,date) values
 (:inv_trans_id,:product_id,:stock_in,:stock_out,:store_from,:store_to,:date)");

for($i=0;$i<$num_of_rows;$i++){

   
        $zero = 0;
        $inv_trans_id = 0;

        // insert into inventory_transaction
        $inv_transact->bindParam(":inv_trans_id", $inv_trans_id);
        $inv_transact->bindParam(":product_id", $row1[$i]["product__id"]);
        $inv_transact->bindParam(":stock_in", $row1[$i]["quantity"]);
        $inv_transact->bindParam(":stock_out", $zero);
        $inv_transact->bindParam(":store_from", $row1[$i]["store_from"]);
        $inv_transact->bindParam(":store_to", $row1[$i]["store_to"]);
        $inv_transact->bindParam(":date", $row1[$i]["date"]);


        $inv_transact->execute();

        if($inv_transact->rowCount()){
            echo "data has been inserted";
        }
    }

   
    }
   
?>