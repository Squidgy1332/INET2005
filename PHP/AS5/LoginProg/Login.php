<form method="post" action="authenticate.php">
    <input type="text" id="User" name="user" placeholder="Username"><br>
    <input type="text" id="Pass" name="Pass" placeholder="Password"><br>
    <button type="submit" name="Button">Login</button>
</form>
<?php
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo $message;
}
?>