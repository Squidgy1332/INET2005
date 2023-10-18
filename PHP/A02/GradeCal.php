<p>Enter a grade value from 0-100 or from A-F</p>
<form method="post">
    <input type="text" id="Grade" name="Grade" placeholder="Enter a grade"><br>
    <button type="submit" name="Button">Submit</button>
</form>
<?php
    if (isset($_POST['Button'])){
        $Grade = $_POST['Grade'];
        if(is_numeric($Grade) && $Grade > 0){
            FindLetterGrade($Grade);
        }else if(strtoupper($Grade) == "F" || strtoupper($Grade) == "C" || strtoupper($Grade) == "B" || strtoupper($Grade) == "A"){
            FindNemericGrade(strtoupper($Grade));
        }else{
            echo "ERROR: User entered no value or invalid number or letter";
        }
    }

    function FindLetterGrade($Grade){
        if($Grade < 59.99){
            echo "You got a F";
        }else if($Grade < 74.99){
            echo "You got a C";
        }else if($Grade < 84.99){
            echo "You got a B";
        }else{
            echo "You got a A";
        }
    }

    function FindNemericGrade($Grade){
        switch($Grade){
            case "F":
                echo "You got a grade from 0-59.99";
                break;
            case "C":
                echo "You got a grade from 60-74.99";
                break;
            case "B":
                echo "You got a grade from 75-84.99";
                break;
            case "A":
                echo "You got a grade from 85-100";
                break;
        }
    }
?>