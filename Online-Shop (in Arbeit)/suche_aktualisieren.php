<?php
    $mysql = new mysqli("18.194.170.23", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
    if ($mysql->connect_error) {
        echo $mysql->connect_error;
    }
    $anfrage = $mysql->query("SELECT Beschreibung FROM produkte");
    $beschreibung = array();
    while ($zeile = $anfrage->fetch_assoc()) {
        $beschreibung[] = $zeile;
    }
    for ($i = 0; $i < count($beschreibung); $i++) {
        $mysql->query("UPDATE produkte SET Suchinformationen = '" . json_encode(array_count_values(explode(" ", strtolower(str_replace(",", "", str_replace(".", " ", $beschreibung[$i]["Beschreibung"])))))) . "' WHERE ID = " . ($i + 1) . ";");
    }
    $mysql->close();
?>
