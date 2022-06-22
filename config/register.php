<?php
    require("conn.php");
    
    $errorUserType = "";
    $errorUserName = "";
    $errorFirstName = "";
    $errorLastName = "";
    $errorEmail = "";
    $errorAge = "";
    $errorPhone = "";
    $errorPassword = "";
    $errorRepeatPassword = "";
    $errorAddress = "";
    $errorSex = "";

    $successMsg = "";
    $errorMsg = "";

    $numberRegex = '/^(([0-9]*)|(([0-9]*)\.([0-9]*)))$/';
    $emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $letterAndSpecialChar = '/^\D+$/';
    $addressRegex = '/^\\d+ [a-zA-Z ]+, \\d+ [a-zA-Z ]+, [a-zA-Z ]+$/';

    if(isset($_POST["register"])) {
        $userType = $database->real_escape_string($_POST["userType"]);
        $userName = $database->real_escape_string($_POST["userName"]);
        $firstName = $database->real_escape_string($_POST["firstName"]);
        $lastName = $database->real_escape_string($_POST["lastName"]);
        $email = $database->real_escape_string($_POST["email"]);
        $age = $database->real_escape_string($_POST["age"]);
        $phone = $database->real_escape_string($_POST["phone"]);
        $password = $database->real_escape_string($_POST["password"]);
        $repeatPassword = $database->real_escape_string($_POST["repeatPassword"]);
        $address = $database->real_escape_string($_POST["address"]);
        $sex = $database->real_escape_string($_POST["rdio"]);

        $splitedNumber = str_split($phone);

        // User Type
        if(empty($userType) || $userType == '') {
            $errorUserType = '<small class="text-danger">Empty Selection</small>';
        }
        //  Username
        if(empty($userName)) {
            $errorUserName = '<small class="text-danger">Empty User name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $userName) > 0) {
            $errorUserName = '<small class="text-danger">Only letters and symbols</small>';
        }
        // First Name
        if(empty($firstName)) {
            $errorFirstName = '<small class="text-danger">Empty First Name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $firstName) > 0) {
            $errorFirstName = '<small class="text-danger">Only letters and symbols</small>';
        } 
        // Last Name
        if(empty($lastName)) {
            $errorLastName = '<small class="text-danger">Empty Last Name</small>';
        } else if(!preg_match_all($letterAndSpecialChar, $lastName) > 0) {
            $errorLastName = '<small class="text-danger">Only letters and symbols</small>';
        } 

        // Email
        if(empty($email)) {
            $errorUpdateEmail = '<small class="text-danger">Empty Email</small>';
        } else if(!preg_match_all($emailRegex, $email) > 0) {
            $errorUpdateEmail = '<small class="text-danger">Error</small>';
        } 

        // Address
        if(empty($address)) {
            $errorAddress = '<small class="text-danger">Empty Address</small>';
        } else if(preg_match_all($addressRegex, $address) > 0) {
            $errorAddress = '<small class="text-danger">Only letters and symbols</small>';
        } 
        // Password
        if(empty($password)) {
            $errorPassword = '<small class="text-danger">Empty Password</small>';
        }
        // Repeat Password
        if(empty($repeatPassword)) {
            $errorRepeatPassword = '<small class="text-danger">Empty Repeat Password</small>';
        }

        if($repeatPassword !== $password) {
            $errorRepeatPassword = '<small class="text-danger">Password does not match</small>';
        }
        // Sex
        if(empty($sex) || $sex === '') {
            $errorSex = '<small class="text-danger">Empty Selection</small>';
        } 

        // Phone number
        if($splitedNumber[0] !== '9') {
            $errorPhone = '<small class="text-danger">Phone number should start with 9</small>';
        } else if(strlen($phone) !== 10) {
            $errorPhone = '<small class="text-danger">Phone number should be 10 numbers</small>';
        } else if(!preg_match_all($numberRegex, $phone)) {
            $msgNumber = '<small class="text-danger">Must be a number</small>';
        } 

        if((empty($userType) || $userType == '') || (empty($userName)) ||
        (!preg_match_all($letterAndSpecialChar, $userName) > 0) ||
        (empty($firstName)) ||
        (!preg_match_all($letterAndSpecialChar, $userName) > 0) ||
        (empty($lastName)) ||
        (!preg_match_all($letterAndSpecialChar, $lastName) > 0) ||
        (empty($address)) ||
        (preg_match_all($addressRegex, $address) > 0) ||
        (empty($password)) ||
        (empty($repeatPassword)) ||
        ($repeatPassword !== $password) ||
        (empty($sex) || $sex === '') ||
        ($splitedNumber[0] !== '9') ||
        (strlen($phone) !== 10) ||
        (!preg_match_all($numberRegex, $phone)) || (empty($email)) || 
        (!preg_match_all($emailRegex, $email) > 0)) {
            return;
        } else {

            // $actualPhoneNumber = "0" . $phone;
            $hashedPassword = md5($password);
            $register = $database->query("INSERT INTO tbl_users (user_type, username, firstname, lastname, email, age, phone, addresss, sex, pword, enableuser, request) 
                                            VALUES('$userType', '$userName', '$firstName', '$lastName', '$email', '$age', '$phone', '$address', '$sex', '$hashedPassword', 0, 'no')");

            if($register) {
                $successMsg = "User added successfully";
            } else {
                $errorMsg = $database->error;
                return;
            }
        }
    }
?>