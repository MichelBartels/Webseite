<?php
    if(preg_match("<.+@(michelbartels|web|t-online|yahoo|gmail|outlook|mail|email|gmx)\.(com|de|us|co|uk|co.uk)>", $_POST["email"])) {
        $mysql = new mysqli("18.194.170.23", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
        if ($mysql->connect_error) {
            echo $mysql->connect_error;
        }
        $mysql->query("INSERT INTO `bestellungen` (`Bestellung`) VALUES ('" . json_encode($_POST) . "')");
    } else {
        header("Location: index.php");
    }
?>
<!doctype html>
<html>
    <head>
        <title>Bestellung erfolgreich</title>
    </head>
    <body>
        <h1>Bestellung erfolgreich</h1>
    </body>
</html>
