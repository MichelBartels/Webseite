<?php
    $Benutzer = fopen("Benutzer.txt", "r");
    $Benutzer_inhalt = fread($Benutzer, filesize("Benutzer.txt"));
    $Benutzer_inhalt = explode("\n", $Benutzer_inhalt);
    array_pop($Benutzer_inhalt);
    $Benutzer_inhalt_array = array();
    foreach ($Benutzer_inhalt as $inhalt) {
        $inhalt = explode("|", $inhalt);
        $Benutzer_inhalt_array[$inhalt[0]] = $inhalt[1];
    }
    if (array_key_exists($_POST["Name"], $Benutzer_inhalt_array)) {
        $online = fopen("Online.json", "r");
        $onlineinhalt = json_decode(fread($online, filesize("Online.json")));
        fclose($online);
        $onlineinhalt->{$_POST["Name"]}->status = $_POST["status"];
        $online = fopen("Online.json", "w");
        fwrite($online, json_encode($onlineinhalt));
        fclose($online);
    }
?>