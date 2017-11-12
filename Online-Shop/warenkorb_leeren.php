<?php
    session_start();
    $url = $_GET["url"];
    if (isset($_GET["id"])) {
        unset($_SESSION["Warenkorb"][$_GET["id"]]);
        if (empty($_SESSION["Warenkorb"])) {
            unset($_SESSION["Warenkorb"]);
            $url = "index.php";
    } else {
        unset($_SESSION["Warenkorb"]);
    }
    header("Location: " . $_GET["url"]);
?>
