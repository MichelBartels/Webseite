<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/index.css">
        <script src="Javascript/index.js" defer></script>
        <script src="Ajax/Suche/suche.js"></script>
    </head>
    <body>
        <?php
            include "menue.html";
        ?>
        <div id="suche">
            <input type="text" placeholder="Suchen" id="suchfeld">
        </div>
        <div id="werbung_die_nicht_von_adblockern_geblockt_werden_soll">
            <div class="werbeseite" id="werbeseite_1">
<!--                <h1 id="unterstrichen>B&amp;B<br>Architekten</h1><br>--><h1>Ihre Partner beim Bau<br>Ihres Eigenheims</h1>
            </div>
            <div class="werbeseite" id="werbeseite_2">
                <h2 id="qualitaet">Egal, ob Sie sich ein kleines Gartenh&auml;uschen kaufen oder eine riesige Villa errichten lassen: Bei uns k&ouml;nnen Sie sich immer auf die Qualit&auml;t unserer Produkte verlassen, denn wir benutzen nur die besten Materialien.</h2>
                <img id="ziegelsteine" src="Bilder/Design/ziegelsteine.png">
                <h2 id="preis">Wegen dieser Qualit&auml;t k&ouml;nnen wir es uns leisten, unsere Geb&auml;ude f&uuml;r 160% des Normalpreises zu verkaufen, aber uns liegt das Wohl der Kunden am Herzen und daher versichern wir Ihnen, unser Geb&auml;ude zu einem Preis von 80% des Normalpreises anzubieten.</h2>
                <img id="geld" src="Bilder/Design/geld.png">
            </div>
            <div class="werbeseite" id="werbeseite_3">
            </div>
            <div id="weiter_rechts" class="weiter_button">
            </div>
            <div id="weiter_links" class="weiter_button">
            </div>
        </div>
        <div id="suchergebnisse">
        </div>
        <footer>
            <ul>
                <li><a>Impressum</a></li>
                <li><a>Kontakt</a></li>
                <li id="copyright">&copy; <?php
                    echo date("Y");
                    ?> B&amp;B Architekten - Alle Rechte vorbehalten</li>
            </ul>
        </footer>
    </body>
</html>
