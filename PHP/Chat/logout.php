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
        $online = fopen("Online.txt", "r");
        $onlineinhalt = fread($online, filesize("Online.txt"));
        fclose($online);
        $onlineinhalt = explode("\n", $onlineinhalt);
        array_pop($onlineinhalt);
        $onlineinhaltarray = array();
        foreach ($onlineinhalt as $inhalt) {
            $inhalt = explode("|", $inhalt);
            $onlineinhaltarray[$inhalt[0]] = $inhalt[1];
        }
        unset($onlineinhaltarray[$_POST["Name"]]);
        $onlinezukunftinhalt = "";
        foreach ($onlineinhaltarray as $key => $inhalt) {
            $onlinezukunftinhalt += $key . "|" . $inhalt . "\n";
        }
        $online = fopen("Online.txt", "w");
        fwrite($online, $onlinezukunftinhalt);
        fclose($online);
    }
?>