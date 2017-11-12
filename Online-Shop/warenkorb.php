<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/warenkorb.css">
        <title>Warenkorb</title>
    </head>
    <body>
        <?php
            include "menue.html";
        ?>
        <h1>Warenkorb</h1>
        <table>
            <thead>
                <tr>
                    <td class="name">Name</td>
                    <td class="anzahl">Anzahl</td>
                    <td class="preis">Preis</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $mysql = new mysqli("18.194.170.23", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
                        if ($mysql->connect_error) {
                            echo $mysql->connect_error;
                        }
                        $warenkorb = array();
                        foreach ($_SESSION["Warenkorb"] as $id => $anzahl) {
                            $anfrage = $mysql->query("SELECT Name, Preis FROM produkte WHERE ID = " . $id);
                            $ergebnis = $anfrage->fetch_assoc();
                            echo '<td class="name">' . $ergebnis["Name"] . '</td><td class="anzahl">' . $anzahl . '</td><td class="preis">' . number_format($ergebnis["Preis"], 2, ",", " ") . ' €</td>';
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <a href="warenkorb_leeren.php" id="warenkorb_leeren?url=warenkorb.php">Warenkorb leeren</a>
    </body>
</html>
