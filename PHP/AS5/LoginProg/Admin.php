<?php
    include "Connect/DBConnect.php";
    $conn = ConnectDB();

    $User_id = $_GET["User_id"];
    $Session_id = $_GET["session_id"];

    $sql = "SELECT * FROM `login_sessions` WHERE `user_id` LIKE '$User_id' AND `session_id` LIKE '$Session_id'";
    if (mysqli_num_rows($conn -> query($sql)) > 0) {
        $last_login = intval(date("Ymdhis"));
        $sqlUpdate = "UPDATE `login_sessions` SET `last_access_time`= '$last_login' WHERE `user_id` LIKE '$User_id' AND `session_id` LIKE '$Session_id'";
        $conn -> query($sqlUpdate);
        echo "hello user";
    }else{
        header("Location: Login.php?message=Session dose not exist");
    }
?>