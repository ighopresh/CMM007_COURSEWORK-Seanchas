<?php

session_start();

# on submit for user deletion
if (isset($_REQUEST['del'])) {
    $delid = intval($_GET['del']);
    $sql = sprintf("DELETE FROM stories WHERE id='%s'", $delid);
    $stmt = $mysqli->query($sql);
    echo "<script>alert('Story DELETED successfully!');document.location = 'pending-storytellers.php';</script>";
}
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

   <title>Seanchas - Manage Post</title>


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

   <!-- Custom styles for this page -->
   <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                  <h1 style="margin-bottom: 25px;">Manage Post</h1>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Main Content-->
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-10 mx-auto">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>S/N</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- select Individual Active Stories from Seanchas database -->
                           <?php 
                              $user_id = $_SESSION['user_id'];
                              $sql = "SELECT stories.* FROM stories JOIN users ON users.id = stories.user_id WHERE stories.stat=1 AND users.id = $user_id";
                              $mysqli->real_query($sql);
                              $no = 1;
                              if ($mysqli->field_count) {
                                 $users = $mysqli->store_result();
                                 foreach ($users as $user) {
                                     ?>
                                    <tr>
                                          <td><?php echo htmlentities($no); ?></td>
                                          <td><?php echo htmlentities($user["title"]); ?></td>
                                          <td><?php echo htmlentities($user["cat"]); ?></td>
                                          <td><a href="edit-post.php?id=<?php echo $user["id"]; ?>" style="text-decoration: none;">Edit</a></td>
                                          <td><a href="active-stories.php?del=<?php echo $user["id"]; ?>"
                                                onclick="return confirm('Do you want to delete this Story?');"><svg style="color: red"
                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-trash"
                                    viewBox="0 0 16 16">
                                    <path
                                          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                                          fill="red"></path>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                          fill="red"></path>
                                 </svg></a>
                                          </td>
                                    </tr>
                                    <?php $no = $no + 1;
                                 }
                              } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
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
                  <a class="btn btn-primary" href="login.php">Logout</a>
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

   <!-- Page level plugins -->
   <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>
<?php }else{header('location: login.php');  }?>