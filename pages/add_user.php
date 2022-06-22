<?php
    include("./../includes/head.php");

    $pageName = "add_user";
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

                <div class="container-fluid">
                    <!-- Page Heading -->
                    


                    <div class="container  d-flex justify-content-center align-items-center">

                        <div class="card o-hidden border-0 shadow-lg my-5 w-md-75">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col">
                                        <div class="p-4 p-sm-5">
                                            <div class="text-center">
                                                <h3 class="h4 text-gray-900 mb-4">Create User</h3>
                                            </div>
                                            <form class="user">
                                                <div class="form-group">
                                                <select class="form-control " id="exampleFormControlSelect1" required>
                                                    <option value="manager">Manager</option>
                                                    <option value="supervisor">Supervisor</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <input type="text" class="form-control"
                                                            id="firstName" placeholder="First Name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                            id="lastName" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control"
                                                            id="email" placeholder="Email Address" required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control"
                                                            id="email" placeholder="age" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">+63</span>
                                                        </div>
                                                        <input type="number" class="form-control"
                                                            id="phone" placeholder="Phone" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <input type="password" class="form-control"
                                                            id="password" placeholder="Password" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                            id="repeatPassword" placeholder="Repeat Password" required>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Register Account
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("./../includes/script.php") ?>
</body>

</html>