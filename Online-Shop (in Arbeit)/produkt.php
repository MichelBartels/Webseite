<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/produkt.css">
        <title>
            <?php
            $mysql = new mysqli("diff9.tk", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
            if ($mysql->connect_error) {
                echo $mysql->connect_error;
            }
            $anfrage = $mysql->query("SELECT * FROM produkte WHERE ID = " . $_GET["id"]);
            $anfrage = $anfrage->fetch_assoc();
            $name = $anfrage["Name"];
            echo $name;
            ?>
        </title>
        <script>
            let bilder_tag
            let aktuelles_bild
            window.addEventListener('DOMContentLoaded', function() {
                <?php
                    $bilder = scandir("Bilder/Datenbank/" . $anfrage["Bild"]);
                    unset($bilder[0]);
                    unset($bilder[1]);
                    $Bilder = array();
                    foreach ($bilder as $bild) {
                        $Bilder[] = "Bilder/Datenbank/" . $anfrage["Bild"] . $bild;
                    }
                    echo "let bilder = JSON.parse('" . json_encode($Bilder) . "')\n";
                ?>
                bilder_tag = document.getElementById("bilder")
                bilder_tag.style["backgroundImage"] = 'url("' + bilder[0] + '")'
                aktuelles_bild = 0
            })
        </script>
    </head>
    <body>
        <h1><?php
            echo $name;
            ?>
        </h1>
        <div id="bilder">
            <img id="rechts" src="Bilder/Design/rechts.svg">
            <img id="links" src="Bilder/Design/links.svg">
        </div>
    </body>
</html>
