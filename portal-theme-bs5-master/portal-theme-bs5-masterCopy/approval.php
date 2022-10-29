<?php
include_once "connection.php";
session_start();

$check = $pdo->prepare("select max(approval_level) as maxim from user");

$check->execute();
$as = "";

while($row = $check->fetch(PDO::FETCH_ASSOC)){
    $final_level = $row["maxim"];

    echo "The request has been approved";
    global $final_level;
}

if(isset($_POST["approve"])){

    $level = $_SESSION["approval_level"];
    $id = $_POST["eid"];
    $approved = "approved";

    global $id;
    global $level;
    //I had to fix the bug where when a new user is registered and given approval level, the new registered user would be able to see
    //past requisitions
    if($level == $final_level){
        $final_level = $final_level + 1;
        $update = $pdo->prepare("update raised_request set final_level=:num where id=:id");

        $update->bindParam(":num", $final_level);
        $update->bindParam(":id", $id);

        $update->execute();
    }


    $insert = $pdo->prepare("insert into approved_order(approver_id,req_id,status) values (:app_id,:request_id,:status)");
    $update = $pdo->prepare("update raised_request set level=:user_level where id=:id");
    $updateNotification = $pdo->prepare("update notifications set approver=:next_approver where request_not=:rqid");


    $insert->bindParam("app_id", $_SESSION["userid"]);
    $insert->bindParam("request_id", $id);
    $insert->bindParam(":status", $approved);

    $update->bindParam(":id",$id);
    $update->bindParam(":user_level",$level);


    $num = array();

    array_push($num, $level);

    $next_level = $num[0]++;
    $next_level = $next_level + 1;
    // $next_level = $next_level++;

    $updateNotification->bindParam(":next_approver", $next_level);
    $updateNotification->bindParam(":rqid", $id);

    $updateNotification->execute();
    $insert->execute();
    $update->execute();


    

    
}else if(isset($_POST["reject"])){
    $id = $_POST["eid"];
    $comment = $_POST["comment"];
    $zero = 0;

    $insert = $pdo->prepare("insert into req_comment(req_id,comment) values (:request_id,:comment)");

    $update = $pdo->prepare("update raised_request set level=:zero where id=:id");

    $insert->bindParam("request_id", $id);
    $insert->bindParam(":comment", $comment);
    $update->bindParam(":id", $id);
    $update->bindParam(":zero", $zero);
    
    $insert->execute();
    $update->execute();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

</body>
</html>