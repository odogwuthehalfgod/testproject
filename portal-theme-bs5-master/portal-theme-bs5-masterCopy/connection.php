<?php


try {
    $pdo = new PDO("mysql:host=localhost;dbname=inventory_pos","root","");

// echo "connection successful";
} catch (PDOException $f) {
    echo $f->getmessage();
}



?>