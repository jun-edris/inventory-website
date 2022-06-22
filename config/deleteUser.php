<?php
    require("conn.php");

    $successDeleteMsg = "";
    $errorDeleteMsg = "";

    if(isset($_POST["deleteData"])) {
        $id = $_POST["delete_id"];

        $deleteUser = $database->query("DELETE FROM `tbl_users` WHERE `user_id`='$id' ");

        if($deleteUser) {
            $successDeleteMsg = "User is deleted";
        } else {
            $errorDeleteMsg = $database->error;
        }
    }
?>