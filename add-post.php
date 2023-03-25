<?php

session_start();
if (isset($_SESSION["user_id"])) {
    
   $mysqli = require __DIR__ . "\includes\config.php";
   
   $sql = "SELECT * FROM users
           WHERE id = {$_SESSION["user_id"]}";
           
   $result = $mysqli->query($sql);
   
   $user = $result->fetch_assoc();
}
?>
<?php if (isset($user)){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

   <title>Seanchas - Add Story</title>


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


   <!-- Drag and Drop CSS -->
   <link rel="stylesheet" href="assets/css/drag.css">

   <script type="text/javascript">

      function validate() {
         let title = document.getElementById('title').value;
         let select1 = document.getElementById('select1').value;
         let select2 = document.getElementById('select2').value;
         let file = document.getElementById("file1").value;
         let desc = document.getElementById("desc").value;
         let username = document.getElementById("username").value;
         if (title !== "" && select1 !== "" && select2 !== "" && file !== "" && desc !== "" && username !== "") {
         alert("Post submitted successfully, please wait for Admin's approval!");
         return true;
         } else {
         document.getElementById('submit').disabled = true;
         return false;
         }
         
      }
   </script>

</head>

<body>
   <!-- Navigation-->
   <?php include 'includes/header.php'; ?>

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('assets/img/addpost.jpg')">
   <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12" style="min-height: 5px; height: 8px;">
               <div class="site-heading">
                  <h1 style="margin-bottom: 25px;">Create a Post</h1>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Main Content-->
   <div class="container">
      <div class="row">
         <div class="col-md-10 col-lg-8 mx-auto">
            <form action="add-post-process.php" id="contactForm" method="post" enctype="multipart/form-data" name="add_post" onsubmit="return validate();">
               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <label class="form-text" for="title"><strong>Title</strong></label>
                     <input class="form-control" type="text" id="title" required placeholder="Title" name="title">
                  </div>
               </div>
               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <label class="form-text" for="select1"><strong>Select Category</strong></label>
                     <select class="form-control" id="select1" name="select1" required>
                        <option value="">-- Select --</option>
                        <option value="Place"> Place </option>
                        <option value="Object"> Object </option>
                     </select>
                  </div>
               </div>
               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <label class="form-text" for="select1"><strong>Select Location</strong></label>
                     <!-- https://www.mycomputertips.co.uk/127 -->
                     <select class="form-control" id="select2" name="select2" required>
                        <option value="">-- Scotland --</option>
                        <option value="Aberdeen City">Aberdeen City</option>
                        <option value="Aberdeenshire">Aberdeenshire</option>
                        <option value="Angus">Angus</option>
                        <option value="Argyll and Bute">Argyll and Bute</option>
                        <option value="Borders">Borders</option>
                        <option value="Clackmannan">Clackmannan</option>
                        <option value="Dumfries and Galloway">Dumfries and Galloway</option>
                        <option value="Dundee (City of)">Dundee (City of)</option>
                        <option value="East Ayrshire">East Ayrshire</option>
                        <option value="East Dunbartonshire">East Dunbartonshire</option>
                        <option value="East Lothian">East Lothian</option>
                        <option value="East Renfrewshire">East Renfrewshire</option>
                        <option value="Edinburgh (City of)">Edinburgh (City of)</option>
                        <option value="Falkirk">Falkirk</option>
                        <option value="Fife">Fife</option>
                        <option value="Glasgow (City of)">Glasgow (City of)</option>
                        <option value="Highland">Highland</option>
                        <option value="Inverclyde">Inverclyde</option>
                        <option value="Midlothian">Midlothian</option>
                        <option value="Moray">Moray</option>
                        <option value="North Ayrshire">North Ayrshire</option>
                        <option value="North Lanarkshire">North Lanarkshire</option>
                        <option value="Orkney">Orkney</option>
                        <option value="Perthshire and Kinross">Perthshire and Kinross</option>
                        <option value="Renfrewshire">Renfrewshire</option>
                        <option value="Shetland">Shetland</option>
                        <option value="South Ayrshire">South Ayrshire</option>
                        <option value="South Lanarkshire">South Lanarkshire</option>
                        <option value="Stirling">Stirling</option>
                        <option value="West Dunbartonshire">West Dunbartonshire</option>
                        <option value="West Lothian">West Lothian</option>
                        <option value="Western Isles">Western Isles</option>
                     </select>
                  </div>
               </div>

               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <!-- https://www.tutorialspoint.com/php-files#:~:text=%24_FILES%5B'file'%5D%5B'tmp_name'%5D,was%20stored%20on%20the%20server. -->
                     <label class="form-text" for="file1"><strong>Add an image</strong></label>
                     <!-- https://bbbootstrap.com/snippets/drag-and-drop-files-preview-area-85841530# -->
                     <div class="drag-image">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <h6>Drag & Drop File Here</h6>
                        <span>OR</span>
                        <!-- <button id="btn">Browse File</button> -->
                        <input type="file" class="form-control-file" id="file1" name="file1">
                     </div>
                  </div>
               </div>

               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <label class="form-text" for="desc"><strong>Description</strong></label>
                     <textarea class="form-control" id="desc" required rows="5" name="desc"></textarea>
                  </div>
               </div>
               <?php 
                  $user_id = $_SESSION['user_id'];
                  $sql = sprintf("SELECT * FROM users WHERE id = '%s'",$user_id);
                  $stmt = $mysqli->query($sql);
                  $users = $stmt->fetch_assoc();
                  $full_name = htmlentities($user["f_name"] . " " . $user["l_name"]);
                   ?>
               <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                     <label class="form-text" for="name"><strong>Autor</strong></label>
                     <input class="form-control" type="text" id="username" disabled name="username" value="<?php echo htmlentities($full_name); ?>">
                  </div>
               </div>

               <br>
               <div id="success"></div>
               <div class="form-group">
                  <button class="btn btn-primary float-right" id="sendMessageButton" type="submit" name="submit">Submit
                  </button>
               </div>
            </form>
         </div>
      </div>
      <br>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
   <!-- Core theme JS-->
   <script src="assets/js/scripts.js"></script>
   <script src="assets/js/main.js"></script>



   <!-- Bootstrap core JavaScript-->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min-1.js"></script>


   <!-- Drag and Drop -->
   <script type="text/javascript">
      const dropArea = document.querySelector(".drag-image"),
         dragText = dropArea.querySelector("h6"),
         but = dropArea.querySelector("#sendMessageButton"),
         inp = dropArea.querySelector("#file1");
      let file;

      but.onclick = () => {
         inp.click();
      }

      input.addEventListener("change", function () {

         file = this.files[0];
         dropArea.classList.add("active");
         viewfile();
      });

      dropArea.addEventListener("dragover", (event) => {
         event.preventDefault();
         dropArea.classList.add("active");
         dragText.textContent = "Release to Upload File";
      });


      dropArea.addEventListener("dragleave", () => {
         dropArea.classList.remove("active");
         dragText.textContent = "Drag & Drop to Upload File";
      });

      dropArea.addEventListener("drop", (event) => {
         event.preventDefault();

         file = event.dataTransfer.files[0];
         viewfile();
      });

      function viewfile() {
         let fileType = file.type;
         let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
         if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
               let fileURL = fileReader.result;
               let imgTag = `<img src="${fileURL}" alt="image">`;
               dropArea.innerHTML = imgTag;
            }
            fileReader.readAsDataURL(file);
         } else {
            alert("This is not an Image File!");
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
         }
      }
   </script>
</body>

</html>
<?php }else{header('location: login.php');  }?>