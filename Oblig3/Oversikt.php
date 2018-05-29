<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<h1>Velkommen til Oversikten over alle Utøvere og Publikum</h1>



<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 05.03.2018
 * Time: 16:26
 */

session_start();
include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

$h4 = new Hondterer();
$h4->tilkobligTest();
$sql = "SELECT * FROM person, publikum, øvelse_has_person, øvelse WHERE person.PersonID = publikum.person_PersonID AND person.PersonID = øvelse_has_person.person_PersonID AND øvelse_has_person.øvelse_ØvelseID = øvelse.ØvelseID;";
$resultat = mysqli_query($h4->getConn(),$sql);
echo '<h2>Publikum</h2>';
echo ' <table>
 <tr>
    <th>PersonID</th>
    <th>Fornavn</th>
    <th>Etternavn</th>
    <th>Adresse</th>
    <th>Postnr</th>
    <th>Poststed</th>
    <th>Telefonnr</th>
    <th>Billett</th>
    <th>ØvelseID</th>
    <th>Dato</th>
    <th>Type</th>
    <th>Sted</th>
 </tr>';

while($row = mysqli_fetch_assoc($resultat)) {
    echo '<tr>';
    echo '<td>'.$row["PersonID"].'</td>';
    echo '<td>'.$row["Fornavn"].'</td>';
    echo '<td>'.$row["Etternavn"].'</td>';
    echo '<td>'.$row["Adresse"].'</td>';
    echo '<td>'.$row["Postnr"].'</td>';
    echo '<td>'.$row["Poststed"].'</td>';
    echo '<td>'.$row["Telefonnr"].'</td>';
    echo '<td>'.$row["Biletttype"].'</td>';
    echo '<td>'.$row["ØvelseID"].'</td>';
    echo '<td>'.$row["Dato-Tid"].'</td>';
    echo '<td>'.$row["Type"].'</td>';
    echo '<td>'.$row["Sted"].'</td>';
    echo '</tr>';
}
echo '</table>';

echo '<h2>Alle utøvere</h2>';

$sql2 = "SELECT * FROM person, utøver, øvelse_has_person, øvelse WHERE person.PersonID = utøver.person_PersonID AND person.PersonID = øvelse_has_person.person_PersonID AND øvelse_has_person.øvelse_ØvelseID = øvelse.ØvelseID;";
$resultat = mysqli_query($h4->getConn(),$sql2);

echo ' <table>
 <tr>
    <th>PersonID</th>
    <th>Fornavn</th>
    <th>Etternavn</th>
    <th>Adresse</th>
    <th>Postnr</th>
    <th>Poststed</th>
    <th>Telefonnr</th>
    <th>Nasjonalitet</th>
    <th>ØvelseID</th>
    <th>Dato</th>
    <th>Type</th>
    <th>Sted</th>
 </tr>';

while($row = mysqli_fetch_assoc($resultat)) {
    echo '<tr>';
    echo '<td>'.$row["PersonID"].'</td>';
    echo '<td>'.$row["Fornavn"].'</td>';
    echo '<td>'.$row["Etternavn"].'</td>';
    echo '<td>'.$row["Adresse"].'</td>';
    echo '<td>'.$row["Postnr"].'</td>';
    echo '<td>'.$row["Poststed"].'</td>';
    echo '<td>'.$row["Telefonnr"].'</td>';
    echo '<td>'.$row["Nasjonalitet"].'</td>';
    echo '<td>'.$row["ØvelseID"].'</td>';
    echo '<td>'.$row["Dato-Tid"].'</td>';
    echo '<td>'.$row["Type"].'</td>';
    echo '<td>'.$row["Sted"].'</td>';

    echo '</tr>';
}

echo '</table>';


?>

<a href="registrer.php"><button value="Hjem2" name="Hjem2">Hjem</button></a>

<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 12:55
 */

if ($_SESSION["innlogget"] == true){
    echo "Du er logget inn!";
}



?>
<form method="post" action="">
    <input type="submit" name="logut" value="Log ut"> </input>
</form>

<?php

if (!$_SESSION["innlogget"]){
    header("location:"."index.php");
    die();
}

if (isset($_POST["logut"])){
    $_SESSION["innlogget"] = false;
    header("location:"."index.php");
    die();
}

?>
