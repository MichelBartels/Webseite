<?php
    session_start();
    unset($_SESSION["Warenkorb"][$_GET["id"]]);
    header("Location: " . $_SERVER["HTTP_HOST"] . $_GET["url"]);
?>