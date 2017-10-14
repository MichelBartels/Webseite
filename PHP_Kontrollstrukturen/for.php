<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
            $wiederholungen = 1000;
            for ($i = 1; $i < $wiederholungen + 1; $i = $i + 1):
                echo "<p>$i</p>";
                echo "<br>";
            endfor;
        ?>
    </body>
</html>
