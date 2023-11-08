<?php
function ConnectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "unit_7";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
?>