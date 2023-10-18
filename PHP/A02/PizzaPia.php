<!--Bacone is better than pineapple-->
<p>select pizza size and toppinds</p>
<form method="post">
    <select name="Size" id="Size">
        <option value="extra-large">extra-large</option>
        <option value="large">large</option>
        <option value="medium">medium</option>
        <option value="small">small</option>
    </select></br>

    <input type="checkbox" id="pepperoni" name="pepperoni" value="pepperoni">
    <label for="pepperoni"> pepperoni</label><br>

    <input type="checkbox" id="cheese" name="cheese" value="cheese">
    <label for="cheese"> cheese</label><br>

    <input type="checkbox" id="olive" name="olive" value="olive">
    <label for="olive"> olive</label><br>

    <input type="checkbox" id="Bacone" name="Bacone" value="Bacone">
    <label for="Bacone"> Bacone</label><br>

    <input type="checkbox" id="ham" name="ham" value="ham">
    <label for="ham"> ham</label><br>

    <button type="submit" name="Button">Order</button>
</form>
<?php
    $PriceTotal = 0;
    $TopingList = [];
    if (isset($_POST['Button'])){
        $Size = filter_input(INPUT_POST, 'Size', FILTER_SANITIZE_STRING);

        if (isset($_POST['pepperoni'])) {
            $PriceTotal += 1;
            $TopingList[] = 'pepperoni';
        }
        if(isset($_POST['cheese'])){
            $TopingList[] = 'cheese';
        }
        if(isset($_POST['olive'])){
            $PriceTotal += 1;
            $TopingList[] = 'olive';
        }
        if(isset($_POST['Bacone'])){
            $PriceTotal += 1;
            $TopingList[] = 'Bacone';
        }
        if(isset($_POST['ham'])){
            $PriceTotal += 1;
            $TopingList[] = 'ham';
        }

        switch($Size){
            case "extra-large":
                $PriceTotal += 17.50;
                $SizePrice = 17.50;
                break;
            case "large":
                $PriceTotal += 15;
                $SizePrice = 15;
                break;
            case "medium":
                $PriceTotal += 12.50;
                $SizePrice = 12.50;
                break;
            case "small":
                $PriceTotal += 9;
                $SizePrice = 9;
                break;
        } ?>

    <table>
        <tr>
            <th>Size</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><?php echo $Size; ?></td>
            <td><?php echo "$$SizePrice"; ?></td>
        </tr>
        <tr>
            <th>Toppings</th>
        </tr>
        <?php foreach($TopingList as $Topping){
            ?><tr>
                <td><?php echo $Topping; ?></td>
                <?php 
                    if($Topping == 'cheese'){
                        echo '<td>Free</td>';
                    }else{
                        echo '<td>$1</td>';
                    }?>
            </tr><?php
        }
        ?>
        <tr>
            <th>Total</th>
            <th><?php echo "$$PriceTotal";?></th>
        </tr>
    </table>
    <?php }
?>
<style>
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