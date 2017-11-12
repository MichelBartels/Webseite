<!doctype html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/bestellen.css">
    </head>
    <body>
        <?php
            include "menue.html";
        ?>
        <h1>Bestellen</h1>
        <form>
            <input name="name" placeholder="Name" required><br>
            <input name="geburtsdatum" placeholder="Geburtsdatum (TT.MM.JJJJ)" pattern="\d\d.\d\d.\d\d\d\d" required>
            <input name="adresse" placeholder="Geburtsdatum (TT.MM.JJJJ)" pattern="\d\d.\d\d.\d\d\d\d" required>
    </body>
</html>
