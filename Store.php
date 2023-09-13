<?php
/*********
 * Auther: Liam Morton
 * Date: 2023-09-08
 * about: Make table with loop and arrays
 */
echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Garf Store</title>
    </head>
    <body>';
        echo '<h1> Commic Store </h1>';
        $price = array('$1.00', '$2.00', '$3.00');
        $Name = array('Pannel 1', 'Pannel 2', 'Pannel 3');
        $image = array('Pannel1', 'Pannel2', 'Pannel3');
        echo '<table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
            </tr>';
            $i = 0;
            while($i < 3){
                echo "<tr>
                        <td> $Name[$i] </td>
                        <td> $price[$i] </td>
                        <td>"; echo '<img src="Image/' . $image[$i] . '.jpg" width="100" hight="50"/>';
                echo "</td> </tr>";
                $i++;
            }
        echo '</table>';
echo '</body>
    </html>';
?>