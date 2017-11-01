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
            <?php
                $bilder = scandir("Bilder/Datenbank/" . $anfrage["Bild"]);
                unset($bilder[0]);
                unset($bilder[1]);
                $Bilder = array();
                foreach ($bilder as $bild) {
                    $Bilder[] = "Bilder/Datenbank/" . $anfrage["Bild"] . "/" . $bild;
                }
                echo "let Bilder = JSON.decode('" . json_encode($Bilder) . "')";
            ?>
        </script>
    </head>
    <body>
        <h1><?php
            echo $name;
            ?>
        </h1>
        <div id="bilder">
            
        </div>
    </body>
</html>
