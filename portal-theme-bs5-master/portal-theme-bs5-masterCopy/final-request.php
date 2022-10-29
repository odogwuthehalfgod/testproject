<?php

include_once "connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";



// use \SendGrid\Mail\Mail;

session_start();

print_r($_POST["product__name"]);
print_r($_FILES["files"]["name"]);
// $product__id = $_POST["pid"];

// $product_name = $_POST["product__name"];
// $unit_price = $_POST["unit__price"];


// $cur_stock = $_POST["cur__stock"];
// $last_req_qty = $_POST["last__req__qty"];
// $last_req_date = $_POST["last__req__date"];
// $req_quantity = $_POST["req__quantity"];
// $total_amount = $_POST["total__amount"];
// $store_from = $_POST["store__from"];
// $store_to = $_POST["store__to"];

// if(isset($product_name)){
//     $targetDir = "upload/";
//     $allowedTypes = array("jpg","png","jpeg");

//     $fileArr = array();

    

//     $imageArr="";

//     if(!empty($proforma)){
//         foreach($ffff2["imageArr"] as $key=>$val){
//             $proformaInvoice = basename($ffff2["imageArr"][$key]);
//             array_push($fileArr, $proformaInvoice);
//             $targetFilePath = $targetDir . $proformaInvoice;

//             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            
//             if(in_array($fileType, $allowedTypes)){
//                 if(move_uploaded_file($proformaInvoice, $targetFilePath)){
                
//                     $imageArr = serialize($fileArr);
                    
                    
//                     global $imageArr;
//                 }
//             }
//         }
//     }else{
//         $empty_array_image = "";
//         $imageArr = serialize($empty_array_image);
//     }

    

//      $date = date("Y-m-d");
//     $pos_id = uniqid("ZMC");

//     $requestInsert = $pdo->prepare("insert into raised_request(req_ref,date_of_req,requested_by,image_arr) values (:rid,:date,:person,:img)");
//     $requestInsert->bindParam(":rid",$pos_id);
//     $requestInsert->bindParam(":date",$date);
//     $requestInsert->bindParam(":person",$_SESSION["username"]);
//     $requestInsert->bindParam(":img",$imageArr);

//     $requestInsert->execute();

//     $id_last = ("SELECT LAST_INSERT_ID()");

//     $result = $pdo->prepare($id_last);
//     $result->execute();
//     $last_id = $result->fetchColumn();


//     function change_to_number($num){
//         $number = (float) str_replace(",","",$num);

//         return $number;
//     }

             
//                 ////////////////////////////////

//                 $product__id = $_POST["pid"];

//                 $product_name = $_POST["product__name"];
//                 $unit_price = $_POST["unit__price"];

                
//                 $cur_stock = $_POST["cur__stock"];
//                 $last_req_qty = $_POST["last__req__qty"];
//                 $last_req_date = $_POST["last__req__date"];
//                 $req_quantity = $_POST["req__quantity"];
//                 $total_amount = $_POST["total__amount"];
//                 $store_from = $_POST["store__from"];
//                 $store_to = $_POST["store__to"];

//                 $remark="";
//                 $requested_by="";

//                 foreach($product__id as $index => $items){

//                     echo change_to_number($unit_price[$index]);
 
//                     $unitPrice = intval(change_to_number($unit_price[$index]));
//                     $totalAmount = intval(change_to_number($total_amount[$index]));

                    
//                     $sql = $pdo->prepare("insert into purchase_request (rid,product__id,quantity,unit_price,total_amount,last_req_qty,last_req_date,remark,requested_by,store_from,store_to,date) values
//                      (:rid,:product__id,:quantity,:unit_price,:total_amount,:last_qty,:last_date,:remark,:requested_by,:store_from,:store_to,:date)");

//                         $sql->bindParam(":rid",$last_id);
//                         $sql->bindParam(":product__id",$product__id[$index]);
//                         // $sql->bindParam(":product_name",$product_name[$index]);
//                         $sql->bindParam(":quantity",$req_quantity[$index]);
//                         $sql->bindParam(":unit_price",$unitPrice);
//                         $sql->bindParam(":total_amount",$totalAmount);
//                         $sql->bindParam(":last_qty",$last_req_qty[$index]);
//                         $sql->bindParam(":last_date",$last_req_date[$index]);
//                         $sql->bindParam(":remark",$remark);
//                         $sql->bindParam(":requested_by",$requested_by);
//                         $sql->bindParam(":store_from",$store_from[$index]);
//                         $sql->bindParam(":store_to",$store_to[$index]);
//                         $sql->bindParam(":date",$date);


//                          $sql->execute();
//                 }

//                     $department = $pdo->prepare("select * from department");

//                     $department->execute();
//                     $workplace="";

//                     while($row=$department->fetch(PDO::FETCH_ASSOC)){
//                         if($_SESSION["department"] == $row["id"]){
//                             $workplace = $row["department_name"];
                        
//                         }
//                     }
//                     $person = $_SESSION["username"];

//                     $app = 1;

//                     $yes_no = "no";

//                      $message = $_SESSION["username"]." from ".$workplace." has raised a request for your approval";

//                     $link = "approve-reject-page.php?id=$last_id";

//                     $date_and_time = date("Y-m-d H:i:s");

//                     $sql2 = $pdo->prepare("insert into notifications (raised_by,approver,message,link,viewed,opened,date,request_not) values 
//                     (:raised_by,:approver,:message,:link,:viewed,:opened,:date,:rqid)");

//                     $sql2->bindParam(":raised_by",$person);
//                     $sql2->bindParam(":approver", $app);
//                     $sql2->bindParam(":message", $message);
//                     $sql2->bindParam(":link", $link);
//                     $sql2->bindParam(":viewed", $yes_no);
//                     $sql2->bindParam(":opened", $yes_no);
//                     $sql2->bindParam(":date", $date_and_time);
//                     $sql2->bindParam(":date", $date_and_time);
//                     $sql2->bindParam(":rqid", $last_id);

//                     $sql2->execute();
                
//                 if($sql->rowCount()){
//                     echo "The data has been inserted successfully";
        
//                     // header("refresh:1;request.html");
//                 }

//             }else{
//                 echo "please go back and fill all the info";
//             }       




?>