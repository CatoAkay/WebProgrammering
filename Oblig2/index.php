<html>

<head>
    <title>Ski vm register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<body>

<a href="admin.php">Rediger Øvelse</a>
<br/>
<a href="Oversikt.php">Oversikt</a>

<h1>Velkommen</h1>
<h2>Registrer deg her</h2>
<p>Hei og velkommen til ski vm sine nettsider, her kan du velge om du skal registrere deg selv som utøver eller publikum</p>

<form action="next.php" method="post">
    Fornavn:
    <input type="text" name="fornavn">
    Etternavn:
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

?>

</body>
</html>
