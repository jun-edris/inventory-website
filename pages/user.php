<?php
    
    include("./../includes/head.php");
    include("./../config/register.php");
    include("./../config/updateUser.php");
    include("./../config/deleteUser.php");
    include("./../config/login.php");

    $pageName = "user";
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
                        if($successUpdateMsg) {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                                echo "<strong>Yehey </strong>$successUpdateMsg";
                                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                                        echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                            echo "</div>";
                        }
                        if($errorUpdateMsg) {
                            echo "<div class='alert alert-error alert-dismissible fade show' role='alert' aria-label='assertive' aria-atomic='true' data-autohide='true' style='position: absolute; top: -0.5rem; right: 1rem; z-index: 10'>";
                            echo $errorUpdateMsg;
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
                            <?php
                                if($_SESSION["user_type"] == 'admin') {

                                    echo "<button data-toggle='modal' data-target='#addUserModal' class='btn btn-primary'>";
                                    echo    "<i class='fas fa-user-plus mr-2'></i>";
                                    echo    "Add";
                                    echo "</button>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Type</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Disable User</th>
                                            <?php
                                                if($_SESSION["user_type"] == 'admin') {
                                                    echo "<th>Action</th>";
                                                }
                                            ?>
                                            <th>Request Change</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Type</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Disable User</th>
                                            <?php
                                                if($_SESSION["user_type"] == 'admin') {
                                                    echo "<th>Action</th>";
                                                }
                                            ?>
                                            <th>Request Change</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sqlquery = "SELECT * FROM `tbl_users` WHERE `user_type`!='admin' ";
                                            $res = $database->query($sqlquery);

                                            if($res->num_rows > 0) {
                                                while($row = $res->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td class="text-capitalize" id="edit_id"><?php echo $row['user_id']?></td>
                                            <td class="text-capitalize" id=""><?php echo $row['user_type']?></td>
                                            <td class="text-capitalize"><?php echo $row['username']?></td>
                                            <td class="text-capitalize"><?php echo $row['firstname']?></td>
                                            <td class="text-capitalize"><?php echo $row['lastname']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['age']?></td>
                                            <td class="text-capitalize"><?php echo $row['sex']?></td>
                                            <td><?php echo '0' . $row['phone']?></td>
                                            <td class="text-capitalize"><?php echo $row['addresss']?></td>
                                            <td>
                                                <form action="user.php" method="POST" class="user">
                                                    <input type="text" class="form-control" id="changeId" placeholder="ID"
                                                        required name="changeId" value="<?php echo $row['user_id']?>" hidden />

                                                    <div class="btn-group" role="group" aria-label="group button">
                                                    <button 
                                                        type="<?php if($row['enableuser'] == 1) { echo "submit"; } if($row['enableuser'] == 0) { echo "button"; } ?>" 
                                                        class="btn btn-danger"
                                                        name="<?php if($row['enableuser'] == 1) { echo "EnableUser"; } if($row['enableuser'] == 0) { echo "hello"; } ?>"
                                                        <?php
                                                            if($row['enableuser'] == 1) {
                                                                echo "enabled";
                                                            }
                                                            if($row['enableuser'] == 0) {
                                                                echo "disabled";
                                                            }
                                                        ?>
                                                        value="0"
                                                        >Deactivate</button>
                                                        <button
                                                        type="<?php if($row['enableuser'] == 1) { echo "button"; } if($row['enableuser'] == 0) { echo "submit"; } ?>"
                                                        class="btn btn-success"
                                                        name="<?php if($row['enableuser'] == 1) { echo "hello"; } if($row['enableuser'] == 0) { echo "EnableUser"; } ?>"
                                                        <?php
                                                            if($row['enableuser'] == 1) {
                                                                echo "disabled";
                                                            }
                                                            if($row['enableuser'] == 0) {
                                                                echo "enabled";
                                                            }
                                                        ?>
                                                        value="1"
                                                        >Activate</button>
                                                    </div>
                                                   
                                                </form>
                                            </td>
                                            <?php
                                                if($_SESSION["user_type"] == 'admin') {
                                                    echo "<td>";
                                                    echo    "<div class='d-flex'>";
                                                    echo        "<button data-toggle='modal' data-target='#editUserModal' class='btn btn-info mr-2 d-flex align-items-center btn-edit'>";
                                                    echo            "<i class='fas fa-user-edit mr-2'></i>";
                                                    echo            "Edit";
                                                    echo        "</button>";
                                                    echo        "<button data-toggle='modal' data-target='#deleteUserModal' class='btn btn-danger d-flex align-items-center btn-delete'>";
                                                    echo            "<i class='fas fa-user-minus mr-2'></i>";
                                                    echo            "Delete";
                                                    echo        "</button>";
                                                    echo    "</div>";
                                                    echo "</td>";
                                                }
                                            ?>
                                            <?php
                                                echo "<td>";
                                                    if($row['request'] == 'pending') {
                                                        echo  "<form action='user.php' method='POST'>";
                                                        echo     "<div class='d-flex'>";
                                                        echo         "<button type='submit' class='btn btn-info mr-2 d-flex align-items-center btn-edit'>";
                                                        echo             "<i class='fas fa-user-edit mr-2'></i>";
                                                        echo              "Allow";
                                                        echo          "</button>";
                                                        echo         "<button type='submit' name='decline' class='btn btn-danger d-flex align-items-center btn-delete'>";
                                                        echo              "<i class='fas fa-user-minus mr-2'></i>";
                                                        echo              "Decline";
                                                        echo         "</button>";
                                                        echo      "</div>";
                                                        echo  "</form>";
                                                    }
                                                echo "</td>";
                                            ?>
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

    <!-- Add User Modal-->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <form action="user.php" method="POST" class="user">
                                    <div class="form-group">
                                        <select class="form-control " id="exampleFormControlSelect1" required
                                            name="userType">
                                            <option value="">Please select a user type</option>
                                            <option value="admin">Admin</option>
                                            <option value="manager">Manager</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                        <?php echo $errorUserType ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="Username"
                                            required name="userName">
                                        <?php echo $errorUserName ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <input type="text" name="firstName" class="form-control" id="firstName"
                                                placeholder="First Name" required>
                                            <?php echo $errorFirstName ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="lastName" class="form-control" id="lastName"
                                                placeholder="Last Name" required>
                                            <?php echo $errorLastName ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Email Address" required name="email">
                                            <?php echo $errorEmail ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="age" placeholder="age"
                                                required name="age">
                                            <?php echo $errorAge ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" required name="password">
                                            <?php echo $errorPassword ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="repeatPassword"
                                                placeholder="Repeat Password" required name="repeatPassword">
                                            <?php echo $errorRepeatPassword ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+63</span>
                                            </div>
                                            <input type="text" pattern="\d*" maxlength="10" class="form-control"
                                                id="phone" placeholder="Phone" required name="phone">
                                        </div>
                                        <?php echo $errorPhone ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="Address"
                                            required name="address">
                                        <?php echo $errorAddress ?>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label for="exampleFormControlRadio" class="form-label">Sex</label>
                                            <div class="form-check" hidden>
                                                <input type="radio" value="" class="form-check-input" name="rdio"
                                                    id="rdio1" checked />
                                                <label for="rdio1" class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" value="Male" class="form-check-input" name="rdio"
                                                    id="rdio1" />
                                                <label for="rdio1" class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" value="Female" class="form-check-input" name="rdio"
                                                    id="rdio2" />
                                                <label for="rdio2" class="form-check-label">Female</label>
                                            </div>
                                            <?php echo $errorSex ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="register">
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

    <!-- Edit User Modal-->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="p-4 p-sm-5">
                                <form action="user.php" method="POST" class="user">
                                    <div class="form-group">
                                        <select class="form-control " id="edit_userType" required name="updateUserType">
                                            <option value="">Please select a user type</option>
                                            <option value="manager">Manager</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                        <?php echo $errorUpdateUserType ?>
                                        <input type="text" class="form-control" id="edit_ID" placeholder="ID"
                                            required name="editId" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="edit_userName"
                                            placeholder="Username" required name="updateUserName">
                                        <?php echo $errorUpdateUserName ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <input type="text" name="updateFirstName" class="form-control"
                                                id="edit_firstName" placeholder="First Name" required>
                                            <?php echo $errorUpdateFirstName ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="updateLastName" class="form-control"
                                                id="edit_lastName" placeholder="Last Name" required>
                                            <?php echo $errorUpdateLastName ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="edit_email"
                                                placeholder="Email Address" required name="updateEmail">
                                            <?php echo $errorUpdateEmail ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="edit_age" placeholder="age"
                                                required name="updateAge">
                                            <?php echo $errorUpdateAge ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+63</span>
                                            </div>
                                            <input type="text" pattern="\d*" maxlength="10" class="form-control"
                                                id="edit_phone" placeholder="Phone" required name="updatePhone">
                                        </div>
                                        <?php echo $errorUpdatePhone ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="edit_address" placeholder="Address"
                                            required name="updateAddress">
                                        <?php echo $errorUpdateAddress ?>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label for="exampleFormControlRadio" class="form-label">Sex</label>
                                            <div class="form-check">
                                                <input type="radio" value="Male" class="form-check-input"
                                                    name="updateRdio" id="edit_sexM" />
                                                <label for="edit_sexM" class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" value="Female" class="form-check-input"
                                                    name="updateRdio" id="edit_sexF" />
                                                <label for="edit_sexF" class="form-check-label">Female</label>
                                            </div>
                                            <?php echo $errorUpdateSex ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="edit_acc">
                                        Edit Account
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
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this user?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="user.php" method="POST" class="user">
                        <input type="text" class="form-control" id="deleteId" placeholder="ID"
                            required name="delete_id" hidden />
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger"  name="deleteData">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("./../includes/script.php") ?>

    <script>
        $(document).ready(function () {
            $('.btn-edit').on('click', function () {
                $tr = $(this).closest('tr');

                let data = $tr.children('td').map(function () {
                    return $(this).text();
                }).get();

                $('#edit_ID').val(data[0]);
                $('#edit_userType').val(data[1]);
                $('#edit_userName').val(data[2]);
                $('#edit_firstName').val(data[3]);
                $('#edit_lastName').val(data[4]);
                $('#edit_email').val(data[5]);
                $('#edit_age').val(data[6]);
                $('#edit_sex').val(data[7]);

                if (data[7] === 'Male') {
                    $('#edit_sexM').attr('checked', 'checked');
                }
                if (data[7] === 'Female') {
                    $('#edit_sexF').attr('checked', 'checked');
                }
                let phoneNum = data[8].split('');

                phoneNum.shift();
                let stringPN = phoneNum.join();

                let actualPN = stringPN.replace(/,/g, "");
                $('#edit_phone').val(actualPN);
                $('#edit_address').val(data[9]);
            })
        });

        $('.btn-delete').on('click', function () {
            $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();

            $('#deleteId').val(data[0]);
        }); 
    </script>
</body>

</html>