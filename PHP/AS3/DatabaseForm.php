<style>
    label{
        display: none;
        color: red;
    }

    #news{
        display: block;
        color: black;
    }

    select,input{
        float: left;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #dddddd;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<form method="post">
    <p> fill out the following form </p>
    <p> select a title </p>
    <select name="Title" id="Title">
        <option value=""></option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Ms">Ms</option>
        <option value="Dr">Dr</option>
    </select><label id="TitleError">Error: input cant be null</label></br></br>

    
    <input type="text" id="FirstName" name="FirstName" placeholder="First Name">
    <label id="FirstNameError">Error: input cant be null</label></br></br>
    
    <input type="text" id="LastName" name="LastName" placeholder="Last Name">
    <label id="LastNameError">Error: input cant be null</label></br></br>

    <input type="text" id="Street" name="Street" placeholder="Street">
    <label id="StreetError">Error: input cant be null</label></br></br>

    <input type="text" id="City" name="City" placeholder="City">
    <label id="CityError">Error: input cant be null</label></br></br>

    <input type="text" id="Province" name="Province" placeholder="Province">
    <label id="ProvinceError">Error: input cant be null</label></br></br>

    <input type="text" id="PostalCode" name="PostalCode" placeholder="Postal Code">
    <label id="PostalError">Error: input cant be null</label></br>

    <p>select a Country</p>
    
    <select name="Country" id="Country">
        <option value=""></option>
        <option value="Canada">Canada</option>
        <option value="USA">USA</option>
    </select><label id="CountryError">Error: input cant be null</label></br></br>

    <input type="text" id="Phone" name="Phone" placeholder="Phone">
    <label id="PhoneError">Error: input cant be null</label></br></br>

    <input type="text" id="Email" name="Email" placeholder="Email">
    <label id="EmailError">Error: input cant be null</label></br></br>

    <input type="checkbox" id="Newsletter" name="Newsletter" value="newsletter">
    <label id="news" for="newsletter"> newsletter</label></br>

    <button type="submit" name="Button">Submit</button>
</form>
<?php
    include("Connect/DBCon.php");
    if (isset($_POST['Button'])){

        $Title = $_POST['Title'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Street = $_POST['Street'];
        $City = $_POST['City'];
        $Province = $_POST['Province'];
        $PostalCode = $_POST['PostalCode'];
        $Country = $_POST['Country'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        
        if($Title == null){
            ?><script> document.getElementById("TitleError").style.display = "block"; </script><?php
        }if($FirstName == null){
            ?><script> document.getElementById("FirstNameError").style.display = "block"; </script><?php
        }if($LastName == null){
            ?><script> document.getElementById("LastNameError").style.display = "block"; </script><?php
        }if($Street == null){
            ?><script> document.getElementById("StreetError").style.display = "block"; </script><?php
        }if($City == null){
            ?><script> document.getElementById("CityError").style.display = "block"; </script><?php
        }if($Province == null){
            ?><script> document.getElementById("ProvinceError").style.display = "block"; </script><?php
        }if($PostalCode == null){
            ?><script> document.getElementById("PostalError").style.display = "block"; </script><?php
        }if($Country == null){
            ?><script> document.getElementById("CountryError").style.display = "block"; </script><?php
        }if($Phone == null){
            ?><script> document.getElementById("PhoneError").style.display = "block"; </script><?php
        }if($Email == null){
            ?><script> document.getElementById("EmailError").style.display = "block"; </script><?php
        }else{
            UploadData($Title,$FirstName,$LastName,$Street,$City,$Province,$PostalCode,$Country,$Phone,$Email);
        }
    }
    function UploadData($Title,$FirstName,$LastName,$Street,$City,$Province,$PostalCode,$Country,$Phone,$Email){

        $conn = ConnectDB();

        if (isset($_POST["Newsletter"])){
            $NewsLetter = "Yes";
        }else{
            $NewsLetter = "No";
        }

        $sql = "INSERT INTO `user_data` (`User_ID`,`Title`,`Street`,`Province`,`Postal_Code`,`Phone`,`Newsletter`,`Last_Name`,`First_Name`,`Email`,`Country`,`City`) VALUES (NULL, '$Title','$Street','$Province','$PostalCode','$Phone','$NewsLetter','$LastName','$FirstName','$Email','$Country','$City');";
        $conn -> query($sql);
        DisplayData($conn);
    }
    function DisplayData($conn){
        $sql = "SELECT * FROM `user_data`";
        $TableResults = $conn -> query($sql);?>
        <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>City</th>
            <th>Province</th>
            <th>Country</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Newsletter</th>
        </tr><?php
        while ($rows = mysqli_fetch_array($TableResults)) {
            echo "<tr>
            <td>" . $rows['User_ID'] . "</td>" .
            "<td>" . $rows['Title'] . "</td>" .
            "<td>" . $rows['First_Name'] . "</td>" .
            "<td>" . $rows['Last_Name'] . "</td>" .
            "<td>" . $rows['Street'] . "</td>" .
            "<td>" . $rows['City'] . "</td>" .
            "<td>" . $rows['Province'] . "</td>" .
            "<td>" . $rows['Country'] . "</td>" .
            "<td>" . $rows['Postal_Code'] . "</td>" .
            "<td>" . $rows['Phone'] . "</td>" .
            "<td>" . $rows['Email'] . "</td>" .
            "<td>" . $rows['Newsletter'] . "</td>
            </tr>";
        }?>
        </table><?php
    }
    ?>