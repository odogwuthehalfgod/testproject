<?php
include_once "connection.php";
session_start();

$_SESSION["count"] = "";

// $_SESSION["department"] = "";
$level = $_SESSION["approval_level"]-1;
$num_of_req = $pdo->prepare("select count(*) as count from raised_request where level=:lev");

$num_of_req->bindParam(":lev", $level);

$num_of_req->execute();

while($row2 = $num_of_req->fetch(PDO::FETCH_ASSOC)){
	$_SESSION["count"] = $row2["count"];
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

</head> 

<body class="app">   	
    <?php
	include_once "header.php";
	
	?>
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Notifications</h1>
					    </div>
					    <div class="col-auto">
					        <div class="page-utilities">
							    <select class="form-select form-select-sm w-auto" >
								  <option selected value="option-1">All</option>
								  <option value="option-2">News</option>
								  <option value="option-3">Product</option>
								  <option value="option-4">Project</option>
								  <option value="option-4">Billing</option>
								</select>
					        </div><!--//page-utilities-->
					    </div>
				    </div>
			    </div>

				<?php
    if($_SESSION["role"] == "admin"){
       
    $level = $_SESSION["approval_level"] - 1;
    // $sql = $pdo->prepare("select * from raised_request where level=:user_level and level > final_level or level = 0");
    $sql = $pdo->prepare("select * from raised_request where level=:user_level and level > final_level or level =:user_level order by id desc");
   

    $sql->bindParam(":user_level",$level);

    $sql->execute();


    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
		 ?>
                <div class="app-card app-card-notification shadow-sm mb-4 reduce">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">						        
							<div class="app-icon-holder">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg>
								</div>
					        </div><!--//col-->
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <div class="notification-type mb-2"><span class="badge bg-info">External Requsition</span></div>
						        <h4 class="notification-title mb-1"><?php echo $row["req_ref"];?></h4>
						        
						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?php echo $row["date_of_req"];?></li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item"><?php echo $row["requested_by"]?></li>
									<li class="list-inline-item">|</li>
									<!-- <li class="list-inline-item">IT</li> -->
									<li class="list-inline-item"><?php echo $row["department"]?></li>
						        </ul>
						   
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					    <div class="notification-content">Purchase of Printer Inks, New Computer for Pharmacy Store and Flash Drive for account Department</div>
				     </div><!--//app-card-body -->
				    <div class="app-card-footer px-4 py-3">
					    <a class="action-link" href="approve-reject-page.php?id=<?php echo $row["id"]?>">View<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></a>
				    </div><!--//app-card-footer-->
				</div><!--//app-card-->
			
				<?php
				}}else{
					echo "No notifications for you";
				} ?>	
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 <style>
	.reduce{
		width: 45%;
		margin: 0 auto;
	}
 </style>
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

