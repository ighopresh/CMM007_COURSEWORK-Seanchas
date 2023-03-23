<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>App Management</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Page:</h6>
                        <a class="collapse-item" href="add-post.php"><i
                                class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>Add Stories</a>
                        <a class="collapse-item" href="manage-post.php"><i
                                class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Manage Stories</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">User Management:</h6>
                        <a class="collapse-item" href="active-storytellers.php"><i
                                class="fas fa-calendar fa-sm fa-fw mr-2 text-gray-400"></i>Active StoryTellers</a>
                        <a class="collapse-item" href="pending-storytellers.php"><i
                                class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>Pending StoryTellers</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Story Management:</h6>
                        <a class="collapse-item" href="active-stories.php"><i
                                class="fas fa-clipboard-list fa-sm fa-fw mr-2 text-gray-400"></i>Active Stories</a>
                        <a class="collapse-item" href="pending-stories.php"><i
                                class="fas fa-comments fa-sm fa-fw mr-2 text-gray-400"></i>Pending Stories</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Sign Out:</h6>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal"><i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                    </div>
                </div>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>