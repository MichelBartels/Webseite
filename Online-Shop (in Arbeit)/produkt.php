<!doctype html>
<html>
    <head>
        <title>
        <?php
            $mysql = new mysqli("diff9.tk", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
            if ($mysql->connect_error) {
                echo $mysql->connect_error;
            }
            $anfrage = $mysql->query("SELECT * FROM produkte WHERE ID = " . $_GET["id"]);
            $anfrage = $anfrage->fetch_assoc();
            echo $anfrage["Name"];
        ?>
        </title>
        <link rel="stylesheet" href="CSS/produkt.css">
    </head>
    <body>
        <div id="schatten"></div>
        <div id="bilder">
            <?php
                $bilder = scandir("Bilder/Datenbank/" . $anfrage["Bild"]);
                unset($bilder[0]);
                unset($bilder[1]);
                foreach ($bilder as $bild) {
                    echo '<img src="Bilder/Datenbank/' . $anfrage["Bild"] . "/" . $bild . '">';
                }
            ?>
        </div>
        <div id="informationen">
            <p id="beschreibung">
                <?php
                    echo $anfrage["Beschreibung"];
                ?>
            </p>
            <p id="genauere_informationen">
                Minimale Grundst&uuml;ckgr&ouml;&szlig;e: <?php
                    echo $anfrage["Grundstueckgroesse"];
                ?>m²<br>
                Anzahl an Zimmern: <?php
                    echo $anfrage["AnzahlZimmer"];
                ?><br>
                Gr&ouml;&szlig;e des Geb&auml;ude Bodens: <?php
                    echo $anfrage["Anzahlm2"];
                ?>m²<br>
                Anzahl an Etagen: <?php
                    echo $anfrage["AnzahlEtage"];
                ?><br>
                Anzahl an B&auml;dern: <?php
                    echo $anfrage["AnzahlBaeder"];
                ?><br>
                Anzahl an Schlafzimmern: <?php
                    echo $anfrage["AnzahlSchlafzimmer"];
                ?><br>
                Verbleibende H&auml;ser: <?php
                    echo $anfrage["VerbleibendeHaeuser"];
                ?><br>
                Preis: <?php
                    echo number_format($anfrage["Preis"], 2, ",", ".") . " €";
                ?><br>
                Stil: <?php
                    echo $anfrage["Stil"];
                ?>
            </p>
            <a id="kaufen" href="kaufen.php?id=<?php
                echo $_GET["id"];
            ?>">Jetzt kaufen</a>
        </div>
    </body>
</html>
<?php
    $mysql->close();
?>