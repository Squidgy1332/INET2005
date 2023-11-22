<?php
    $User = $_POST["user"];
    $Pass = $_POST["Pass"];

    include "Connect/DBConnect.php";
    $conn = ConnectDB();
    $sqlDupCheck = "SELECT * FROM `user` WHERE `username` LIKE '$User'";
    $result = $conn -> query($sqlDupCheck);
    if (mysqli_num_rows($result) > 0) {
        header("Location: MakeUser.php?message=That user is already in database");
    } else {
        $sqlAdd = "INSERT INTO `user` (`user_id`,`username`,`password`) VALUES (NULL, '$User','$Pass');";
        $conn -> query($sqlAdd);
        header("Location: MakeUser.php?message=User was added to database");
    }
?>