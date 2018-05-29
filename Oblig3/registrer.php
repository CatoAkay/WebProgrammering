<html>

<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<body>

<a href="admin.php"><button>Rediger Øvelse</button></a>
<br/>
<a href="Oversikt.php"><button>Oversikt</button></a>

<h1>Velkommen</h1>
<h2>Du er nå logget inn som admin</h2>
<p>Her kan du velge om du skal registrere en utøver eller persosn etter ditt ønske, om du skal registrere en utøver trenger du ikke oppgi brukernavn og passord!</p>

<form action="next.php" method="post">
    Brukernavn:
    <input type="text" name="brukernavn">
    Passord:
    <input type="password" name="passord"><br/><br/><br/>
    Fornavn:<br/>
    <input type="text" name="fornavn"><br/>
    Etternavn:<br/>
    <input type="text" name="etternavn"><br/>
    <br/>Adresse: <br/>
    <input type="text" name="adresse"><br/>
    Postnummer: <br/>
    <input type="text" name="postnr"><br/>
    Poststed: <br/>
    <input type="text" name="poststed"><br/>
    Telefonnr: <br/>
    <input type="text" name="telef"><br/>

    Er du utøver eller skal du se på?<br/>
    <select size="1" name="rolle">
        <option> </option>
        <option>Utøver</option>
        <option>Publikum</option>
    </select>
    <br/>
    <br/><input type="submit" value="Registrer" name="knapp">
</form>




<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 12:55
 */
include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

session_start();

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

</body>
</html>
