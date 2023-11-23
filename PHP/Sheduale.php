<?php
$db_host = "db";
$db_user = "root";
$db_password = "super_secret123?";
$db_name = "NSCCSchedule";
function getColumnNames($conn, $tableName) {
    $colNames = array();

    $sql = 'SHOW COLUMNS FROM '.$tableName;
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $colNames[]=$data->Field;
        }
    }
    return $colNames;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h3>Enter Program</h3>
        <label for="programCode">Code</label>
        <input type="text" name="programCode" id="program-code">
        <label for="programTitle">Title</label>
        <input type="text" name="programTitle" id="program-title">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO Program (Code, Title) VALUES (?, ?)");
        $stmt->bind_param("ss", $code, $program);

        // set parameters and execute
        $code = $_POST["programCode"];
        $program = $_POST["programTitle"];
        $stmt->execute();      
        $conn->close();
        
    }


    $programs = array();
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    $cols = getColumnNames($conn,"Program");

    $sql = 'SELECT * FROM NSCCSchedule.Program'; //TODO make better Query then run and display output
    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            array_push($programs,$data);
        }
        $conn->close();
    }

    // cols: ProgramId, Code, Title
    $col1 = 'ProgramId';
    $col2 = 'Code';
    $col3 = "Title";
    echo "<table border='1'><tr><th>".$cols[0]."</th><th>".$cols[1]."</th><th>".$cols[2]."</th></tr>";
    foreach ($programs as $c) {
        echo "<tr><td>$c->ProgramId</td><td>$c->Code</td><td>".$c->Title."</td><td><button type='submit' id='edit' name='Button'>edit</button></td></tr>";
    }

    ?>
    <script>
        const progCode = document.getElementById("program-code");
        progCode.addEventListener("focusout", function(evt) {
            // console.log("Key was pressed: ",evt.target.value);
            evt.target.value = evt.target.value.toUpperCase();
            checkCode(evt.target.value);
        });

        function checkCode(val) {
            if (/[A-Z]{4}/.test(val)) {
                console.log("Looks good!");
                progCode.classList.remove("is-invalid");
            } else {
                console.log("Wrong length!");
                progCode.classList.add("is-invalid");
            }
        }
    </script>
        
    </script>

</body>