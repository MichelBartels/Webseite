<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
            $i = 0;
            $wiederholungen = 1000;
            do {
                $i = $i + 1;
                echo "<p>$i</p>";
                echo "<br>";
            } while ($i < $wiederholungen);
        ?>
    </body>
</html>
