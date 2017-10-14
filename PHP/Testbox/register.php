<?php
    $Mysql = mysqli_connect("", "", "", "");
// String erstellen, der in den Main-Bereich eingefügt werden soll
	$string = "";
	include "library.php";
// Gucken, ob alle Daten eingegeben wurden
	if($_POST["email"] == "") {
		echo 'Du hast nicht alle nötigen Daten angegeben. <a href="index.php">Zur&uuml;ck</a>"';
	} else {
		if($_POST["password"] == "") {
			echo 'Du hast nicht alle nötigen Daten angegeben. <a href="index.php">Zur&uuml;ck</a>"';
		} else {
// Mit Mysql-Datenbank verbinden
			if(mysqli_connect_errno()) {
				echo 'Ein unbekannter Fehler ist aufgetreten. <a href="index.php">Zur&uuml;ck</a>';
			} else {
// Gucken, ob man sich schon angemeldet hat
                $query = "SELECT Passwort FROM benutzer WHERE Email='" . $_POST["email"] . "'";
				$query = mysqli_query($Mysql, $query);
				if(array_key_exists(0, mysqli_fetch_all($query))) {
					echo 'Du hast dich schon angemeldet. <a href="index.php">Zur&uuml;ck</a>';
				} else {
// Eintragen in die benutzer-Datenbank
					$query = mysqli_query($Mysql, "INSERT INTO benutzer (Email, Passwort) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "')");
					mysqli_fetch_all($query);
					output('<h4>Herzlichen Gl&uuml;ckwunsch,</h4><br>du hast dich gerade erfolgreich registriert. <a href="index.php">Zur&uuml;ck</a>');
				}
			}
			mysqli_close($Mysql);
		}
	}
?>
<!doctype html>
<html>
	<head>
		<title>Registrierung</title>
		<link rel="stylesheet" href="main.css">
	</head>
    <body>
		<h1>Registrierung</h1>
		<div id="main"><p><?php echo $string; ?></p>
		</div>
	</body>
</html>
