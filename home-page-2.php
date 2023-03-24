<?php

session_start();
$mysqli = require __DIR__ . "\includes\config.php"; 
error_reporting(0);
//https://www.geeksforgeeks.org/how-to-get-visitors-country-from-their-ip-in-php/
// PHP code to extract IP 
  
function getVisIpAddr() {
      
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
       return $_SERVER['HTTP_CLIENT_IP'];
   }
   else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       return $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else {
       return $_SERVER['REMOTE_ADDR'];
   }
}
 
// Store the IP address
$vis_ip = getVisIPAddr();
 
// Display the IP address
//echo $vis_ip;
// PHP code to obtain country, city, 
// continent, etc using IP Address
  
$ip = $vis_ip;
  
// Use JSON encoded string and converts
// it into a PHP variable
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));

$country = $ipdat->geoplugin_countryName;
$city = $ipdat->geoplugin_city;

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home - Taleseekers</title>
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
   <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
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
   <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap-grid.min.css">
   <!-- Core theme CSS (includes Bootstrap)-->
   <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
   <!-- Navigation-->
   <?php include 'includes/header2.php'; ?>

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/hero-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               <div class="site-heading">
                  <h2>Welcome to Seanchas</h2>
                  <h3>Tale Seekers</h3>
                  <span class="subheading">Tourists travelling around Scotland can read stories about other people's travels
                     travels.</span>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Main Content-->
   <div class="container">
      <div class="row">
         <?php 
            //Function to truncate the description by first 20 words
            //https://stackoverflow.com/questions/965235/how-can-i-truncate-a-string-to-the-first-20-words-in-php
            function limit_text($text, $limit) {
               if (str_word_count($text, 0) > $limit) {
                  $words = str_word_count($text, 2);
                  $pos = array_keys($words);
                  $text = substr($text, 0, $pos[$limit]) ."...Read More";
               }
               return $text;
            }
            // Stories in sequence in relation to there proximity
            if ($country == 'Scotland'){
               $sql = $sql = "SELECT stories.*, users.f_name, users.l_name FROM stories JOIN users WHERE users.id = stories.user_id AND stories.stat=1 AND stories.loc=$city";
            } else {
            $sql = $sql = "SELECT stories.*, users.f_name, users.l_name FROM stories JOIN users WHERE users.id = stories.user_id AND stories.stat=1";
            }
            $mysqli->real_query($sql);
            $no = 1;
            if ($mysqli->field_count) {
               $users = $mysqli->store_result();
               foreach ($users as $user) {
                  $full_name = htmlentities($user["f_name"] . " " . $user["l_name"]);?>
         <div class="card mb-3" style="max-height: 80%;">
            <div class="row g-0">
               <div class="col-md-3">
                  <a href="story-details.php?id=<?php echo htmlentities($user["id"]); ?>">
                     <img src="assets/img/postimages/<?php echo htmlentities($user["img"]); ?>" alt="" class="img-fluid rounded-start"
                        style="max-height:200px; margin-top: 10px;">
                  </a>
               </div>
               <div class="col-md-9">
                  <div class="card-body">
                                 <a href="story-details.php?id=<?php echo htmlentities($user["id"]); ?>" style="text-decoration: none;">
                        <h4 class="card-title"><?php echo htmlentities($user["title"]); ?></h4>
                        <p class="card-text"><?php echo htmlentities(limit_text($user["descript"], 20)); ?></p>
                     </a>
                     <p class="card-text" style="padding-top: 2%;">
                        <small class="text-muted">Posted by&nbsp;<?php echo htmlentities($full_name); ?></small>
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <?php $no = $no + 1;
            }
               } ?> 
      </div>
   </div>
   <hr>
   <div class="row">
      <div class="col-md-10 col-lg-12">
         <div class="clearfix">
            <a href="view-stories.php">
               <button class="btn btn-primary" type="button" style="
               float:right; margin-right: 30px;">View More&nbsp;⇒</button>
            </a>
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
</body>

</html>