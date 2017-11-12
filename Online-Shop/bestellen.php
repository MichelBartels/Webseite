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
        <form method="post" action="bestellt.php">
            <input name="name" placeholder="Name" required><br>
            <input name="geburtsdatum" placeholder="Geburtsdatum (TT.MM.JJJJ)" pattern="\d\d.\d\d.\d\d\d\d" required><br>
            <input name="adresse" placeholder="Adresse" required><br>
            <input name="email" placeholder="Email-Adresse" type="email" required>
            <button type="submit">Kostenpflichtig bestellen</button>
        </form>
    </body>
</html>
