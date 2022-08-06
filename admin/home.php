<?php session_start();


  require_once("configs/config.php");
  require_once("helpers/helper.php");
  require_once("models/model.php");
 
  if(!isset($_SESSION["uid"])) header("location:$base_url");
  $uid=$_SESSION["uid"];
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>today's_fasion</title>
  <!-- base:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/ujjal/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/feather/feather.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="asset/ujjal/vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="asset/ujjal/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="asset/ujjal/vendors/jquery-bar-rating/fontawesome-stars.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="asset/plugins/jquery/jquery.min.js"></script>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="asset/ujjal/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="asset/ujjal/images/f.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
    <?php include("views/layout/navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      
      <?php include("views/layout/main_sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
       
        <?php include("views/layout/content_wrapper.php"); ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <?php include("views/layout/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="asset/ujjal/vendors/base/vendor.bundle.base.js"></script>

  <script src="asset/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="js/helper.js"></script>
  
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="asset/ujjal/js/off-canvas.js"></script>
  <script src="asset/ujjal/js/hoverable-collapse.js"></script>
  <script src="asset/ujjal/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="asset/ujjal/vendors/chart.js/Chart.min.js"></script>
  <script src="asset/ujjal/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="asset/ujjal/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

