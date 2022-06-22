<?php
    require("conn.php");

    $successDeleteMsg = "";
    $errorDeleteMsg = "";

    if(isset($_POST["delete_prodData"])) {
        $id = $_POST["delete_prodId"];

        $deleteUser = $database->query("DELETE FROM `tbl_product` WHERE `product_id`='$id' ");

        if($deleteUser) {
            $successDeleteMsg = "Product is deleted";
        } else {
            $errorDeleteMsg = $database->error;
        }
    }
?>