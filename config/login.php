<?php
    require("conn.php");

    $successMsg = "";
    $errorMsg = "";

    $emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

    if(isset($_POST["login"])) {
        $email = $database->real_escape_string($_POST["email"]);
        $password = $database->real_escape_string($_POST["password"]);

        $hashedpwd = md5($password);
        if (isset($_POST["remember"])) {
            // Email
            if(empty($email)) {
                $errorMsg = '<small class="text-danger">Empty Email</small>';
            } else if(!preg_match_all($emailRegex, $email) > 0) {
                $errorMsg = '<small class="text-danger">Error</small>';
            }

            if((empty($email)) || (!preg_match_all($emailRegex, $email) > 0)) {
                return;
            } else {
                $request = $database->query("SELECT * FROM `tbl_users` WHERE `email`='$email' AND `pword`='$hashedpwd'");

                if($request) {
                    $loginState = true;
                    $remember = true;

                    $data = $request->fetch_assoc();

                    // SESSION
                    $_SESSION['loginState']  = $loginState;
                    $_SESSION['uid']  = $data["user_id"];
                    $_SESSION['user_type']  = $data["user_type"];
                    $_SESSION['email'] = $data["email"];
                    $_SESSION['username'] = $data["username"];
                    $_SESSION['firstname'] = $data["firstname"];
                    $_SESSION['lastname'] = $data["lastname"];

                    // COOKIES
                    setCookie('remember',$remember, time() + (86400 * 30), '/' );
                    setCookie('email', $email, time() + (86400 * 30), '/' );
                    setCookie('password', $password, time() + (86400 * 30), '/' );
                } else {
                    echo $database->error;
                }
            }
        } else {
            if(empty($email)) {
                $errorMsg = '<small class="text-danger">Empty Email</small>';
            } else if(!preg_match_all($emailRegex, $email) > 0) {
                $errorMsg = '<small class="text-danger">Error</small>';
            }

            if((empty($email)) || (!preg_match_all($emailRegex, $email) > 0)) {
                return;
            } else {
                $request = $database->query("SELECT * FROM `tbl_users` WHERE `email`='$email' AND `pword`='$hashedpwd'");

                if($request) {
                    $loginState = true;

                    $data = $request->fetch_assoc();

                    // SESSION
                    $_SESSION['loginState']  = $loginState;
                    $_SESSION['uid']  = $data["user_id"];
                    $_SESSION['user_type']  = $data["user_type"];
                    $_SESSION['email'] = $data["email"];
                    $_SESSION['username'] = $data["username"];
                    $_SESSION['firstname'] = $data["firstname"];
                    $_SESSION['lastname'] = $data["lastname"];

                    setCookie('remember', '', time() + (86400 * 30), '/' );
                    setCookie('email', '', time() + (86400 * 30), '/' );
                    setCookie('password', '', time() + (86400 * 30), '/' );
                } else {
                    echo $database->error;
                }
            }
        }
        // // Email
        // if(empty($email)) {
        //     $errorMsg = '<small class="text-danger">Empty Email</small>';
        // } else if(!preg_match_all($emailRegex, $email) > 0) {
        //     $errorMsg = '<small class="text-danger">Error</small>';
        // }

        // if((empty($email)) || (!preg_match_all($emailRegex, $email) > 0)) {
        //     return;
        // } else {
        //     $request = $database->query("SELECT * FROM `tbl_users` WHERE `email`='$email' AND `pword`='md5($password)'");

        //     if($request) {
        //         $loginState = true;

        //         $data = $request->fetch_assoc();
        //         if(isset($_POST["remember"])) {
        //             // $remember = true;
        //             // $uid = $data["user_id"];
        //             // $resUType = $data["user_type"];
        //             // $resEmail = $data["email"];
        //             // $resUname = $data["username"];
        //             // $resFname = $data["firstname"];
        //             // $resLname = $data["lastname"];

        //             // // SESSION
        //             // $_SESSION['loginState'] = $loginState;
        //             // $_SESSION['user_id'] = $uid;
        //             // $_SESSION['user_type'] = $resUType;
        //             // $_SESSION['email'] = $resEmail;
        //             // $_SESSION['username'] = $resUname;
        //             // $_SESSION['firstname'] = $resFname;
        //             // $_SESSION['lastname'] = $resLname;

        //             // // COOKIES
        //             // setCookie('remember',$remember, time() + (86400 * 30), '/' );
        //             // setCookie('email', $email, time() + (86400 * 30), '/' );
        //             // setCookie('password', $password, time() + (86400 * 30), '/' );

        //             // header('location: /pages/dashboard.php');
        //             print_r($data);
        //         } else {
        //             $uid = $data["user_id"];
        //             $resUType = $data["user_type"];
        //             $resEmail = $data["email"];
        //             $resUname = $data["username"];
        //             $resFname = $data["firstname"];
        //             $resLname = $data["lastname"];

        //             // SESSION
        //             $_SESSION['loginState'] = $loginState;
        //             $_SESSION['user_id'] = $uid;
        //             $_SESSION['user_type'] = $resUType;
        //             $_SESSION['email'] = $resEmail;
        //             $_SESSION['username'] = $resUname;
        //             $_SESSION['firstname'] = $resFname;
        //             $_SESSION['lastname'] = $resLname;

        //             echo $_SESSION['user_id'];

        //             setCookie('remember', '', time() + (86400 * 30), '/' );
        //             setCookie('email', '', time() + (86400 * 30), '/' );
        //             setCookie('password', '', time() + (86400 * 30), '/' );

        //             header('location: /pages/dashboard.php');
        //         }
        //     } else {
        //         echo $database->error;
        //     }
        // }
    }

    if(isset($_POST['logout'])) {
        
        if(isset($_COOKIE["remember"]) == 1) {
            session_unset();
            session_destroy();
            header('location: ./../index.php');
        } else {
            session_unset();
            session_destroy();
            setCookie('remember', '', time() + (86400 * 30), '/' );
            setCookie('email', '', time() + (86400 * 30), '/' );
            setCookie('password', '', time() + (86400 * 30), '/' );
            header('location: ./../index.php');
        }


    }
?>