<?php
    include("./../includes/head.php");
    include("./../config/login.php");
    $pageName = "dashboard";
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("./../includes/sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include("./../includes/topbar.php") ?>
                <div class="container-fluid position-relative">

                    <!-- Users -->
                    <div class="mb-4">
                        <h3 class="h6 font-weight-bold">Users</h3>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-user-secret fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Manager</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-user-tie fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Supervisor</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-user fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Employee</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div>
                        <h3 class="h6 font-weight-bold">Inventory</h3>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-utensils fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Foods</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-laptop-medical fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Electronics</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-couch fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Furniture</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <button class="btn">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <i class="fas fa-tools fa-3x text-secondary"></i>
                                            <div class="d-flex flex-column align-items-end">
                                                <h4 class="h3">1</h4>
                                                <h6>Tools</h6>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- List of Managers -->
                    <!-- List of Supervisors  -->
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("./../includes/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End Page Wrapper -->

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
                    <form action="dashboard.php" method="POST">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("./../includes/script.php") ?>
</body>

</html>