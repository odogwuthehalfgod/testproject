<?php
include_once "connection.php";
session_start();


if(isset($_POST["btn_login"])){
    $useremail = $_POST["useremail"];
    $password = $_POST["password"];

    $select = $pdo->prepare("select * from user where email='$useremail' AND password='$password'");

    $select->execute();

    $row = $select->fetch(PDO::FETCH_ASSOC);


        $_SESSION["userid"] = $row["userid"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["role"] = $row["role"];
        $_SESSION["approval_level"] = $row["approval_level"];
    

    

    if($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="admin"){
        
    
        echo $success="Login Successful";
        
        header("refresh:1; dashboard.php");

    }elseif($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="user"){

        echo $success="Login Successful";
        header("refresh:1; user.php");

    }else{
        
        echo "Login failed";
    }
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
    <form action="" method="POST">

        <input type="text" name="useremail" id="">Email<br>
        <input type="text" name="password" id="">Password<br>
        <button name="btn_login">Submit</button>
    </form>
</body>
</html>