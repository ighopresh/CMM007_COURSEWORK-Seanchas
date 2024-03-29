<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Seanchas - Register</title>


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


   <!-- =======================================================
      * Script to check if the email already exist
   ======================================================== -->
   <script>
      // https://stackoverflow.com/questions/56491361/form-submitting-even-email-already-message-showing-jquery
      function checkmailAvailability() {
         $("#loaderIcon").show();
         jQuery.ajax({
            url: "check-availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function (data) {
               $("#user-availability-status").php(data);
               $("#loaderIcon").hide();
            },
            error: function () {
            }
         });
      }
   </script>


   <!-- =======================================================
      * Script to Validate the form entry
   ======================================================== -->
   <script type="text/javascript">

      //=======================================================
      //   * First name validation
      //========================================================
      var checkfname = function () {
         let fname = document.getElementById('fname').value;
         let regex_fname = /^[a-zA-Z ]{3,30}$/;

         // check if First name is empty
         if (fname === "" || fname === null) {
            document.getElementById('message-fname').style.color = 'red';
            document.getElementById('message-fname').innerHTML = 'First name cannot be empty!';
            document.getElementById('submit').disabled = true;
            document.signup.fname.focus();
         } else {

            // check if first name is less than 3 characters
            if (fname.length < 3) {
               document.getElementById('message-fname').style.color = 'red';
               document.getElementById('message-fname').innerHTML = 'First name cannot be less than 3 characters!';
               document.getElementById('submit').disabled = true;
               document.signup.fname.focus();
            }

            // check if first name is greater than 30 characters
            else if (fname.length > 30) {
               document.getElementById('message-fname').style.color = 'red';
               document.getElementById('message-fname').innerHTML = 'First name cannot be More than 30 character!';
               document.getElementById('submit').disabled = true;
               document.signup.fname.focus();
            }

            // check if first name doesnot conforms to Reguler Expression
            else if (!fname.match(regex_fname)) {
               document.getElementById('message-fname').style.color = 'red';
               document.getElementById('message-fname').innerHTML = 'First name is invalid!';
               document.getElementById('submit').disabled = true;
               document.signup.fname.focus();
            }

            // check if first name conforms to Reguler Expression
            else if (fname.match(regex_fname)) {
               document.getElementById('message-fname').innerHTML = '';
            }
         }
      };

      //=======================================================
      //   * Last name validation
      //========================================================
      var checklname = function () {
         let lname = document.getElementById('lname').value;
         let regex_lname = /^[a-zA-Z]{3,30}$/;

         // check if last name is empty
         if (lname === "" || lname === null) {
            document.getElementById('message-lname').style.color = 'red';
            document.getElementById('message-lname').innerHTML = 'Last name cannot be empty!';
            document.getElementById('submit').disabled = true;
            document.signup.lname.focus();
         } else {

            // check if last name is less than 3 characters
            if (lname.length < 3) {
               document.getElementById('message-lname').style.color = 'red';
               document.getElementById('message-lname').innerHTML = 'Last name cannot be less than 3 characters!';
               document.getElementById('submit').disabled = true;
               document.signup.lname.focus();
            }

            // check if last name is greater than 30 characters
            if (lname.length > 30) {
               document.getElementById('message-lname').style.color = 'red';
               document.getElementById('message-lname').innerHTML = 'Last name cannot be More than 30 character!';
               document.getElementById('submit').disabled = true;
               document.signup.lname.focus();
            }

            // check if last name doesnot conforms to Reguler Expression
            if (!lname.match(regex_lname)) {
               document.getElementById('message-lname').style.color = 'red';
               document.getElementById('message-lname').innerHTML = 'Last name is invalid!';
               document.getElementById('submit').disabled = true;
               document.signup.lname.focus();
            }

            // check if first name conforms to Reguler Expression
            if (lname.match(regex_lname)) {
               document.getElementById('message-lname').innerHTML = '';
            }
         }
      };

      //=======================================================
      //   * Email validation
      //========================================================
      var checkemail = function () {
         let emailAdd = document.getElementById('email').value;

         //check empty email and password field
         if (emailAdd === "" || emailAdd == null) {
            document.getElementById('message-email').style.color = 'red';
            document.getElementById('message-email').innerHTML = 'Enter your email address';
            document.getElementById('submit').disabled = true;
            document.signup.email.focus();
         } else {
            // https://stackoverflow.com/questions/55744003/validate-regex-of-email
            var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // if email doesnot matched Regular Expressions
            if (!emailAdd.match(regex)) {
               document.getElementById('message-email').style.color = 'red';
               document.getElementById('message-email').innerHTML = 'Email is invalid!';
               document.signup.email.focus();
            }

            // if email matched Regular Expressions
            else if (emailAdd.match(regex)) {
               document.getElementById('message-email').innerHTML = '';
            }
         }
      };

      //=======================================================
      //   * Password validation
      //========================================================
      var checkpw = function () {
         let pword = document.getElementById('pswd1').value;
         let confirm_pword = document.getElementById('pswd2').value;
         // https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
         let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
         if (pword !== "") {
            if (pword.match(regex)) {
               document.getElementById('message-pw1').innerHTML = '';
            } else {
               document.getElementById('message-pw1').style.color = 'red';
               document.getElementById('message-pw1').innerHTML = 'Minimum 8 characters, at least 1 letter and 1 number mandatory';
               document.signup.pswd1.focus();
            }
         } else {
            document.getElementById('message-pw1').style.color = 'red';
            document.getElementById('message-pw1').innerHTML = 'Enter your password';
            document.signup.pswd1.focus();
         }
      };

   </script>


   <!-- =======================================================
      * Script to check if the both password matches
   ======================================================== -->
   <script type="text/javascript">
      function matchpw() {
         let pw1 = document.getElementById("pswd1").value;
         let pw2 = document.getElementById("pswd2").value;

         if (pw1 != "" && pw2 != "") {
            if (pw1 === pw2) {
               document.getElementById('message-pw1').style.color = 'lime';
               document.getElementById('message-pw1').innerHTML = 'password match';
               document.getElementById('submit').disabled = false;
            } else {
               document.getElementById('message-pw1').style.color = 'red';
               document.getElementById('message-pw1').innerHTML = 'password does not match';
               document.getElementById('submit').disabled = true;
               document.signup.pswd2.focus();
            }
         }

      }
   </script>

   <script type="text/javascript">

      function validate() {
         let fname = document.getElementById('fname').value;
         let lname = document.getElementById('lname').value;
         let emailAdd = document.getElementById('email').value;
         let pw1 = document.getElementById("pswd1").value;
         let pw2 = document.getElementById("pswd2").value;
         if (fname !== "" && lname !== "" && emailAdd !== "" && pw1 !== "" && pw2 !== "") {
         alert("Congratulations, you've Registered successfully!!! \n Please wait for Admin Approval.");
         return true;
         } else {
         document.getElementById('submit').disabled = true;
         return false;
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

<body style="background-image: url('assets/img/signup.jpg');">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-6 col-lg-8 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-3">
               <div class="card-body p-3">
                  <div class="row">
                     <div class="col-lg">
                        <div class="p-4">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-3">Sign Up</h1>
                           </div>
                           <form action="process-signup.php" class="user" method="POST" name="signup" onsubmit="return validate();" novalidate>
                              <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="text" id="fname" name="fname"
                                       placeholder="First Name" autocomplete="off" onkeyup="checkfname();">
                                    <span id="message-fname" style="font-size: small;"></span>
                                 </div>
                                 <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="text" id="lname" name="lname"
                                       placeholder="Last Name" autocomplete="off" onkeyup="checklname();">
                                    <span id="message-lname" style="font-size: small;"></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input class="form-control form-control-user" type="email" id="email" name="email"
                                    placeholder="Email Address" autocomplete="off" onBlur="checkmailAvailability();"
                                    onkeyup="checkemail();">
                                 <span id="user-availability-status"></span>
                                 <span id="message-email" style="font-size: small;"></span>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input class="form-control form-control-user" type="password" id="pswd1"
                                       name="pswd1" placeholder="Password" autocomplete="off" onkeyup="checkpw();">
                                    <span id="message-pw1" style="font-size: small;"></span>
                                 </div>
                                 <div class="col-sm-6">
                                    <input class="form-control form-control-user" type="password" id="pswd2"
                                       name="pswd2" placeholder="Confirm Password" autocomplete="off"
                                       onkeyup='matchpw();'>
                                    <span id="message-pw2" style="font-size: small;"></span>
                                 </div>
                              </div>
                              <button class="btn btn-danger btn-block text-white btn-user" type="submit" name="signup"
                                 id="submit" disabled>Register Account
                              </button>
                              <hr>
                           </form>
                           <div class="text-center">
                              <a href="index.php" class="btn btn-primary btn-block text-white btn-user">Home</a>
                              <hr>
                           </div>
                           <div class="text-center"><a href="login.php"
                                 class="btn btn-success btn-block text-white btn-user">Already
                                 have an
                                 account?
                                 Login!</a>
                           </div>
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