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
    <h1>Oblig 1</h1>
    <h2>Oppgave1</h2>
    <h3>Første oppgave</h3>
    <p>Lag et PHP-script som lister ut alle tall som er delelige med 3 opp til 100. Bruk en for-løkke</p>
        <?php

        for ($i = 1; $i < 100; $i++){
            if ($i % 3 == 0){
                echo " ".$i;
            }
        }

        ?>
    <h3>Andre Oppgave</h3>
    <p>Lag samme utskrift som over med en while-løkke</p>
        <?php

        $a = 0;
        while ($a < 100){
            $a++;
            if ($a % 3 == 0){
                echo " ".$a;
            }
        }
        ?>
    <h3>Tredje Oppgave</h3>
    <p>Finn så gjennomsnittet av de samme tallene (de som er delelig med 3 opptil 100)</p>
    <?php

    $avg = 0;
    $treffTeller = 0;

        for ($teller = 1; $teller < 100; $teller++){
            if ($teller % 3 == 0){
                $avg = $avg + $teller;
                $treffTeller++;
            }
        }
        echo "Gjenomsnittet av disse tallene er: ".($avg / $treffTeller);


    ?>
    <h2>Oppgave2</h2>
    <h3>Første oppgave</h3>
    <p>Skriv ut alle tallene som er over 5.</p>
    <?php

    $minetall = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);

    for ($i = 0; $i < count($minetall); $i++){
        if ($minetall[$i] > 5){
            echo " "."$minetall[$i]";
        }
    }
    ?>

    <h3>Andre oppgave</h3>
    <p>Tell opp hvor mange tall som er over 5 og vis dette.</p>
    <?php

    $minetall2 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);
    $treffTeller2 = 0;

    for ($a = 0; $a < count($minetall2); $a++){
        if ($minetall2[$a] > 5){
            $treffTeller2++;
        }
    }
    echo "Antall tall som er over 5 er: ".$treffTeller2;

    ?>

    <h3>Tredje oppgave</h3>
    <p>Liste ut tallene baklengs.</p>
    <?php

    $minetall3 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);

    echo "Tabellen baklengs skrives slik: ";
    for ($b = count($minetall3)-1; $b >= 0; $b--){
        echo " ".$minetall3[$b];
    }
    ?>

    <h3>Fjerde oppgave</h3>
    <p>Finn det minste tallet ved en løkke. Skriv så tallet ut.</p>
    <?php

    $minetall4 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);
    $tester = $minetall4[0];

    echo "Det minste tallet i tabellen er: ";
    for ($c = 1; $c < count($minetall4); $c++){
        if ($minetall4[$c] < $tester){
            $tester = $minetall4[$c];
        }
    } echo $tester;

    ?>

    <h3>Femte oppgave</h3>
    <p>Finn det minste tallet ved en PHP-funksjon. Skriv så tallet ut.</p>

    <?php

    $minetall5 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);
    function findSmallest ($tabell){
        $tester2 = $tabell[0];
        echo "Det minste tallet i tabellen er: ";
        for ($c = 1; $c < count($tabell); $c++){
            if ($tabell[$c] < $tester2){
                $tester2 = $tabell[$c];
            }
        } echo $tester2;
    }

    findSmallest($minetall5);
    ?>

    <h3>Sjette oppgave</h3>
    <p>Lag så egendefinerte funksjoner med en innparameter for oppgave 1) og 2). Parameteren inn
        skal angi tallet som skal testes på i oppgavene. Funksjonene skal returnere verdier (tips, bruk
        et array i oppgave 1).</p>

    <?php

    $minetall6 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);

    function biggerThanFive($bigger){
        echo "Alle tall som er større enn fem ved hjelp av funksjon: ";
        for ($i = 0; $i < count($bigger); $i++) {
            if ($bigger[$i] > 5) {
                echo " " . "$bigger[$i]";
            }
        }
    }
    biggerThanFive($minetall6);

    echo "<br/>";

    $minetall7 = array (1, 4, 8, 1, 4, 10, 5, 6, 2, 4, 6);

    function quanOfBiggerFive($tabell2){
        echo "Antall tall over fem ved bruk av funksjon er: ";
        $treffTeller3 = 0;
        for ($a = 0; $a < count($tabell2); $a++) {
            if ($tabell2[$a] > 5) {
                $treffTeller3++;
            }
        }
        echo $treffTeller3;
    }

    quanOfBiggerFive($minetall7);

    ?>

    <h2>Oppgave 3</h2>
    <p>Vi ser på en liten del av et system som lar en bruker bestille billetter på nettet. Dette kan f.eks være kinobilletter. Det skal brukes en objektmodell for å løse oppgaven.<br>

        <br>Lag et skjema som kan ta imot personalia for personen som ønsker å bestille billettene.<br>

        <br>I skjema skal det kunne skrives inn navn, telefonnummer og e-post adresse etc.<br>
        Lag også en list-boks f.eks som lister opp ulike typer billetter.<br>
        Lag så et felt som angir antall billettersom som ønskes bestilt (av en type, det behøves ikke legges opp til at man kan bestille flere ulike typer billetter i samme bestilling).<br>
        Lag videre en bestill-knapp som dirigerer deg videre til en php-side som skal liste ut den informasjonen som er valgt/skrevet inn i skjema. Dagens dato og tid skal også vises på denne siden. Her skal man bekrefte bestilingsinformasjonen før en ny knapp trykkes. Informasjonen skal deretter lagres på fil og en bekreftelse sendes som e-post til personen som har bestilt. Dersom kunden ønsker å avbryte bestillingen skal dette gjøres på denne bekreftelsessiden.<br>

        <br>Objektmodell: Lag minimum to klasser, én for kunden og én for bestillingen. Disse skal så ha alle nødvendige attributter og metoder (funksjoner) for å kunne motta dataene fra skjema, sende e-post og lagre bestillingen på fil.</p><br>

    <form action="second.php" method="post">
        Navn: <br/>
        <input type="text" name="navn"/><br/>
        Adresse: <br/>
        <input type="text" name="adresse"/><br/>
        E-post: <br/>
        <input type="text" name="epost"/><br/>
        Mobilnummer: <br/>
        <input type="text" name="mobil"/><br/>

        Velg bilett:<br/>
        <select size="1" name="bilett">
            <option>-----------</option>
            <option>Fast 2 Furioous</option>
            <option>Beauty and the Beast</option>
            <option>The Greatest Showman</option>
            <option>Maze Runner</option>
            <option>Alien VS Predator</option>
        </select><br/>
        Velg antall biletter: <br/>
        <select size="1" name="antall">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
        </select>
        <input type="submit" value="Bestill" name="knapp"/><br/>
    </form>



    <?php

/*
    $_POST["navn"];
    $_POST["adresse"];
    $_POST["epost"];
    $_POST["mobil"];
*/
    ?>
    </body>
</html>
