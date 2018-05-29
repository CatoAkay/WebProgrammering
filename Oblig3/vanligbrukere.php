<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<h1>Hei og velkommen kjære publikum!</h1>
<form method="post" action="">
    <input type="submit" name="logut" value="Log ut"> </input>
</form>

<a href="oversiktforpub.php"><button>OVERSIKT</button></a><br/>

<?php

session_start();


if (!$_SESSION["innlogget"]){
    header("location:"."index.php");
    die();
}

if (isset($_POST["logut"])){
    $_SESSION["innlogget"] = false;
    header("location:"."index.php");
    die();
}

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

$h3 = new Hondterer();
$h3->tilkobligTest();
$sql = "SELECT * FROM øvelse;";
$resultat = mysqli_query($h3->getConn(),$sql);


echo ' <table class="spess">
 <tr class="spess">
    <th class="spess">ØvelseID</th>
    <th class="spess">Dato-Tid</th>
    <th class="spess">Type</th>
    <th class="spess">Sted</th>
    <th class="spess">Velg Billett</th>
    <th class="spess"></th>
 </tr>';

while($row = mysqli_fetch_assoc($resultat)) {
    echo '<form method="post" action="">';
    echo '<tr class="spess">';
    foreach ($row as $kolonnenavn => $kolonneverdi) {
        echo "<td class=\"spess\">$kolonneverdi<input size='40' type='hidden' value='". $kolonneverdi." ' name='".$kolonnenavn."' readonly></td>";
    }
    echo '<td class="spess"><select name="ticket">          
                <option> </option>
                <option>Standardbilett</option>
                <option>Silverbilett</option>
                <option>Gullbilett</option>
                <option>Diamondbilett</option>
                <option>Supremebilett</option>
                <option>VIP</option>
                </select></td>';
    $øvelseID = $row["ØvelseID"];
    echo '<td class="spess"><button value="Velg" name="Velg">Velg</button></a></td> ';
    echo '</tr>';
    echo '</form>';
}

echo '</table>';

if (isset($_POST["Velg"])){
    $sql = "SELECT PersonID FROM person where brukernavn = '" . $_SESSION["bruker"] . "';";
    $resultat = mysqli_query($h3->getConn(), $sql);
    $row2 = mysqli_fetch_assoc($resultat);
    $personid = $row2["PersonID"];

    $sql4 = "SELECT øvelse_ØvelseID FROM øvelse_has_person WHERE person_PersonID = '".$personid."';";
    $resultat2 = mysqli_query($h3->getConn(),$sql4);
    $tester = true;
    for ($i = 0; $i <$resultat2->num_rows; $i++){
        $row3 = mysqli_fetch_assoc($resultat2);
        foreach ($row3 as $navn => $ID){
            $ID = trim($ID);
            $vID = trim($_POST["ØvelseID"]);
            if ($ID == $vID){
                $tester = false;
                echo "Du har allerede valgt denne øvelsen!";
            }
        }

    }
    if ($tester) {


        $sql2 = "INSERT INTO publikum (Biletttype, person_PersonID)";
        $sql2 .= "VALUES ('" . $_POST["ticket"] . "'," . $personid . ");";
        mysqli_query($h3->getConn(),$sql2);

        $sql3 = "INSERT INTO øvelse_has_person (øvelse_ØvelseID, person_PersonID)";
        $sql3 .= "VALUES (" . $_POST["ØvelseID"] . "," . $personid . ");";
        mysqli_query($h3->getConn(), $sql3);

        echo "Du er nå registrert på denne øvelsen!";
    }
}


?>


