<?php

include "connection.php";

session_start();

$id = $_GET["id"];

$ff = $_SESSION["approval_level"] - 1;


if(isset($_POST["save-comment"])){
	$id_of_req = $_GET["id"];
	$comments = $_POST["text-field"];
	
	$person = $_SESSION["username"];
	
	$insert_comment = $pdo->prepare("insert into req_comment (req_id,comment,name) values (:req_id,:comt,:person)");
	$insert_comment_notification = $pdo->prepare("insert into notifications (raised_by,approver,message,link,viewed,opened,date,request_not) 
	values (:person_name,:app_no,:msg,:anchor,:view,:open,:day,:rq_id)");
	
	$insert_comment->bindParam(":req_id", $id_of_req);
	$insert_comment->bindParam(":comt", $comments);
	$insert_comment->bindParam(":person", $person);

	$msg = $_SESSION["username"]." commented on a request";
	$link = "approve-reject-page.php?id=$id_of_req";
	$viewed = "no";
	$opened = "no";
	$date = date("Y-m-d H:i:s");

	$insert_comment_notification->bindParam(":person_name", $_SESSION["username"]);
	$insert_comment_notification->bindParam(":app_no", $_SESSION["approval_level"]);
	$insert_comment_notification->bindParam(":msg", $msg);
	$insert_comment_notification->bindParam(":anchor", $link);
	$insert_comment_notification->bindParam(":view", $viewed);
	$insert_comment_notification->bindParam(":open", $opened);
	$insert_comment_notification->bindParam(":day", $date);
	$insert_comment_notification->bindParam(":rq_id", $id_of_req);
	
	$insert_comment->execute();
	$insert_comment_notification->execute();
	
	if($insert_comment->rowCount()>0){
		echo "comment has been inserted";
	}
}

?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/approve-reject-page.css">

</head> 

<body class="app">   	
    <?php
		include_once "header.php";
	?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Requisition</h1>
			    <hr class="mb-4">
				<?php
			$check_if_approved = $pdo->prepare("select * from approved_order where req_id='$id'");

			$check_if_approved->execute();
			$we = "";

			while($row = $check_if_approved->fetch(PDO::FETCH_ASSOC)){
				if($row["approver_id"] == $_SESSION["userid"]){
					$we = $row["approver_id"];
					// echo "this requ	est has been approved by you";
				}
			}

			if($we == $_SESSION["userid"]){
				echo "You have approved this request👍🏼";
			}else{
				?>
				<form action="approval.php" method="post" class="approve-reject">
					<input type="text" name="eid" value=<?php echo $id;?> hidden>
					<input type="submit" name="approve" value="Approve" class="approval-button dont-submit">
					<input type="submit" name="reject" value="Reject" class="approval-button rejected">
				</form>
		<?php
			}
		?>
	    <!-- My own content -->
	   
		<div class="test">
			<div class="centered-parent">
			<div class="parent-info">
				<div class="head-info img-box">
					<img src="upload/IMG_6906.jpg" alt="">
				</div>
				<div class="head-info user-box">
					<div class="user-info">
					<?php
						$user = $pdo->prepare("select * from raised_request where id=$id");

						$user->execute();

						while($row=$user->fetch(PDO::FETCH_ASSOC)){
							$department = $row["department"];
							// global $department;
							?>

							<div class="department main-bold"><?php echo $row["requested_by"]?></div>
							<div class="department common-d">Ref: <?php echo $row["req_ref"]?></div>
							<div class="department common-d"><span>Request Date: </span><?php echo $row["date_of_req"]?></div>
							
							
					<?php
						}

					?>
				</div>
				
			</div>
			
			</div>

			<div class="depart-name">
					<div class="title-from"><p>From</p></div>
					<div class="actual-from"><?php echo $department; ?></div>
			</div>
			<div class="inner-house">
			  <div class="flex-input">
				<div class="req-header">
					<div class="head head-1">Items</div>
					<div class="head head-2">Quantity</div>
					<div class="head head-3">Unit Price</div>
					<div class="head head-4">Amount</div>
					<div class="head head-4">Lst. Req Qty</div>
					<div class="head head-4">Lst. Req Date</div>
				</div>
				<div class="req-content">
				<?php
					

					$sql = $pdo->prepare("select * from products_table, raised_request, purchase_request where raised_request.id=:id and raised_request.id = purchase_request.rid and purchase_request.product__id = products_table.id and level=:zero");

					$sql->bindParam(":id",$id);
					$sql->bindParam(":zero",$ff);
					// $sql->bindParam(":lvl",$level);

					$sql->execute();
						$total = 0;
					while($row = $sql->fetch(PDO::FETCH_ASSOC)){
						$total = $total + $row["total_amount"];
						$images = unserialize($row["image_arr"]);
						?>
						<div class="req-content-content">
							<div class="row-info"><?php echo $row["product_name"] ?></div>
							<div class="row-info"><?php echo $row["quantity"] ?></div>
							<div class="row-info"><?php echo $row["unit_price"] ?></div>
							<div class="row-info"><?php echo $row["total_amount"] ?></div>
							<div class="row-info"><?php echo $row["last_req_qty"] ?></div>						
							<div class="row-info"><?php echo $row["last_req_date"] ?></div>						
						</div>
				<?php
					}

				?>
	</div>
	</div>
	<div class="total-amount">
		<p>Total: <?php echo $total; ?></p>	
	</div>
	</div>
	</div>
	
	
</div>
	<div class="comment-section">
		<!-- <p><a href="#">Comment</a></p> -->
		<div class="comment-box">

		</div>
	</div>
	<h1 class="app-page-title">Proforma Invoice</h1>
	<div class="proforma-invoices">

	
	<?php

	// echo $images;

	if(!isset($images)){
		
		echo "";
	}else{
		if(is_string($images) && $images !=""){
			
			echo "<div class='cute-img-boxes'><img src='upload/$images' class='click-img'></div>";
		}else if(is_array($images)){
			for($i=0;$i<count($images);$i++){
				echo "<div class='cute-img-boxes'><img src='upload/$images[$i]' class='click-img'></div>";
			}
		}else{
			echo "⚠️Invoice was not uploaded"
;		}
		
	}
	
		
		
	?>
</div>

<div class="big-image">
	<div class="image-cont"></div>
</div>


<div class="nothing-to-see">
	<form action="approve-reject-page.php?id=<?php echo $id; ?>" method="POST">
      <div class="comment-area">
        <div class="flex-comment name-circle">
		<?php
			$err = explode(" ",$_SESSION["username"]);
		?>
		
          <span class="span-box first"><?php echo substr($err[0], 0, 1)?></span>
          <span class="span-box second"><?php echo substr($err[1], 0, 1)?></span>

		  <?php?>
        </div>
        <div class="flex-comment actual-comment">
          <div class="hidden-box">
            <textarea name="text-field" id="" class="textarea-comment" placeholder="Write a comment"></textarea>

            <!-- <a href="approve-reject-page.php?id=149" class="save-button">Save</a> -->
            <input type="submit" value="Save" class="save-button" name="save-comment" disabled>
          </div>
        </div>
      </div>
	  </form>
    </div>

	<?php
	
	$get_comment = $pdo->prepare("select * from req_comment where req_id='$id' order by id desc");

	$get_comment->execute();

	while($row=$get_comment->fetch(PDO::FETCH_ASSOC)){
		?>
	
	<div class="nothing-to-see">
	<div class="name-of-person">
			<?php
				if($_SESSION["username"]==$row["name"]){
					echo "You";
				}else{
					echo $row["name"]; 

				}
				?>
		</div>
      <div class="comment-area">
		
        <div class="flex-comment name-circle">
		<?php
			$err = explode(" ",$row["name"]);
		?>
		
          <span class="span-box first"><?php echo substr($err[0],0,1); ?></span>
          <span class="span-box second"><?php echo substr($err[1],0,1); ?></span>

		  <?php?>
        </div>
        <div class="flex-comment actual-commentt">
          <div class="hidden-box">
            <div class="textarea-comment">
				<p class="comment-container"><?php echo $row["comment"]; ?></p>
			</div>
          </div>
        </div>
      </div>
    </div>
<?php
}
?>


	  
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
    <script src="assets/js/approve-reject.js"></script> 

  <script>
    //dont mind me using alphabets as variables, i mean as long as the code works right, that all that matters.
	//this uses the same functionality as every other part of the software. We make calls to the json php file and that serves as our api
	//
	/*
	
	
	*/ 
  </script>
</html>
