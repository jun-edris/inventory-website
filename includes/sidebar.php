<?php
    $menuItems = ["dashboard", "user", "inventory"];
    $userItems = ["add_user", "edit_user", "delete_user"];
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./../pages/dashboard.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-dolly-flatbed"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Management System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Items -->
    <?php foreach($menuItems as $item) { ?>
        <li class="nav-item <?= $pageName == $item ? 'active' : '' ?>">
            <a class="nav-link" href="./../pages/<?php echo $item ?>.php">
                <?php if($item == "dashboard") { ?>
                    <i class="fas fa-columns"></i>
                <?php } ?>
                <?php if($item == "user") { ?>
                    <i class="fas fa-users"></i>
                <?php } ?>
                <?php if($item == "inventory") { ?>
                    <i class="fas fa-boxes"></i>
                <?php } ?>
                <span class="text-capitalize"><?php echo $item ?></span>
            </a>
        </li>
    <?php }?>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users-cog"></i>
            <span>Manage Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php foreach($userItems as $item) { ?>
                    <a class="nav-item collapse-item <?= $pageName == $item ? 'active' : '' ?>" href="./../pages/<?php echo $item ?>.php">
                        <?php if($item == "add_user") { ?>
                            <i class="fas fa-user-plus mr-2"></i>
                        <?php } ?>
                        <?php if($item == "edit_user") { ?>
                            <i class="fas fa-user-edit mr-2"></i>
                        <?php } ?>
                        <?php if($item == "delete_user") { ?>
                            <i class="fas fa-user-minus mr-2"></i>
                        <?php } ?>
                        <span class="text-capitalize"><?php echo $item ?></span>
                    </a>
                <?php }?>
               
                <!-- <a class="nav-item collapse-item" href="./../pages/users/edit_user.php">
                    
                    <span>Edit User</span>
                </a>
                <a class="nav-item collapse-item" href="./../pages/users/delete_user.php">
                    
                    <span>Delete User</span>
                </a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Manage Inventory</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">
                    <i class="fas fa-pallet mr-2"></i>
                    <span>Add Product</span>
                </a>
                <a class="collapse-item" href="cards.html">
                    <i class="fas fa-truck-moving mr-2"></i>
                    <span>Edit Product</span>
                </a>
                <a class="collapse-item" href="cards.html">
                    <i class="fas fa-truck-loading mr-2"></i>
                    <span>Delete Product</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->