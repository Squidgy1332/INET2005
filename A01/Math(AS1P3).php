<form method="post">
    <input type="text" id="Number1" name="Number1" placeholder="Number 1"><br>
    <input type="text" id="Number2" name="Number2" placeholder="Number 2"><br>
    <button type="submit" name="Button">Submit</button>
</form>
<?php 
    if (isset($_POST['Button'])){
        $Num1 = $_POST['Number1'];
        $Num2 = $_POST['Number2'];
        if(is_numeric($Num1) && is_numeric($Num2) && $Num1 != 0 && $Num2 != 0){

            $AddNum = addThem($Num1, $Num2); 
            $SubNum = subtractThem($Num1, $Num2);
            $MultiNum = multiplyThem($Num1, $Num2); 
            $DivNum = divideThem($Num1, $Num2);
            
            echo "Numbers used are $Num1 and $Num2";
            echo "<br />";
            echo "$Num1 plus $Num2 is $AddNum";
            echo "<br />";
            echo "$Num1 minus $Num2 is $SubNum";
            echo "<br />";
            echo "$Num1 times $Num2 is $MultiNum";
            echo "<br />";
            echo "$Num1 divided by $Num2 is $DivNum";
            
        }else{
            echo "ERROR: User entered no value or invalid number";
        }
    }
    function addThem($Num1, $Num2){
        $Total = $Num1 + $Num2;
        return $Total;
    }
    function subtractThem($Num1, $Num2){
        $Total = $Num1 - $Num2;
        return $Total;
    }
    function multiplyThem($Num1, $Num2){
        $Total = $Num1 * $Num2;
        return $Total;
    }
    function divideThem($Num1, $Num2){
        $Total = $Num1 / $Num2;
        return $Total;
    }
?>