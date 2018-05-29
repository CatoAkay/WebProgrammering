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
$_SESSION["U1"] = new Utover($_SESSION["fornavn"],$_SESSION["etternavn"],$_SESSION["adresse"],$_SESSION["postnr"],$_SESSION["poststed"],$_SESSION["telef"], $_SESSION["nasjon"], $Ov1);

echo $_SESSION["U1"]->toString();

$h2->insert($_SESSION["U1"], $_SESSION["rolle"]);

?>

<br/>Klikk her for å registrere/bestille for ny person
<a href="registrer.php"><input type="button" size="2" value="Tilbake"></a>

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
