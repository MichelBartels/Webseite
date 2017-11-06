<!doctype html>
<html>
    <head>
        <title>Startseite</title>
        <style>
            .img {
                width: 10vw;
                overflow: hidden;
                height: 15vh;
                font-size: 20px;
                color: #5d626f;
            }

            a:not(#Geheim) {
                float: left;
                margin: 3%;
                border-color: #989aa5;
                border-style: solid;
                text-decoration: none;
                color: white;
                border-radius: 5px;
                border-width: 2px;
                background-color: lightgray;
                color: #3a3848;
                height: 50vh;
            }

            p {
                width: 10vw;
            }

            body {
                background-color: #e1e1e8;
            }

            * {
                text-align: center;
            }
            #Geheim {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100vw;
                height: 40vh;
            }
        </style>
    </head>
    <body>
        <?php
            include "menue.html";
        ?>
        <a href="Skyrim_Website_mit_mooreschem_Gesetz/index.html" id="Skyrim">
            <p class="img">Skyrim</p>
            <p>Lerne viel &uuml;ber Skyrim</p>
        </a>

        <a href="PHP/Testbox/index.php" id="PHP">
            <p class="img">PHP</p>
            <p>Probiere deinen PHP-Code mit dem PHP-Testfeld aus.<br>Info: Das Testfeld ist aus Technischen Gr&uuml;nden nicht verf&uuml;gbar</p>
        </a>

        <a href="CSS_Praesentation/index.html" id="CSS">
            <p class="img">CSS</p>
            <p>Lerne viel &uuml;ber CSS</p>
        </a>

        <a href="PHP/Chat/index.php" id="Chat">
            <p class="img">Chat</p>
            <p>Tausche dich mit anderen Mitgliedern des Diff8-Kurses aus!</p>
        </a>

        <a href="Skyrim_Website_mit_mooreschem_Gesetz/mooreschesGesetz.html" id="Moore">
            <p class="img">Moore</p>
            <p>Lerne viel &uuml;ber Gordon Moore</p>
        </a>

        <a href="PHP_Kontrollstrukturen/index.html" id="PHP_Kontrollstrukturen">
            <p class="img">PHP-<br>Kontroll-<br>strukturen</p>
            <p>Lerne viel &uuml;ber die PHP-Kontrollstrukturen</p>
        </a>
        <a href=".old/index.html" id="Geheim"></a>
    </body>
</html>
