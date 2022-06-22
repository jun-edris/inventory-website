<?php
    include("./../includes/head.php");
    include("./../config/addProduct.php");
    include("./../config/updateProduct.php");
    include("./../config/deleteProduct.php");
    include("./../config/login.php");

    $pageName = "inventory";
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
                    <?php
                        if($successMsg) {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                                echo "<strong>Yehey </strong>$successMsg";
                                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            echo "</div>";
                        }
                        if($errorMsg) {
                            echo "<div class='alert alert-error alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                            echo $errorMsg;
                            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                            echo "</div>";
                        }
                        if($successDeleteMsg) {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                                echo "<strong>Yehey </strong>$successDeleteMsg";
                                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            echo "</div>";
                        }
                        if($errorDeleteMsg) {
                            echo "<div class='alert alert-error alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                            echo $errorDeleteMsg;
                            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                            echo "</div>";
                        }
                    ?>
                    <div class="row my-4 container">
                        <div class="mr-auto">
                            <button data-toggle="modal" data-target="#addProductModal" class="btn btn-primary">
                                <i class="fas fa-user-plus mr-2"></i>
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Type</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Type</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sqlquery = "SELECT * FROM `tbl_product`";
                                            $res = $database->query($sqlquery);

                                            if($res->num_rows > 0) {
                                                while($row = $res->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['product_id']?></td>
                                                <td class="text-capitalize"><?php echo $row['product_type']?></td>
                                                <td class="text-capitalize"><?php echo $row['productname']?></td>
                                                <td><?php echo $row['quantity']?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button data-toggle="modal" data-target="#updateProductModal"
                                                            class="btn btn-info mr-2 d-flex align-items-center btn-editProd">
                                                            <i class="fas fa-user-edit mr-2"></i>
                                                            Edit
                                                        </button>
                                                        <button data-toggle="modal" data-target="#deleteProductModal"
                                                            class="btn btn-danger d-flex align-items-center btn-deleteProd">
                                                            <i class="fas fa-user-minus mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
                    <form action="dashboard.php" method="POST">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal-->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="p-4 p-sm-5">
                                <form action="inventory.php" method="POST" class="user">
                                    <div class="form-group">
                                        <select class="form-control " id="exampleFormControlSelect1" required
                                            name="productType">
                                            <option value="">Please select a user type</option>
                                            <option value="food">Food</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="furniture">Furniture</option>
                                            <option value="tools">Tools</option>
                                        </select>
                                        <?php echo $errorProductType ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="productName" placeholder="Product Name"
                                            required name="productName">
                                        <?php echo $errorProductName ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="quantity" placeholder="Quantity"
                                            required name="quantity">
                                        <?php echo $errorQuantity ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="addProduct">
                                        Add Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Product Modal-->
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="p-4 p-sm-5">
                                <form action="inventory.php" method="POST" class="user">
                                    <div class="form-group">
                                        <select class="form-control " id="edit_prodType" required
                                            name="productType">
                                            <option value="">Please select a user type</option>
                                            <option value="food">Food</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="furniture">Furniture</option>
                                            <option value="tools">Tools</option>
                                        </select>
                                        <?php echo $errorProductType ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="edit_prodName" placeholder="Product Name"
                                            required name="productName">
                                        <?php echo $errorProductName ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="edit_qnty" placeholder="Quantity"
                                            required name="quantity">
                                        <?php echo $errorQuantity ?>
                                    </div>
                                    <input type="text" class="form-control" id="edit_prodID" placeholder="ID"
                                            required name="prodID" hidden>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="updateProduct">
                                        Update Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this product?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="inventory.php" method="POST" class="user">
                        <input type="text" class="form-control" id="delete_prodId" placeholder="ID"
                            required name="delete_prodId" hidden />
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger"  name="delete_prodData">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("./../includes/script.php") ?>

    <script>
        $(document).ready(function () {
            $('.btn-editProd').on('click', function () {
                $tr = $(this).closest('tr');

                let data = $tr.children('td').map(function () {
                    return $(this).text();
                }).get();

                $('#edit_prodID').val(data[0]);
                $('#edit_prodType').val(data[1]);
                $('#edit_prodName').val(data[2]);
                $('#edit_qnty').val(data[3]);
            })
        });

        $('.btn-deleteProd').on('click', function () {
            $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();

            $('#delete_prodId').val(data[0]);
        }); 
    </script>
</body>

</html>