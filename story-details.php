<?php

session_start();
$mysqli = require __DIR__ . "\includes\config.php"; 
//error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seanchas - Post</title>
   <!-- Font Awesome icons (free version)-->
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   <!-- Google fonts-->
   <link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" />
   <link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" />
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css"> -->
   <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
   <!-- <link rel="stylesheet" href="assets/vendor/glightbox/css/glightbox.min.css">
   <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->

   <!-- Template Main CSS File -->
   <link rel="stylesheet" href="assets/css/style.css">

   <!-- =======================================================
  * Template Name: Lumia - v4.10.0
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <!-- css Bootstrap-->
   <!-- <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap-grid.min.css"> -->
   <!-- Core theme CSS (includes Bootstrap)-->
   <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
   <!-- Navigation-->
   <?php include 'includes/header.php'; ?>
   <?php 
      $id = intval($_GET['id']);
      $sql = $sql = "SELECT DISTINCT stories.*, users.f_name, users.l_name FROM stories JOIN users ON users.id=stories.user_id WHERE stories.id=$id";
      $mysqli->real_query($sql);
      if ($mysqli->field_count) {
         $users = $mysqli->store_result();
         foreach ($users as $user) {
            $full_name = htmlentities($user["f_name"] . " " . $user["l_name"]);?>
   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/postimages/<?php echo htmlentities($user["img"]); ?>')">
      <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               <div class="site-heading">
                  <h1 style="margin-bottom: 25px;"><?php echo htmlentities($user["title"]); ?></h1>
                  <span class="meta">
                     Posted by&nbsp;<?php echo htmlentities($full_name); ?>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Post Main Content-->
   <hr>
   <article class="mb-4">
      <div class="container px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               <p class="card-text"><?php echo htmlentities($user["descript"]); ?></p>
            </div>
            <?php
               }
                  } ?>                    
         </div>
      </div>
   </article>
   <hr>
   <!-- Post End -->
         
   <!-- Comment Start -->
   <div class="col-md-10 col-lg-8 mx-auto">
      <div class="card my-4">
         <h5 class="card-header">Leave a Comment:</h5>
         <div class="card-body">
            <a class="twitter-timeline" href="https://twitter.com/stmassie?ref_src=twsrc%5Etfw">Tweets by stmassie</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </div>
      </div>
   </div>
   <!-- Comment End -->


   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
         </div>
      </div>
   </div>

   <!-- ======= Footer ======= -->
   <?php include 'includes/footer.php'; ?>
   <!-- End Footer -->

   <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
   <br>
   <br>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <!-- Bootstrap core JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Core theme JS-->
   <script src="assets/js/scripts.js"></script>
   <script src="assets/js/main.js"></script>


   <!-- Bootstrap core JavaScript-->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min-1.js"></script>

</body>

</html>