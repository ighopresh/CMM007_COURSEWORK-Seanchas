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
   
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
// echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
// echo 'Timezone: ' . $ipdat->geoplugin_timezone;

$country = $ipdat->geoplugin_city;
$city = $ipdat->geoplugin_city;

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>Stories</title>

   <!-- Vendor CSS Files -->
   <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
   <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">

   <!-- Template Main CSS File -->
   <link rel="stylesheet" href="assets/css/style.css">

   <!-- Core theme CSS (includes Bootstrap)-->
   <link rel="stylesheet" href="assets/css/styles.css" />


   <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
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

   <!-- Custom styles for this template-->
   <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

   <!-- https://blog.hubspot.com/website/how-to-embed-google-map-in-html -->
   <style type="text/stylesheet">
      .google-map {
         padding-bottom: 50%;
         position: relative;
       }
       
       .google-map iframe {
         height: 100%;
         width: 100%;
         left: 0;
         top: 0;
         position: absolute;
       }
   </style>

</head>

<body>
   <!-- Navigation-->
   <?php include 'includes/header.php'; ?>

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
      <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12" style="min-height: 5px; height: 8px;">
               <div class="site-heading">
                  <h1 style="margin-bottom: 25px;">Seanchas - Tales</h1>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Main Content-->

   <article>
      <div class="container">
         <div class="row">

            <div class="google-map">
               <!-- <iframe
                  src="https://earth.google.com/earth/d/12u7OTREIEray4iSfEPuMRm3Y6BRqIg7H?usp=sharing"
                  width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe> -->
               <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4360605.599473359!2d-4.68734115!3d57.7469948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4861e2c403f2a19f%3A0xe7c1fad809c30714!2sScotland%2C%20UK!5e0!3m2!1sen!2sng!4v1678107210875!5m2!1sen!2sng"
                  width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
               <!-- <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1104425.002841034!2d-6.968765258789064!3d57.27236119023859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488f71522037e4b9%3A0x4f9ca359d9b1061d!2sThings%20to%20do!5e0!3m2!1sen!2sng!4v1677927638382!5m2!1sen!2sng"
                  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
            <!-- select Active Stories from Seanchas database -->
            <?php 
               // Stories in sequence in relation to user's proximity
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
                           <p class="card-text"><?php echo htmlentities($user["descript"]); ?></p>
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
   </article>

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
               <a class="btn btn-primary" href="login.html">Logout</a>
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