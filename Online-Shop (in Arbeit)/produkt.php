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
            $name = $anfrage["Name"];
            echo $name;
            ?>
        </title>
    </head>
    <body>
        <h1><?php
            echo $name;
            ?>
        </h1>
    </body>
</html>
