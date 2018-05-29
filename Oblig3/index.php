<h1>Hei velkommen til registeret for VM i SKI</h1>
<h2>Vennlisgt logg in her, enten som publikum eller ADMIN</h2>
<p>Hvis du ikke har registrert deg som publikum, gjør du det først ved å trykke på registrer!</p>
<p>Brukernavn og passord for admin er som i oppgaveteksten!</p>

<form action="" method="post">
    Bukrernavn:<br/>
    <input type="text" name="brukernavn"><br/>
    Passord:<br/>
    <input type="password" name="passord"><br/>

    <input type="submit" value="Log in" name="login">
</form>

<a href="lagbruker.php"><button name="reggen" value="reggen">Registrer</button></a><br/>
<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 19.03.2018
 * Time: 15:01
 */
include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');
error_reporting(0);
session_start();

$_SESSION["innlogget"] = false;
$h1 = new Hondterer();
$h1 ->tilkobligTest();


if (isset($_POST["login"])){
    $escapedBrukernavn = mysqli_real_escape_string($h1->getConn(), $_POST["brukernavn"]);
    $sql1 = "SELECT brukernavn FROM person WHERE brukernavn = '".$escapedBrukernavn."';";
    $reulstat = mysqli_query($h1->conn, $sql1);
    $row = mysqli_fetch_assoc($reulstat);
    $brukernavn = $row["brukernavn"];


    $sql2 = "SELECT passord FROM person WHERE brukernavn ='".$escapedBrukernavn."';";
    $reulstat2 = mysqli_query($h1->conn, $sql2);
    $row = mysqli_fetch_assoc($reulstat2);
    $passord = $row["passord"];
    $passordInput = password_verify($_POST["passord"], $passord);
    if ($_POST["brukernavn"] == $brukernavn && $passordInput){
        $_SESSION["innlogget"] = true;
        $_SESSION["bruker"] = $_POST["brukernavn"];
        if ($brukernavn == "sondre") {
            header("Location: " . "registrer.php");
            die();
        }else{
            $_SESSION["innlogget"] = true;
            header("Location:"."vanligbrukere.php");
            die();
        }
    }else{
        echo "<br/>Feil brukernavn eller passord!";
    }
}

if ($_SESSION["innlogget"] == false){
    echo "<br/>Du er ikke innlogget!!";

}


?>