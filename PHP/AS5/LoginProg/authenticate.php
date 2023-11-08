<?php
    $User = $_POST["user"];
    $Pass = $_POST["Pass"];
    
    include "Connect/DBConnect.php";
    session_start();
    $conn = ConnectDB();
    $sqlCheck = "SELECT * FROM `user` WHERE `username` LIKE '$User' AND `password` LIKE '$Pass'";
    $result = $conn -> query($sqlCheck);
    if (mysqli_num_rows($result) == 0) {
        header("Location: Login.php?message=That user is not in database");
    } else {
        $User_id = GetUserID($conn, $User);
        $session_ID = session_id();
        $Time = FindLoginTime();

        makeSession($conn, $User_id, $session_ID, $Time);
        header("Location: Admin.php?User_id=$User_id&session_id=$session_ID");
    }

    function GetUserID($conn, $User){
        $sql = "SELECT `user_id` FROM `user` WHERE `username` LIKE '$User'";
        $ID = mysqli_fetch_array($conn -> query($sql));
        return $ID["user_id"];
    }

    function FindLoginTime(){
        return intval(date("Ymdhis"));
    }

    function makeSession($conn, $User_id, $session_ID, $Time){
        $sqlAdd = "INSERT INTO `login_sessions` (`login_id`, `user_id`, `session_id`,`last_access_time`) VALUES (NULL, '$User_id','$session_ID', '$Time');";
        $conn -> query($sqlAdd);
    }
?>
