<?php

session_start();

$mysqli = require __DIR__ . "\includes\database.php";    

?>
<?php include 'includes/cookie.php'; ?>
<?php if (isset($user)){ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Edit Post</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   <!-- Drag and Drop CSS -->
   <link rel="stylesheet" href="../assets/css/drag.css">

   <script type="text/javascript">

      function validate() {
         let title = document.getElementById('title').value;
         let select1 = document.getElementById('select1').value;
         let select2 = document.getElementById('select2').value;
         let file = document.getElementById("file").value;
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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- End of Sidebar -->
        <?php
            $id = intval($_GET['id']);
            $sql = "SELECT *, users.f_name, users.l_name FROM stories JOIN users ON users.id=stories.user_id WHERE stories.id=$id";
            $mysqli->real_query($sql);
            if ($mysqli->field_count) {
                $users = $mysqli->store_result();
                foreach ($users as $user) {
                    $full_name = htmlentities($user["f_name"] . " " . $user["l_name"]);?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <?php include 'includes/template/alert.php'; ?>

                        <!-- Nav Item - Messages -->
                        <?php include 'includes/template/message.php'; ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php 
                                    $admin_id = $_SESSION['user_id'];
                                    $sql = sprintf("SELECT * FROM u_admin WHERE id = '%s'",$admin_id);
                                    $stmt = $mysqli->query($sql);
                                    $users = $stmt->fetch_assoc();
                                    $admin_name = htmlentities($users["username"]); 
                                    echo htmlentities($admin_name); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile_1.svg">
                            </a>
                            <!-- Logout -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    
                    <!-- Main Content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-8 mx-auto">
                                <form action="admin-edit-post-process.php" id="contactForm" method="post" enctype="multipart/form-data" name="add_post" onsubmit="return validate();">
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                        <label class="form-text" for="title"><strong>Title</strong></label>
                                        <input type="text" name="post_id" value="<?php echo htmlentities($id); ?>" hidden>
                                        <input class="form-control" type="text" id="title" required placeholder="Title" name="title"
                                        value="<?php echo htmlentities($user["title"]); ?>">
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
                                        <label class="form-text" for="select2"><strong>Select Location</strong></label>
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
                                            <!-- <button>Browse File</button> -->
                                            <input type="file" class="form-control-file" id="file1" name="file1" value="<?php echo htmlentities($user["img"]); ?>">
                                        </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                        <label class="form-text" for="desc"><strong>Description</strong></label>
                                        <textarea class="form-control" id="desc" required rows="5" name="desc">
                                            <?php echo htmlentities($user["descript"]); ?>
                                        </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls">
                                        <label class="form-text" for="name"><strong>Autor</strong></label>
                                        <input class="form-control" type="text" id="name" disabled name="name" value="<?php echo htmlentities($full_name); ?>">
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
                            <?php }
                                    } ?>
                        </div>
                    </div>
                        
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="js/demo/datatables-demo.js"></script>

   <!-- Drag and Drop -->
   <script type="text/javascript">
    const dropArea = document.querySelector(".drag-image"),
       dragText = dropArea.querySelector("h6"),
       button = dropArea.querySelector("#sendMessageButton"),
       input = dropArea.querySelector("#file1");
    let file;

    button.onclick = () => {
       input.click();
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