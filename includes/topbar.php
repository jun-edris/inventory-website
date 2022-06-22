<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="mr-3 d-none d-lg-inline text-gray-600 small">
                    <div class="d-flex flex-column align-items-end">
                        <span class="text-capitalize font-weight-bold">
                        <?php 
                            if(isset($_SESSION['firstname']) && isset($_SESSION["lastname"])) {
                                echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
                            }
                        ?>
                        </span>
                        <span class="text-capitalize">
                        <?php 
                            if(isset($_SESSION['user_type'])) {
                                echo $_SESSION['user_type'];
                            }
                        ?>
                        </span>
                    </div>
                </div>
                <img class="img-profile rounded-circle" src="./../img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
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