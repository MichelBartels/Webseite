<?php
    $mysql = new mysqli("localhost", "michel", "SB4me8w8t7KcjYIq", "michel_robin");
    if ($mysql->connect_error) {
        echo $mysql->connect_error;
    }
    session_start();
    $warenkorb = array();
    foreach ($_SESSION["Warenkorb"] as $id => $anzahl) {
        $anfrage = $mysql->query("SELECT Name, Preis FROM produkte WHERE ID = " . $id);
        $ergebnis = $anfrage->fetch_assoc();
        $warenkorb[] = array("Name" => $ergebnis["Name"], "Preis" => $ergebnis["Preis"], "Anzahl" => $anzahl);
    }
    echo json_encode($warenkorb);
?>