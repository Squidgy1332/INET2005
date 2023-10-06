<?php
    $AGENT_DATA = $_SERVER['HTTP_USER_AGENT'];
    echo $AGENT_DATA . "<br />";
    if (str_contains($AGENT_DATA, 'OPR')){
        echo "Good U R Opera CHAD";
    }else{
        echo "No Opera SAD";
    }
    foreach ($_SERVER as $Key => $Val){
        echo "<p><span style='Color: blue'> $Key </span> $Val </p>";
    }
?>