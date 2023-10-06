<?php
/**********************
 * Auther: Liam Morton
 * Date: 2023-09-08
 * About: Form that gets name address and date
 */
echo '<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Name Form</title>
        </head>
        <body>
            <form method="post">
                <input type="text" id="name" name="name" placeholder="Your name"><br>
                <input type="text" id="address" name="address" placeholder="Your address"><br>
                <input type="date" id="address" name="date" placeholder="The Date"><br>
                <button type="submit" name="Button">Submit</button>
            </form>';
if (isset($_POST['Button'])) {
    $Name = $_POST['name'];
    $Address = $_POST['address'];
    $Date = $_POST['date'];
    if ($Name == null || $Address == null || $Date == null) {
        echo "You are missing some infomation";
    } else {
        echo "Name is: $Name" . "<br />";
        echo "Address is: $Address" . "<br />";
        echo "Date is: $Date";
    }
}
echo    '</body>
    </html>';
?>