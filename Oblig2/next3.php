<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<h1>Takk for at du registrerte deg hos oss! </h1><br/>
<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 22:55
 */

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

session_start();

$_SESSION ["gren"] = $_POST["gren"];
$_SESSION ["nasjon"] = $_POST["nasjon"];

$h2 = new Hondterer();
$h2->tilkobligTest();
$sql = "SELECT Sted FROM øvelse WHERE Type = '".$_SESSION["gren"]."';";
$resultat = mysqli_query($h2->getConn(),$sql);
$row = mysqli_fetch_assoc($resultat);
$_SESSION["land"] = $row["Sted"];

$Ov1 = new Ovelse(date("d.m.Y"),date("h:i:sa"),$_SESSION["gren"],$_SESSION["land"]);
$_SESSION["U1"] = new Utover($_SESSION["fornavn"],$_SESSION["etternavn"],$_SESSION["adresse"],$_SESSION["postnr"],$_SESSION["poststed"],$_SESSION["telef"], $Ov1, $_SESSION["nasjon"]);

echo $_SESSION["U1"]->toString();

$h2->insert($_SESSION["U1"], $_SESSION["rolle"]);

?>

<br/>Klikk her for å registrere/bestille for ny person
<a href="index.php"><input type="button" size="2" value="Tilbake"></a>
