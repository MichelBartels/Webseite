<?php
    $zeit = time();
    $online = fopen("Online.json", "r");
    $onlineinhalt = json_decode(fread($online, filesize("Online.json")));
    fclose($online);
    foreach ($onlineinhalt as $key => $inhalt) {
        if (($zeit - $inhalt->zeit) > 5) {
            unset($onlineinhalt->{$key});
        }
    }
    echo json_encode($onlineinhalt, JSON_FORCE_OBJECT);
?>