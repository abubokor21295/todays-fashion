<?php session_start();  
  require_once("configs/db_config.php");
  $base_url="cpanel";
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     $result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");

     if($db->affected_rows==1){
         
         list($uid,$_username,$role)=$result->fetch_row();
         $_SESSION["uid"]=$uid;
         $_SESSION["uname"]=$_username;
         $_SESSION["urole"]=$role;

        //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

         header("location:home");
        

     }else{
      
        $error="Password or Username incorrect";
       
     }  
  
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>1_ujjal_project</title>
  <!-- base:css -->
  <link rel="stylesheet" href="asset/ujjal/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/feather/feather.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="asset/ujjal/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="asset/ujjal/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="asset/ujjal/images/logo-dark.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <div style="text-align:center;color:orange;font-weight:bold"> <?php echo isset($error)?$error:"";?></div>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                  <input type="text" name="txtUsername" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="txtPassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="btnSignIn" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i> Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="asset/ujjal/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="asset/ujjal/js/off-canvas.js"></script>
  <script src="asset/ujjal/js/hoverable-collapse.js"></script>
  <script src="asset/ujjal/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
