<?php
    if (strlen(trim($_POST["Nachricht"])) != 0) {
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
            if ($Benutzer_inhalt_array[$_POST["Name"]] == $_POST["Passwort"]) {
                date_default_timezone_set("Europe/Berlin");
                $Zeit = time();
                $Wochentage = array(
                    1 => "Montag",
                    2 => "Dienstag",
                    3 => "Mittwoch",
                    4 => "Donnerstag",
                    5 => "Freitag",
                    6 => "Samstag",
                    7 => "Sonntag",
                );
                $Nachrichten = fopen("Daten.txt", "a");
                $Wochentag = date("w", $Zeit);
                $Uhrzeit = date("G:i", $Zeit);
                $Zeit = date("d.m.Y", $Zeit);
                $Zeit = $Wochentage[$Wochentag] . ", der " .  $Zeit . " um " . $Uhrzeit . " Uhr";
                $Nachricht = str_replace("<", "&lt;", $_POST["Nachricht"]);
                $Nachricht = str_replace(">", "&gt;", $Nachricht);
                fwrite($Nachrichten, $_POST["Name"] . "|" . $Zeit . "|" . $Nachricht . "\n");
                fclose($Nachrichten);
            }
        }
    }
?>