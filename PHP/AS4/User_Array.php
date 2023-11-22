<?php
    include("Connect/DBCon.php");
    $conn = ConnectDB();
    $sql = "SELECT `User_ID`, `First_Name`, `Last_Name` FROM `user_data`";
    $TableResults = $conn -> query($sql);

    $all_users = []; 
    while ($rows = mysqli_fetch_array($TableResults)) {
        $User_array = []; 
        array_push($User_array, $rows["User_ID"], $rows["First_Name"], $rows["Last_Name"]);
        array_push($all_users, $User_array);
        unset($User_array);
    }

    foreach ( $all_users as $User) {
        foreach ( $User as $key => $value ) {
          echo "$value";
          echo "<br>";
        }
        echo "<br>";
    }
?>