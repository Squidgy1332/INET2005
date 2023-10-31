<?php
  $servername = "db";
  $username = "root";
  $password = "super_secret123?";
  $dbname = "Schedule";
        
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);
  $sql  = "SELECT * FROM Program";
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if($results = $conn->query($sql)){
    while($data = $results->fetch_object()){
      $programs[] = $data;
    }
  }
?>