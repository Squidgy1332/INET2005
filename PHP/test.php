<?php
    if(isset($_POST['Goober'])){
        echo '<style>#Goobers{visibility: visible !important;}</style>';
        Goober();
    }elseif(isset($_POST['Goober2'])){
        Goober2();
    }
    function Goober2(){
        echo "HA HA Still Goober";
    }
    function Goober(){
        echo "Hello Goober";
    }
?>
<form method="post">   
    <button type="submit" name="Goober">Click Me!</button>
    <button style="visibility: hidden" id="Goobers" type="submit" name="Goober2">Dont Click Me!</button>
</form>