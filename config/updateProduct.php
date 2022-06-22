<?php
    require("conn.php");

    $errorProductType = "";
    $errorProductName = "";
    $errorQuantity = "";

    $successMsg = "";
    $errorMsg = "";

    $numberRegex = '/^(([0-9]*)|(([0-9]*)\.([0-9]*)))$/';
    $letterAndSpecialChar = '/^\D+$/';

    if(isset($_POST["updateProduct"])) {
        $prod_ID = $_POST["prodID"];
        $productType = $database->real_escape_string($_POST["productType"]);
        $productName = $database->real_escape_string($_POST["productName"]);
        $quantity = $database->real_escape_string($_POST["quantity"]);

        // echo $productType . " " . $productName . " " . $quantity;

        // Product Type
        if(empty($productType) || $productType == '') {
            $errorProductType = '<small class="text-danger">Empty Selection</small>';
        }
        //  Product Name
        if(empty($productName)) {
            $errorProductName = '<small class="text-danger">Empty User name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $productName) > 0) {
            $errorProductName = '<small class="text-danger">Only letters and symbols</small>';
        }
        
        // Quantity
        if(empty($quantity)) {
            $errorQuantity = '<small class="text-danger">Empty User name</small>';
        } else if(!preg_match_all($numberRegex, $quantity)) {
            $msgNumber = '<small class="text-danger">Must be a number</small>';
        } 

        if((empty($productType) || $productType == '') || (empty($productName)) ||
        (!preg_match_all($letterAndSpecialChar, $productName) ||
        (empty($quantity)) ||
        (!preg_match_all($numberRegex, $quantity)))) {
            return;
        } else {
            $updateProduct = $database->query("UPDATE `tbl_product` SET `product_type`='$productType', `productname`='$productName', `quantity`='$quantity' WHERE `product_id`='$prod_ID' ");

            if($updateProduct) {
                $successMsg = "Successfully updated";
            } else {
                $errorMsg = "Something went wrong";
            }
        }
    }
?>