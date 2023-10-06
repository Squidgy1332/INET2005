<form method="post">
    <input type="date" id="date" name="date" placeholder="The Date"><br>
    <button type="submit" name="Button">Submit</button>
</form>
<?php 
    if (isset($_POST['Button'])){
        $Date = $_POST['date'];
        if($Date == null){
            echo "ERROR: User entered no value";
        }else{
            FindDays($Date);
        }
    }
    function FindDays($Date){
        $Date = new DateTime($Date);
        $OldDate = new DateTime('2016-06-30');

        $Days = $Date->diff($OldDate);

        $Date = $Date->format('Y-m-d');
        $OldDate = $OldDate->format('Y-m-d');

        echo "Days between $Date and $OldDate are: $Days->days Days"; 
    }
?>