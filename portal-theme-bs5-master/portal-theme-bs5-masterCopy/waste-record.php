<?php

include_once "connection.php";

session_start();


if(isset($_POST["request"])){
     $date = date("Y-m-d");


                $product__id = $_POST["pid"];

                $product_name = $_POST["product__name"];
             
                $cur_stock = $_POST["cur__stock"];
                $req_quantity = $_POST["req__quantity"];
                $store_from = $_POST["store__from"];
                $store_to = $_POST["store__to"];

                $remark="";
                $requested_by="";

                $zero = 0;

                foreach($product__id as $index => $items){

                    
                    $sql = $pdo->prepare("insert into waste_record (product_id,stock_in,store_from,store_to,date) 
                    values (:product_id,:stock_in,:store_from,:store_to,:date)");

                        $sql->bindParam(":product_id",$product__id[$index]);
 
                        $sql->bindParam(":stock_in",$req_quantity[$index]);
                        $sql->bindParam(":store_from",$store_from[$index]);
                        $sql->bindParam(":store_to",$store_to[$index]);
                        $sql->bindParam(":date",$date);


                         $sql->execute();
                }
                
                if($sql->rowCount()){
                    echo "The data has been inserted successfully";
        
                    // header("refresh:1;request.html");
                }

               

}