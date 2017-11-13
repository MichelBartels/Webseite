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
            <input name="email" placeholder="Email-Adresse" pattern=".+@(michelbartels|web|t-online|yahoo|gmail|outlook|mail|email|gmx)\.(com|de|us|co|uk|co.uk)" required>
            <input name="geburtsdatum" placeholder="Geburtsdatum (TT.MM.JJJJ)" pattern="\d\d.\d\d.\d\d\d\d" required><br>
            <input name="strasse" placeholder="Stra&szlig;e und Hausnummer" pattern=".+ \d+" required><br>
            <input name="plz" placeholder="PLZ" pattern="\d\d\d\d\d" required><br>
            <input name="ort" placeholder="Ort" required><br>
            <input name="land" placeholder="Land" required><br>
            <button type="submit">Kostenpflichtig bestellen</button>
        </form>
    </body>
</html>
