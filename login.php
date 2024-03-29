<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "\includes\config.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE stat = 1 AND email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: home-page-1.php");
            exit;
        } else {
         header("Location: login.php");
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Seanchas - Login</title>

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

   <script type="text/javascript">
      function validate() {
         let email = document.getElementById('email').value;
         let pw = document.getElementById('pswd').value;

         //check empty email field 
         if (email === "" || email === null) {
            document.getElementById('message-email').innerHTML = 'Enter your email address';
            document.storytellerlogin.email.focus();
            return false;
         } else {
            // https://stackoverflow.com/questions/55744003/validate-regex-of-email
            var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // when email matched Regular Expressions
            if (email.match(regex)) {
               if (pw === "" || pw === null) {
                  document.getElementById('message-pw').innerHTML = 'Enter your password';
                  document.storytellerlogin.password.focus();
                  return false;
               } else {
                  alert("Welcome Story Teller!!!");
                  return true;
               }
               
               // when email field is empty
            } else {
               document.getElementById('message-email').innerHTML = 'Enter a correct email address';
               document.storytellerlogin.email.focus();
               return false;
            }
         }
      }
   </script>

   <!-- =======================================================
  * Template Name: SB Admin 2 - v4.1.4
  * Template URL: https://startbootstrap.com/theme/sb-admin-2
  * Author: startbootstrap.com
  * License: https://github.com/startbootstrap/startbootstrap-sb-admin-2/blob/master/LICENSE
  ======================================================== -->


</head>

<body style="background-image: url('assets/img/loginba.jpg');">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-6 col-lg-8 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-3">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-lg">
                        <div class="p-4">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-3">StoryTeller Login</h1>
                           </div>
                           <?php if ($is_invalid): ?>
                              <em>Invalid login</em>
                           <?php endif; ?>
                           <form class="user" method="post" id="userform" name="storytellerlogin"
                              onsubmit="return validate();" novalidate>
                              <div class="form-group">
                                 <input type="email" class="form-control form-control-user" id="email" name="email"
                                    autocomplete="off" placeholder="Enter Email Address..." value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                                 <span id="message-email" style="color: red; font-size: small;"></span>
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-user" id="pswd"
                                    placeholder="Enter Password" name="password" autocomplete="off">
                                 <span id="message-pw" style="color: red; font-size: small;"></span>
                              </div>
                              <div class="form-group">
                                 <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember
                                       Me</label>
                                 </div>
                              </div>
                              <button class="btn btn-success btn-block text-white btn-user" type="submit"
                                 name="login">Login
                              </button>
                              <hr>
                           </form>
                           <div class="text-center">
                              <a href="index.php" class="btn btn-primary btn-block text-white btn-user">Home</a>
                           </div>
                           <hr>
                           <div class="text-center">
                              <a href="view-stories.php" class="btn btn-info btn-block text-white btn-user">View
                                 Stories</a>
                           </div>
                           <hr>
                           <div class="text-center">
                              <a href="register.php" class="btn btn-danger btn-block text-white btn-user">Don't
                                 have
                                 an
                                 account?
                                 Register</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>

</html>