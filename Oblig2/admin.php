<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 05.03.2018
 * Time: 14:14
 */

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

$h3 = new Hondterer();
$h3->tilkobligTest();
$sql = "SELECT * FROM øvelse;";
$resultat = mysqli_query($h3->getConn(),$sql);

echo ' <table>
 <tr>
    <th>ØvelseID</th>
    <th>Dato-Tid</th>
    <th>Type</th>
    <th>Sted</th>
    <th></th>
 </tr>';

while($row = mysqli_fetch_assoc($resultat)) {
    echo '<tr>';
    foreach ($row as $kolonnenavn => $kolonneverdi) {
        echo "<td>$kolonnenavn: $kolonneverdi</td>";
    }
    echo '<td><a href="redigerOvelse.php?id='.$row["ØvelseID"].'"><button value="Rediger" name="Rediger">Rediger</button></a></td> ';
    echo '</tr>';
}

echo '</table>';


?>

<br/><a href="index.php"><button name="Hjem" value="Hjem">Hjem</button></a>
