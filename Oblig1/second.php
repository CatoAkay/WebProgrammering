<!DOCTYPE html>
<!--
Oblig 1 for Cato Hilmi Akay
s326326
-->
<html>
    <head>
    <meta charset="UTF-8">
    <title>Oblig 1</title>
        <link rel="stylesheet" href="oblig1style.css" type="text/css"/>
    </head>
    <body>

    <?php
include('kunde.php');
include('bestilling.php');
session_start();

if (isset($_POST["knapp2"])){
    $myfile = fopen("kinobiletter.txt", "a");
    fwrite($myfile,$_SESSION["bestilling"]->toString2());
    fclose($myfile);
    $minMelding = "Takk for at du bestilte bilett hos oss!\n".$_SESSION["bestilling"]->toString2();
    mail($_SESSION["bestilling"]->getKunde()->getEpost(), "Kinobekreftelse", $minMelding);
    echo "Biletten din er Bestilt!";
    }
    else{
        $kunde = new kunde($_REQUEST["navn"],$_REQUEST["adresse"],$_REQUEST["mobil"],$_REQUEST["epost"]);
        $_SESSION["bestilling"] = new bestilling($_REQUEST["bilett"],$_REQUEST["antall"],date("d.m.Y"),date("h:i:sa"),$kunde);

        echo $_SESSION["bestilling"]->toString();

        echo '<form action="" method="post">';
        echo '<input type="submit" value="Bekreft" name="knapp2"/><br/>';
        echo '</form>';

        echo '<form action="first.php" method="post">';
        echo '<input type="submit" value="Kanselser" name="knapp3"/><br/>';
        echo '</form>';
}



?>


    </body>
</html>
