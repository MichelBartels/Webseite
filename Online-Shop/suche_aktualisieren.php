<?php
    $mysql = new mysqli("sql11.freesqldatabase.com", "sql11218110", "ppxaC9ZDvG", "sql11218110");
    mysqli_set_charset($mysql, "utf8");
    if ($mysql->connect_error) {
        echo $mysql->connect_error;
    }
    $anfrage = $mysql->query("SELECT * FROM produkte");
    $produkte = array();
    while ($zeile = $anfrage->fetch_assoc()) {
        $produkte[] = $zeile;
    }
    for ($i = 0; $i < count($produkte); $i++) {
        $schluessel = array_keys($produkte[$i]);
        $gesamt = "";
        for ($i2 = 0; $i2 < count($schluessel) - 1; $i2++) {
            $gesamt .= " " . $produkte[$i][$schluessel[$i2]];
        }
        $query = "UPDATE produkte SET Suchinformationen = '" . json_encode(array_count_values(explode(" ", strtolower(str_replace("&szlig;", "ß", str_replace("&Uuml;", "Ü", str_replace("&Ouml;", "Ö", str_replace("&Auml;", "Ä", str_replace("&uuml;", "ü", str_replace("&ouml;", "ö", str_replace("&auml;", "ä", str_replace("“", "", str_replace("„", "", str_replace('"', "", (str_replace(",", "", str_replace(".", "", $gesamt)))))))))))))))), JSON_UNESCAPED_UNICODE) . "' WHERE ID = " . ($i + 1) . ";";
        echo $query;
        $mysql->query($query);
    }
    $mysql->close();
?>
