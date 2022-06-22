<?php
    require("conn.php");
    
    $errorUpdateUserType = "";
    $errorUpdateUserName = "";
    $errorUpdateFirstName = "";
    $errorUpdateLastName = "";
    $errorUpdateEmail = "";
    $errorUpdateAge = "";
    $errorUpdatePhone = "";
    $errorUpdatePassword = "";
    $errorUpdateRepeatPassword = "";
    $errorUpdateAddress = "";
    $errorUpdateSex = "";

    $successUpdateMsg = "";
    $errorUpdateMsg = "";

    $numberRegex = '/^(([0-9]*)|(([0-9]*)\.([0-9]*)))$/';
    $emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $letterAndSpecialChar = '/^\D+$/';
    $addressRegex = '/^\\d+ [a-zA-Z ]+, \\d+ [a-zA-Z ]+, [a-zA-Z ]+$/';

    if(isset($_POST["edit_acc"])) {
        $userId = $_POST["editId"];
        $userType = $database->real_escape_string($_POST["updateUserType"]);
        $userName = $database->real_escape_string($_POST["updateUserName"]);
        $firstName = $database->real_escape_string($_POST["updateFirstName"]);
        $lastName = $database->real_escape_string($_POST["updateLastName"]);
        $email = $database->real_escape_string($_POST["updateEmail"]);
        $age = $database->real_escape_string($_POST["updateAge"]);
        $phone = $database->real_escape_string($_POST["updatePhone"]);
        $address = $database->real_escape_string($_POST["updateAddress"]);
        $sex = $database->real_escape_string($_POST["updateRdio"]);

        $splitedNumber = str_split($phone);

        // User Type
        if(empty($userType) || $userType == '') {
            $errorUserType = '<small class="text-danger">Empty Selection</small>';
        }

        //  Username
        if(empty($userName)) {
            $errorUpdateUserName = '<small class="text-danger">Empty User name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $userName) > 0) {
            $errorUpdateUserName = '<small class="text-danger">Only letters and symbols</small>';
        }

        // First Name
        if(empty($firstName)) {
            $errorUpdateFirstName = '<small class="text-danger">Empty First Name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $firstName) > 0) {
            $errorUpdateFirstName = '<small class="text-danger">Only letters and symbols</small>';
        } 

        // Last Name
        if(empty($lastName)) {
            $errorUpdateLastName = '<small class="text-danger">Empty Last Name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $lastName) > 0) {
            $errorUpdateLastName = '<small class="text-danger">Only letters and symbols</small>';
        } 

        // Email
        if(empty($email)) {
            $errorUpdateEmail = '<small class="text-danger">Empty Email</small>';
        } else if(!preg_match_all($emailRegex, $email) > 0) {
            $errorUpdateEmail = '<small class="text-danger">Error</small>';
        } 

        // Address
        if(empty($address)) {
            $errorUpdateAddress = '<small class="text-danger">Empty Address</small>';
        } else if(preg_match_all($addressRegex, $address) > 0) {
            $errorUpdateAddress = '<small class="text-danger">Only letters and symbols</small>';
        } 

        // Sex
        if(empty($sex) || $sex === '') {
            $errorUpdateSex = '<small class="text-danger">Empty Selection</small>';
        } 

        // Phone number
        if($splitedNumber[0] !== '9') {
            $errorUpdatePhone = '<small class="text-danger">Phone number should start with 9</small>';
        } else if(strlen($phone) !== 10) {
            $errorUpdatePhone = '<small class="text-danger">Phone number should be 10 numbers</small>';
        } else if(!preg_match_all($numberRegex, $phone)) {
            $errorUpdatePhone = '<small class="text-danger">Must be a number</small>';
        } 

        if((empty($userType) || $userType == '') || (empty($userName)) ||
        (!preg_match_all($letterAndSpecialChar, $userName) > 0) ||
        (empty($firstName)) ||
        (!preg_match_all($letterAndSpecialChar, $userName) > 0) ||
        (empty($lastName)) ||
        (!preg_match_all($letterAndSpecialChar, $lastName) > 0) ||
        (empty($address)) ||
        (preg_match_all($addressRegex, $address) > 0) ||
        (empty($sex) || $sex === '') ||
        ($splitedNumber[0] !== '9') ||
        (strlen($phone) !== 10) ||
        (!preg_match_all($numberRegex, $phone)) || (empty($address)) ||
        (preg_match_all($addressRegex, $address) > 0)) {
            return;
        } else {
            $editAcc = $database->query("UPDATE `tbl_users` SET `user_type`='$userType',`username`='$userName',`firstname`='$firstName',`lastname`='$lastName',`email`='$email',`age`='$age',`phone`='$phone',`addresss`='$address',`sex`='$sex' WHERE `user_id` = '$userId'");

            if($editAcc) {
                $successUpdateMsg = "User updated successfully";
            } else {
                $errorUpdateMsg = $database->error;
                return;
            }
        }
    }

    if(isset($_POST["EnableUser"])) {
        $userId = $_POST["changeId"];
        $enabledUser = $_POST["EnableUser"];
        $enable = $database->query("UPDATE `tbl_users` SET `enableuser`='$enabledUser' WHERE `user_id`='$userId' ");

        if($enable) {
            if($enabledUser == 1) {
                $successUpdateMsg = "User is enabled";
            }
            if($enabledUser == 0) {
                $successUpdateMsg = "User is disabled";
            }
        } else {
            $errorUpdateMsg = $database->error;
            return;
        }
    }
?>