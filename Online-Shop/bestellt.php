<?php
    if(preg_match("<.+@(michelbartels|web|t-online|yahoo|gmail|outlook|mail|email|gmx|hotmail)\.(com|de|us|co|uk|co.uk)>", $_POST["email"])) {
        $mysql = new mysqli("sql11.freesqldatabase.com", "sql11218110", "ppxaC9ZDvG", "sql11218110");
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
        <meta http-equiv="refresh" content="5; URL="index.php">
        <style>
            h1 {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <h1>Bestellung erfolgreich</h1>
    </body>
</html>
