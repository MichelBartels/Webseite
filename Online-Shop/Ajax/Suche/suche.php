<?php
    $mysql = new mysqli("sql11.freesqldatabase.com", "sql11218110", "ppxaC9ZDvG", "sql11218110");
    mysqli_set_charset($mysql, "utf8");
    if ($mysql->connect_error) {
        echo $mysql->connect_error;
    }
    $anfrage = $mysql->query("SELECT * FROM produkte");
    $gesamt = array();
    while ($zeile = $anfrage->fetch_assoc()) {
        $gesamt[] = $zeile;
    }
    $mysql->close();
    echo preg_replace("<&szlig;>", "ß", preg_replace("<&Ouml;>", "Ö", preg_replace("<&Auml;>", "Ä", preg_replace("<&uuml;>", "Ü", preg_replace("<&ouml;>", "ö", preg_replace("<&auml;>", "ä", preg_replace("<\\\\r\\\\n>", " ", json_encode($gesamt, JSON_UNESCAPED_UNICODE))))))));
?>
