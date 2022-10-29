<?php



/*
MY GOAL = TO BUILD THE NOTIFICATION SYSTEM
1. I would need a timeframe for the notification e.g CMD approved your request just now/3mins ago/yesterday/20-10-22
2. comment and like system
3. the notification system itself
        a. create a notification table in database
        b. create a notification function which would have a switch statement that checks
            for what type of notification e.g comment, raised-request, etc and then write out the 
            notification e.g "DOCA has approved your request, DAF has approved your request"

when using Classes in php

1. The private keyword - when a variable is created with the private keyword 
it means that the variable is only going to be accessible within that class


HR review
1. That some request dont need to go through the long chain of approval

2. Only request that requires hugh financing goes through the main chain of approval

3. Petty request only needs to go through 3 chains of approval

SOLUTION

1. Users should have column in database that has a major and petty approval with values major or petty

the request would check if the users has the petty flag and if the request also has the petty flag before executing any further action



2. On the request page the user should choose if its a major or petty request

3. When saving request to the database, it should carry the major or petty flag with it

4. When querying the database, first check if the 




echo '<form action="approval.php" method="post" class="approve-reject">
							<input type="text" name="eid" value=<?php echo $id;?> hidden>
							<input type="submit" name="approve" value="Approve" class="approval-button dont-submit">
							<input type="submit" name="reject" value="Reject" class="approval-button rejected">
					</form>';

*/  




include_once "connection.php";
session_start();

$we = file_get_contents("php://input");

$json = json_decode($we, true);


    $useremail = $json["data"]["email"];
    $password = $json["data"]["password"];

    $select = $pdo->prepare("select * from user where email='$useremail' AND password='$password'");

    $select->execute();

    $row = $select->fetch(PDO::FETCH_ASSOC);


        $_SESSION["userid"] = $row["userid"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["role"] = $row["role"];
        $_SESSION["position"] = $row["position"];
        $_SESSION["approval_level"] = $row["approval_level"];
        $_SESSION["department"] = $row["department"];
    

    

    if($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="admin"){
        
    
        echo $success="Login Successful";
        
        header("refresh:1; index.php");

    }elseif($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="user"){

        echo $success="Login Successful";

        

        // header("refresh:1; user.php");
        header("refresh:1; index.php");

    }else{
        
        echo "Login failed";
    }
// }


?>