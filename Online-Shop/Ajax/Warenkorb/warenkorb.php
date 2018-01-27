<?php
    $mysql = new mysqli("sql11.freesqldatabase.com", "sql11218110", "ppxaC9ZDvG", "sql11218110");
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
