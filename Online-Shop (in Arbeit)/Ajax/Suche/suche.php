<?php
    $mysql = new mysqli("18.194.170.23", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
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
    echo json_encode($gesamt, JSON_UNESCAPED_UNICODE);
?>
