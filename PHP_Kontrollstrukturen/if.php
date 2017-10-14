<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
            if (date("d") == "01"):
                echo "<p>Hallo,klicke hier um an dem Gewinnspiel teilzunehmen</p>";
            elseif (date("d") == "30" || date("d") == "31"):
                echo "<p>Hallo,leider ist das Gewinnspiel schon vorbei, aber du hast keinen Grund, traurig zu sein. Bald findet wieder ein neues statt</p>";
            else:
                echo "<p>Hallo,leider ist das Gewinnspiel schon vorbei und du hast einen Grund, traurig zu sein, denn es dauert noch, bis du wieder an dem Gewinnspiel teilnehmen kannst.</p>";
            endif;
        ?>
    </body>
</html>
