<?php
    session_start();
    if (isset($_GET["id"]) {
        unset($_SESSION["Warenkorb"][$_GET["id"]]);
    } else {
        unset($_SESSION["Warenkorb"]);
    }
    header("Location: " . $_GET["url"]);
?>
