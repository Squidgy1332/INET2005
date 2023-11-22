<?php
    include("Connect/DBCon.php");
    $conn = ConnectDB();
    $sql = "SELECT `Last_Name` FROM `user_data`";
    $TableResults = $conn -> query($sql);

    $last_name_array = [];
    while ($rows = mysqli_fetch_array($TableResults)) {
        array_push($last_name_array, $rows["Last_Name"]);
    }

    natcasesort($last_name_array);
    foreach($last_name_array as $LastName){
        echo"".$LastName."<br />";
    }
?>