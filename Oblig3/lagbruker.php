<h1>Velkommen til siden hvor du kan registrere din bruker</h1>
<h2>Vennligst oppgi ønsket informasjon</h2>

<script type="text/javascript">

    function valider_brukernavn() {
        regEx = /^[a-zæøåA-ZÆØÅ.\-]{6,20}$/;
        OK = regEx.test(document.skjema.brukernavn.value);
        if (!OK){
            document.getElementById("feil").innerHTML = "Vennligst oppgi et gyldig brukernavn, mellom 6 og 20 bokstaver!";
            return false;

        }else{
            document.getElementById("feil").innerHTML = " ";
            return true;
        }
        
    }

    function valider_passord() {
        regEx = /^[a-zæøåA-ZÆØÅ.\-]{6,20}$/;
        OK = regEx.test(document.skjema.passord.value);
        if (!OK){
            document.getElementById("feil2").innerHTML = "Vennligst oppgi et gyldig passord, mellom 6 og 20 bokstaver!";
            return false;

        }else{
            document.getElementById("feil2").innerHTML = " ";
            return true;
        }

    }

    function valider_fornavn() {
        regEx = /^[a-zæøåA-ZÆØÅ.\-]{2,20}$/;
        OK = regEx.test(document.skjema.fornavn.value);
        if (!OK){
            document.getElementById("feil3").innerHTML = "Vennligst oppgi et gyldig fornavn, mellom 2 og 20 bokstaver!";
            return false;

        }else{
            document.getElementById("feil3").innerHTML = " ";
            return true;
        }

    }

    function valider_etternavn() {
        regEx = /^[a-zæøåA-ZÆØÅ.\-]{2,20}$/;
        OK = regEx.test(document.skjema.etternavn.value);
        if (!OK){
            document.getElementById("feil4").innerHTML = "Vennligst oppgi et gyldig etternavn, mellom 2 og 20 bokstaver!";
            return false;

        }else{
            document.getElementById("feil4").innerHTML = " ";
            return true;
        }

    }

    function valider_adresse() {
        regEx = /^[0-9a-zæøåA-ZÆØÅ.\-]{6,100}$/;
        OK = regEx.test(document.skjema.adresse.value);
        if (!OK){
            document.getElementById("feil5").innerHTML = "Vennligst oppgi en gyldig adresse, mellom 6 og 100 bokstaver eller tall!";
            return false;

        }else{
            document.getElementById("feil5").innerHTML = " ";
            return true;
        }

    }

    function valider_postnummer() {
        regEx = /^[0-9]{4}$/;
        OK = regEx.test(document.skjema.postnr.value);
        if (!OK){
            document.getElementById("feil6").innerHTML = "Vennligst oppgi et gyldig postnummer, 4 siffer mellom 0 og 9!";
            return false;

        }else{
            document.getElementById("feil6").innerHTML = " ";
            return true;
        }

    }

    function valider_poststed() {
        regEx = /^[a-zæøåA-ZÆØÅ.\-]{3,50}$/;
        OK = regEx.test(document.skjema.poststed.value);
        if (!OK){
            document.getElementById("feil7").innerHTML = "Vennligst oppgi et gyldig possted, mellom 3 og 50 bokstaver, eller tall!";
            return false;

        }else{
            document.getElementById("feil7").innerHTML = " ";
            return true;
        }

    }

    function valider_tlf() {
        regEx = /^[0-9]{8}$/;
        OK = regEx.test(document.skjema.telef.value);
        if (!OK){
            document.getElementById("feil8").innerHTML = "Vennligst oppgi et gyldig telefonnummer, 8 siffer mellom 0 og 9!";
            return false;

        }else{
            document.getElementById("feil8").innerHTML = " ";
            return true;
        }

    }



</script>

<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 21.03.2018
 * Time: 16:55
 */

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

if (isset($_POST["reggen"])) {

    $godkjent = true;

    if (!$_POST["brukernavn"] || !$_POST["passord"] || !$_POST["fornavn"] || !$_POST["etternavn"] ||
        !$_POST["adresse"]|| !$_POST["postnr"] || !$_POST["poststed"] || !$_POST["telef"]) {

        $godkjent = false;
        echo "<br/>Vennligt oppgi informasjon i alle feltene!<br/>";
    }

    if (!preg_match("/^[a-zæøåA-ZÆØÅ.\-]{6,20}$/", $_POST["brukernavn"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig brukernavn, mellom 6 og 20 bokstaver!<br/>";
    }

    if (!preg_match("/^[a-zæøåA-ZÆØÅ.\-]{6,20}$/", $_POST["passord"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig passord, mellom 6 og 20 bokstaver!<br/>";
    }

    if (!preg_match("/^[a-zæøåA-ZÆØÅ.\-]{2,20}$/", $_POST["fornavn"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig fornavn, mellom 2 og 20 bokstaver!<br/>";
    }

    if (!preg_match("/^[a-zæøåA-ZÆØÅ.\-]{2,20}$/", $_POST["etternavn"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig etternavn, mellom 2 og 20 bokstaver!<br/>";
    }

    if (!preg_match("/^[0-9a-zæøåA-ZÆØÅ.\-]{6,100}$/", $_POST["adresse"])){
        $godkjent = false;
        echo "Vennligst oppgi en gyldig adresse, mellom 6 og 100 bokstaver eller tall!<br/>";
    }

    if (!preg_match("/^[0-9]{4}$/", $_POST["postnr"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig postnummer, 4 siffer mellom 0 og 9!<br/>";
    }

    if (!preg_match("/^[a-zæøåA-ZÆØÅ.\-]{3,50}$/", $_POST["poststed"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig possted, mellom 3 og 50 bokstaver, eller tall!<br/>";
    }

    if (!preg_match("/^[0-9]{8}$/", $_POST["telef"])){
        $godkjent = false;
        echo "Vennligst oppgi et gyldig telefonnummer, 8 siffer mellom 0 og 9!<br/>";
    }


    if ($godkjent) {
        $bruker = new Publikum($_POST["fornavn"], $_POST["etternavn"], $_POST["adresse"], $_POST["postnr"], $_POST["poststed"], $_POST["telef"], $_POST["brukernavn"], $_POST["passord"]);


        $h1 = new Hondterer();
        $h1->tilkobligTest();

        if ($h1->brukernavnLedig($_POST["brukernavn"])) {
            if ($h1->insertPub($bruker)) {
                echo "Din bruker er nå registrert!<br/><br/>";
                echo '<br/><a href="index.php"><button name="TilLogIn" value="TilLogIn">Trykk her for å logge inn</button></a>';
                die();
            } else {
                echo "Vennligst fyll inn alle feltene!";
            }
        } else {
            echo "Brukernavnet er opptatt";
        }

    }
}
?>


<form id="skjema" name="skjema" action="" method="post">
    <br/>Brukernavn:<br/>
    <div id="feil" name="feil"></div>
    <input type="text" id="brukernavn" name="brukernavn" onchange="valider_brukernavn()"><br/><br/>
    <br/>Passord:<br/>
    <div id="feil2" name="feil2"></div>
    <input type="password" id="passord" name="passord" onchange="valider_passord()"><br/><br/>
    <br/>Gjenta Passord:<br/>
    <input type="password"><br/><br/>
    Fornavn:<br/>
    <div id="feil3" name="feil3"></div>
    <input type="text" id="fornavn" name="fornavn" onchange="valider_fornavn()"><br/>
    Etternavn:<br/>
    <div id="feil4" name="feil4"></div>
    <input type="text" id="etternavn" name="etternavn" onchange="valider_etternavn()"><br/>
    <br/>Adresse: <br/>
    <div id="feil5" name="feil5"></div>
    <input type="text" id="adresse" name="adresse" onchange="valider_adresse()"><br/>
    Postnummer: <br/>
    <div id="feil6" name="feil6"></div>
    <input type="text" id="postnr" name="postnr" onchange="valider_postnummer()"><br/>
    Poststed: <br/>
    <div id="feil7" name="feil7"></div>
    <input type="text" id="poststed" name="poststed" onchange="valider_poststed()"><br/>
    Telefonnr: <br/>
    <div id="feil8" name="feil8"></div>
    <input type="text" id="telef" name="telef" onchange="valider_tlf()"><br/>
    <br/>
    <br/><input type="submit" value="Registrer" name="reggen">
</form>
<a href="index.php"><button value="tilbake" name="tilbake">Tilbake</button></a>
