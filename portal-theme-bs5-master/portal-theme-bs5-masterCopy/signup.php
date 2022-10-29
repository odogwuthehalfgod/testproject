<?php
include_once "connection.php";

// session_start();

// if($_SESSION["username"]==""){
//     header("location:login.php");
// }

// if($_SESSION["role"]!=="admin"){
//     header("location:user.php");
// }


//fullname
//EMAIL
//role
//password
//level

if(isset($_POST["register"])){

    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $level = $_POST["level"];
    $position = $_POST["position"];

    $signature_name = $_POST["fullname"];
    
    $image_file = $_FILES["signature"]["name"];

    $image_replace_name = explode(".", $image_file);

    $image_file = $name.".".$image_replace_name[1];
    $type = $_FILES["signature"]["type"];
    $size = $_FILES["signature"]["size"];
    $temp = $_FILES["signature"]["tmp_name"];


    echo $image_file;

    $path = "upload/".$image_file;

    if($size < 5000000){
        move_uploaded_file($temp, "upload/".$image_file);
    }
  
    $insert = $pdo->prepare("insert into user(username,email,password,role,position,approval_level,signage) values(:name,:email,:password,:role,:position,:level,:sign)");

    $insert->bindParam(":name",$name);
    $insert->bindParam(":email",$email);
    $insert->bindParam(":password",$password);
    $insert->bindParam(":role",$role);
    $insert->bindParam(":position",$position);
    $insert->bindParam(":level",$level);
    $insert->bindParam(":sign",$image_file);


    $insert->execute();

    if($insert->rowCount()){
        echo "data uploaded successfully";
    }else{
        echo "failed";
    }
}



if(isset($_POST["fff"])){
    // $level = $_SESSION["approval_level"];
    // $level++;
    // echo $level;

    $id = $_GET["id"];

    echo $id;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta
      name="description"
      content="Portal - Bootstrap 5 Admin Dashboard Template For Developers"
    />
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
  </head>

  <body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
      <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
          <div class="app-auth-body mx-auto">
            <div class="app-auth-branding mb-4">
              <a class="app-logo" href="index.html"
                ><img
                  class="logo-icon me-2"
                  src="assets/images/app-logo.svg"
                  alt="logo"
              /></a>
            </div>
            <h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>

            <div class="auth-form-container text-start mx-auto">
              <form class="auth-form auth-signup-form" action="signup.php" method="post" enctype="multipart/form-data">
                <div class="email mb-3">
                  <label class="sr-only" for="signup-email">Your Name</label>
                  <input
                    id="signup-name"
                    name="fullname"
                    type="text"
                    class="form-control signup-name"
                    placeholder="Full name"
                    required="required"
                  />
                </div>
                <div class="email mb-3">
                  <label class="sr-only" for="signup-email">Your Email</label>
                  <input
                    id="signup-email"
                    name="email"
                    type="email"
                    class="form-control signup-email"
                    placeholder="Email"
                    required="required"
                  />
                </div>
                <div class="password mb-3">
                  <label class="sr-only" for="signup-password">Password</label>
                  <input
                    id="signup-password"
                    name="password"
                    type="password"
                    class="form-control signup-password"
                    placeholder="Create a password"
                    required="required"
                  />
                </div>
                <div class="password mb-3">
                  <label class="sr-only" for="signup-password">Role</label>
                  <input
                    id="signup-password"
                    name="role"
                    type="password"
                    class="form-control signup-password"
                    placeholder="Role"
                    required="required"
                  />
                </div>
                <div class="password mb-3">
                  <?php
                    $sql = $pdo->prepare("select count(*) as count from user where role='admin'");

                    $sql->execute();

                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    echo "Number of Approvers: ".$row["count"]."";
                  ?>
                  <label class="sr-only" for="signup-password"
                    >Approval Level</label
                  >
                  <input
                    id="approval-level"
                    name="level"
                    type="app-level"
                    class="form-control approval-level"
                    placeholder="Approval Level"
                    required="required"
                  />
                
                </div>
                <div class="password mb-3">
                  <label class="sr-only" for="signup-password"
                    >Position</label
                  >
                  <input
                    id="approval-level"
                    name="position"
                    type="app-level"
                    class="form-control approval-level"
                    placeholder="Position"
                    required="required"
                  />
                
                </div>
                <div class="password mb-3">
                  <p>Department</p>
                  <!-- <h2 class="sr-only" for="signup-password"
                    >Department</h2
                  > -->
                  <select name="" id="">
                    <?php
                      $sql = $pdo->prepare("select * from department");

                      $sql->execute();

                      while($row=$sql->fetch(PDO::FETCH_ASSOC)){
                        ?>
                          <option value="<?php echo $row["id"]; ?>"><?php echo $row["department_name"]; ?></option>
                      <?php  
                      }
                    ?>
                  </select>
                  <!-- <input
                    id="approval-level"
                    name="department"
                    type="app-level"
                    class="form-control approval-level"
                    placeholder="Position"
                    required="required"
                  /> -->
                
                </div>
                <div class="password mb-3">
                  <label class="sr-only" for="signup-password"
                    >Signature</label
                  >
                  <input
                    id="approval-level"
                    name="signature"
                    type="file"
                    class="form-control approval-level"
                    placeholder="Approval Level"
                    required="required"
                  />
                
                </div>
                <div class="extra mb-3">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="RememberPassword"
                    />
                    <label class="form-check-label" for="RememberPassword">
                      I agree to Portal's
                      <a href="#" class="app-link">Terms of Service</a> and
                      <a href="#" class="app-link">Privacy Policy</a>.
                    </label>
                  </div>
                </div>
                <!--//extra-->

                <div class="text-center">
                  <button
                    type="submit"
                    name="register"
                    class="btn app-btn-primary w-100 theme-btn mx-auto"
                  >
                    Sign Up
                  </button>
                </div>
              </form>
              <!--//auth-form-->

              <div class="auth-option text-center pt-5">
                Already have an account?
                <a class="text-link" href="login.html">Log in</a>
              </div>
            </div>
            <!--//auth-form-container-->
          </div>
          <!--//auth-body-->

          <footer class="app-auth-footer">
            <div class="container text-center py-3">
              <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
              <small class="copyright"
                >Designed with <span class="sr-only">love</span
                ><i class="fas fa-heart" style="color: #fb866a"></i> by
                <a
                  class="app-link"
                  href="http://themes.3rdwavemedia.com"
                  target="_blank"
                  >Xiaoying Riley</a
                >
                for developers</small
              >
            </div>
          </footer>
          <!--//app-auth-footer-->
        </div>
        <!--//flex-column-->
      </div>
      <!--//auth-main-col-->
      <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder"></div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
          <div class="d-flex flex-column align-content-end h-100">
            <div class="h-100"></div>
            <div class="overlay-content p-3 p-lg-4 rounded">
              <!-- <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
              <div>
                Portal is a free Bootstrap 5 admin dashboard template. You can
                download and view the template license
                <a
                  href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/"
                  >here</a
                >.
              </div> -->
            </div>
          </div>
        </div>
        <!--//auth-background-overlay-->
      </div>
      <!--//auth-background-col-->
    </div>
    <!--//row-->
  </body>
</html>
