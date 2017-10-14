<?php
    session_start();
    $id = $_GET["id"];
    $_SESSION["Warenkorb"] = $_SESSION["Warenkorb"] ?: array();
    $_SESSION["Warenkorb"][$id] = $_SESSION["Warenkorb"][$id] ? $_SESSION["Warenkorb"][$id] + 1: 1;
    header("Location: produkt.php?id=" . $id);
?>