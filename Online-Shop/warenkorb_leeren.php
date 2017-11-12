<?php
    session_start();
    if 
    unset($_SESSION["Warenkorb"][$_GET["id"]]);
    header("Location: " . $_GET["url"]);
?>
