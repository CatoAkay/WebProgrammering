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
 * Time: 14:57
 */

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');


if (!isset($_GET["id"])){
    echo "Ingen Øvelse definert";
    die();
}

$db = new Hondterer();
$db->tilkobligTest();

$sql = "SELECT * FROM øvelse WHERE ØvelseID = ".$_GET["id"].";";
$resultat = mysqli_query($db->getConn(), $sql);

if (mysqli_affected_rows($db->getConn()) != 1){
    echo "Ingen øvelse funnet";
    die();
}

$row = mysqli_fetch_assoc($resultat);

if (isset($_POST["Ferdig"])) {
    $sql2 = "UPDATE øvelse SET `Dato-Tid` = '" . $_POST["Dato"] . "', Type = '" . $_POST["Type"] . "', Sted = '" . $_POST["Sted"] . "' WHERE ØvelseID = " . $_POST["ØvelseID"] . ";";
    $resultat2 = mysqli_query($db->getConn(), $sql2);
    if (mysqli_affected_rows($db->getConn()) != 1) {
        echo "Feil ved lagring i database";
        echo $sql2;
        die();
    } else {
        echo "Databasen er blitt oppdatert!";
    }
}
if (isset($_POST["Slett"])){
        $sql3 = "DELETE FROM øvelse_has_person WHERE øvelse_ØvelseID = ".$_POST["ØvelseID"].";";
        $sql4 = "DELETE FROM øvelse WHERE ØvelseID = ".$_POST["ØvelseID"].";";
        mysqli_query($db->getConn(), $sql3);
        mysqli_query($db->getConn(), $sql4);
        if (mysqli_affected_rows($db->getConn()) != 1){
        echo "Feil ved lagring i database";
        echo $sql3;
        die();
    }else{
        echo "Databasen er blitt oppdatert!";
    }

    }




?>

<form action="" method="post">
    ØvelseID:<br/>
    <input type="text" value="<?php echo $row["ØvelseID"];?>" name="ØvelseID" readonly><br/>
    Dato-Tid:<br/>
    <input type="text" value="<?php echo $row["Dato-Tid"];?>" name="Dato"><br/>
    Øvelse:<br/>
    <input type="text" value="<?php echo $row["Type"];?>" name="Type"><br/>
    Sted:<br/>
    <input type="text" value="<?php echo $row["Sted"];?>" name="Sted"><br/>
    <br/><input type="submit" value="Ferdig" name="Ferdig">
    <br/><input type="submit" value="Slett Øvelse" name="Slett">

</form>
<a href="admin.php"><button value="Tilbake" name="Tilbake">Tilbake</button></a>