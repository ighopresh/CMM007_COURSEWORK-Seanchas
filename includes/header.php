<?php

// session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "\config.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>

<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container px-4 px-lg-5">
         <a class="navbar-brand" href="index.php">SEANCHAS</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About Us</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="view-stories.php">view-stories</a>
               </li>
               <?php if (isset($user)): ?>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     My Stories
                  </a>
                  <!-- Here's the magic. Add the .animate and .slideIn classes to your .dropdown-menu and you're all set! -->
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                     <a class="dropdown-item" href="add-post.php">Add Stories</a>
                     <a class="dropdown-item" href="manage-post.php">Manage Stories</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php 
                        $user_id = $_SESSION['user_id'];
                        $sql = sprintf("SELECT * FROM users WHERE id = '%s'",$user_id);
                        $stmt = $mysqli->query($sql);
                        $users = $stmt->fetch_assoc();
                        $user_name = htmlentities($users["l_name"]); 
                        echo htmlentities($user_name); ?>
                  </a>
                  <!-- Here's the magic. Add the .animate and .slideIn classes to your .dropdown-menu and you're all set! -->
                  <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log out</a>
                     <div class="dropdown-divider"></div>
                  </div>
               </li>
               <?php else: ?>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">Login</a></li>
               
                <?php endif; ?>
            </ul>
         </div>
      </div>
   </nav>