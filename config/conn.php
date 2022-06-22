<?php
    require("core.php");

    $database = new mysqli($serverName, $userName, $password, $dbName);

    if($database->connect_error) {
        die("Connection Failed " . $database->connect_error);
    }

?>