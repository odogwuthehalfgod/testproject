<?php


include "connection.php";


    $rid = $_POST["rid"];
    $prodID = $_POST["prodID"];
    $prodPrice = $_POST["prodPrice"];
    $amt = $_POST["total"];
    $qty = $_POST["qty"];

    $sql = $pdo->prepare("update purchase_request set quantity=:qty, unit_price=:price, total_amount=:amt where product__id=:product_id and rid=:rid");
    
    foreach($prodID as $index => $items){
        
        $sql->bindParam(":qty", $qty[$index]);
        $sql->bindParam(":price", $prodPrice[$index]);
        $sql->bindParam(":amt", $amt[$index]);
        $sql->bindParam(":product_id", $prodID[$index]);
        $sql->bindParam(":rid", $rid[$index]);
        
        
        // print_r($rid[$index]);
        $sql->execute();
        if($sql->rowCount()){
            $msg =  "This data has been updated";
    
            echo $msg;
        }

    }

    // if($sql->rowCount()){
    //     $msg =  "This data has been updated";

    //     echo $msg;
    // }

?>