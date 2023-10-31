<style> 
    table, tr, td {
        outline: auto;
    }
    table {
        float: left;
    }
    table:nth-child(4) {
        float: none;
    }
    img{
        width: 300px;
    }
</style>

<?php
$xml = simplexml_load_file('Moves_list.xml');
echo '<h2>My Favorite Movies</h2>';
$list = $xml->Movie;

$row = 0;
for ($i = 0; $i < count($list); $i++) {
    if($row == 0){
        echo '<table>';
    }
    $row++;
    echo '<tr>';
    echo '<th>' . $list[$i]->Title . '</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><img src="' . $list[$i]->Picture . '"</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Main Actor: ' . $list[$i]->MainActor . '<br/><a href="' . $list[$i]->Link . '">Link Here</a><br/>Year: ' . $list[$i]->Year . '<br/>Genre: ' . $list[$i]->Genre . '<br/></td>';
    echo '</tr>';
    if($row == 3){
        echo '</table>';
        $row = 0;
    }
}

?>
