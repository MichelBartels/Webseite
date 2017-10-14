<?php
    $mysql = new mysqli("localhost", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
    if ($mysql->connect_error) {
        echo $mysql->connect_error;
    }
    $anfrage = $mysql->query("SELECT * FROM produkte");
    $gesamt = array();
    while ($zeile = $anfrage->fetch_assoc()) {
        $gesamt[] = $zeile;
    }
    $mysql->close();
    echo json_encode($gesamt);
?>