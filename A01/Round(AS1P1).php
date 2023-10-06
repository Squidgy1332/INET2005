<form method="post">
    <input type="text" id="Number" name="Number" placeholder="Decimal Number"><br>
    <button type="submit" name="Button">Submit</button>
</form>
<?php 
    if (isset($_POST['Button'])){
        $Num = $_POST['Number'];
        if(is_numeric($Num)){
            DoMath($Num);
        }else{
            echo "ERROR: User must inter a number not string($Num)";
        }
    }
    function DoMath($Num){
        $NumCeil = ceil($Num);
        $NumFloor = floor($Num);
        $NumRound = round($Num);
        DisplayNums($NumCeil, $NumFloor, $NumRound, $Num);
    }
    function DisplayNums($NumCeil, $NumFloor, $NumRound, $Num){ 
        echo "Number = $Num"; 
        echo "<br />";
        echo "Number Ceil = $NumCeil";
        echo "<br />";
        echo "Number Floor = $NumFloor";
        echo "<br />";
        echo "Number Round = $NumRound";
    } 
?>