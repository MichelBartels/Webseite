<!doctype html>
<html>
    <head>
        <title>B&B Architekten - Startseite</title>
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/index.css">
        <script src="Javascript/index.js"></script>
        <script src="Ajax/Suche/suche.js"></script>
        <script src="Ajax/Warenkorb/warenkorb.js"></script>
        <script src="Javascript/Werbung.js"></script>
    </head>
    <body>
        <werbung>
            <werbeseite>
                <img class="werbe_hintergrund" src="Bilder/Design/Werbung.jpg">
                <div class="schatten"></div>
            </werbeseite>
        </werbung>
        <div id="hintergrund"></div>
        <div id="vordergrund">
            <h1>Holen Sie sich jetzt die Wohnung Ihrer Tr&auml;ume</h3>
            <input id="direktsuche" type="text" placeholder="Direktsuche"><br><br>
            <div id="nichtdirektsuche">
                <input class="nichtdirektsuche" id="groesse" type="number" placeholder="Gr&ouml;&szlig;e in m²">
                <input class="nichtdirektsuche" id="zimmer" type="number" placeholder="Anzahl Zimmer">
                <input class="nichtdirektsuche" id="preis" type="number" min="50000" max="1000000" step="10000" placeholder="Preis">
                <input class="nichtdirektsuche" id="ort" type="text" placeholder="Ort">
                <select class="nichtdirektsuche" name="stil" id="stil">
                    <option selected disabled hidden>Stil ausw&auml;hlen</option>
                    <option value="romantik">Romantik</option>
                    <option value="renaissance">Renaissance</option>
                    <option value="barock">Barock</option>
                </select>
            </div>
        </div>
        <div id="produkte"></div>
        <?php
            session_start();
            if (!empty($_SESSION["Warenkorb"])) {
                echo <<<EOT
                <div id="warenkorb">
                <img src="Bilder/Design/warenkorb.svg">
                <div id="liste">
                    <table>
                        <tr><th class="produktname">Name</th><th class="anzahl">Anzahl</th><th class="preis">Preis</th></tr>
EOT;
                        $mysql = new mysqli("diff9.tk", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
                        if ($mysql->connect_error) {
                            echo $mysql->connect_error;
                        }
                        $gesamt = 0;
                        foreach ($_SESSION["Warenkorb"] as $id => $anzahl) {
                            $anfrage = $mysql->query("SELECT Name, Preis FROM produkte WHERE ID = " . $id);
                            $ergebnis = $anfrage->fetch_assoc();
                            echo '<tr><td class="produktname">' . $ergebnis["Name"] . '</td><td class="anzahl">' . $anzahl . '</td><td class="preis">' . number_format($ergebnis["Preis"], 2, ",", ".") . ' €</td><td class="loeschen"><a href="warenkorb_leeren.php?id=' . $id . '&url=' . $_SERVER["REQUEST_URI"] . '">X</a></td></tr>';
                            $gesamt += $ergebnis["Preis"] * $anzahl;
                        }
                        echo "</table>";
                echo '<p id="gesamt">Gesamtkosten: ' . number_format($gesamt, 2, ",", ".") . "</p>";
                echo <<<EOT
                    <a href="bestellen.php">Jetzt bestellen!</a>
                </div>
            </div>
EOT;
            }
        ?>
    </body>
</html>
