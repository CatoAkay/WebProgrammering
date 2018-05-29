<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 14:18
 */
/*if(regexPostnr($_POST["postnr"])) {
    $_SESSION["postnr"] = $_POST["postnr"];
} else {
    echo "Feil i postnr!";
    die();
}
*/

include ('Ovelse.php');
include ('Person.php');
include ('Publikum.php');
include ('Utover.php');
include ('Hondterer.php');

session_start();

$db2 = new Hondterer();
$db2->tilkobligTest();


$_SESSION ["rolle"] = $_POST["rolle"];
$_SESSION ["fornavn"] = $_POST["fornavn"];
$_SESSION ["etternavn"] = $_POST["etternavn"];
$_SESSION ["adresse"] = $_POST["adresse"];
$_SESSION ["postnr"] = $_POST["postnr"];
$_SESSION ["poststed"] = $_POST["poststed"];
$_SESSION ["telef"] = $_POST["telef"];

if($_SESSION["rolle"] == "Utøver"){
    echo '
    <h1>Hei kjære konkurent!</h1>
    <h2>Vennligst oppgi tillegsinformasjon</h2>
    
    <form action="next3.php" method="post">
    Hvilken nasjonalitet har du:<br/>
    <input type="text" name="nasjon"><br/>
    Hvilken gren skal du konkurere i:<br/>
    
    <select size="1" name="gren">';
    $sql = "SELECT Type FROM øvelse;";
    $resultat = mysqli_query($db2->getConn(), $sql);
    while ($row = mysqli_fetch_assoc($resultat)){
        echo '<option>'.$row["Type"].'</option>';
    }
        echo '
    </select>
    
    <br/><input type="submit" value="Registrer" name="knapp2">
    </form>';
    echo '<br/><a href="index.php"><button value="tilbkae" name="tilbake">Tilbake</button></a>';
}else if ($_SESSION["rolle"] == "Publikum") {
    echo '
    <h1>Takk for at du vil se på VM med oss!</h1>
        <h2>Vennligst oppgi tillegsinformasjon</h2>
            <form action="next4.php" method="post">
                Hva slags bilett ønsker du?<br/>
                <select size="1" name="bilett">
                <option> </option>
                <option>Standardbilett</option>
                <option>Silverbilett</option>
                <option>Gullbilett</option>
                <option>Diamondbilett</option>
                <option>Supremebilett</option>
                <option>VIP</option>
                </select>
                <br/>
                Hvilken gren skal du se på:<br/>
                <select size="1" name="gren">';

    $sql = "SELECT Type FROM øvelse;";
    $resultat = mysqli_query($db2->getConn(), $sql);
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo '<option>' . $row["Type"] . '</option>';
    }
    echo '      
    </select>
    <br/><input type="submit" value="Registrer" name="knapp2">
    </form>';
    echo '<br/><a href="index.php"><button value="tilbkae" name="tilbake">Tilbake</button></a>';
}
else {
    echo "Velg enten utøver eller publikum!";
    echo '<br/><a href="index.php"><button value="tilbkae" name="tilbake">Tilbake</button></a>';
}

?>