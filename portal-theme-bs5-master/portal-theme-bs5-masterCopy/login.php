<?php
// include_once "connection.php";
// session_start();


// if(isset($_POST["btn_login"])){
//     $useremail = $_POST["useremail"];
//     $password = $_POST["password"];

//     $select = $pdo->prepare("select * from user where email='$useremail' AND password='$password'");

//     $select->execute();

//     $row = $select->fetch(PDO::FETCH_ASSOC);


//         $_SESSION["userid"] = $row["userid"];
//         $_SESSION["username"] = $row["username"];
//         $_SESSION["email"] = $row["email"];
//         $_SESSION["password"] = $row["password"];
//         $_SESSION["role"] = $row["role"];
//         $_SESSION["position"] = $row["position"];
//         $_SESSION["approval_level"] = $row["approval_level"];
//         $_SESSION["department"] = $row["department"];
    

    

//     if($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="admin"){
        
    
//         echo $success="Login Successful";
        
//         header("refresh:1; index.php");

//     }elseif($row["email"]==$useremail AND $row["password"]==$password AND $row["role"]=="user"){

//         echo $success="Login Successful";

//         // header("refresh:1; user.php");
//         header("refresh:1; index.php");

//     }else{
        
//         echo "Login failed";
//     }
// }



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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="success-place"></div>
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="login.php" method="post">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="useremail" type="email" class="form-control signin-email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.html">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" name="btn_login" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.php" >here</a>.</div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Nnaemeka</a> for Zankli</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <!-- <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div> -->
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->

	<style>
		.success-place{
			margin-bottom: 10px;
			font-size: 23px;
		}
	</style>


</body>

<script>



		
	

	let submitBtn = document.querySelector(".theme-btn");

	submitBtn.addEventListener("click", function(el){
		el.preventDefault();

		let data = {
			email: document.querySelector(".signin-email").value,
			password: document.querySelector(".signin-password").value,
		}

		
		fetch("learn.php",{
			method: "POST",
			type: "JSON",
			body: JSON.stringify({
				data,
			})
		}).then(function(response){
			return response.text();
		}).then(function(result){
			let emojis = ["😏","👊🏼","👍🏼","🫱🏾‍🫲🏾","✅","😎", "😙","🔥","😃","💃🏼","🕺🏼"];
			let loginEmojis = Math.floor(Math.random() * emojis.length);
			

			if(result == "Login Successful"){
				document.querySelector(".success-place").innerHTML =result.concat(emojis[loginEmojis]);
				
				
				setTimeout(() => {
					window.location.href = "index.php";
				}, 1000);
			}
		});
	})


</script>
</html> 

