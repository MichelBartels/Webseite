<?php
    $Mysql = mysqli_connect("", "", "", "");
// String erstellen, der in den Main-Bereich eingefügt werden soll
	$string = "";
	include "library.php";
// Mysql-Datenbank verbinden
    echo $Mysql->mysqli_connect_error;
	if ($Mysql->mysqli_connect_errno) {
		echo 'Ein unbekannter Fehler ist aufgetreten. <a href="index.php">Zur&uuml;ck</a>';
        echo $Mysql->mysqli_connect_errno;
	} else {
// Gucken, ob man sich schon angemeldet hat, und weiterleiten
		$query = mysqli_query($Mysql, "SELECT Passwort FROM benutzer WHERE Email='" . $_POST["email"] . "'");
		$fetch = mysqli_fetch_all($query);
		if(array_key_exists(0, $fetch) == false) {
			echo "Du hast dich noch nicht angemeldet";
			weiterleiten("index.php?angemeldet=false");
// Gucken, ob das Passwort richtig ist, und weiterleiten
		} elseif($fetch[0][0] != $_POST["password"]) {
			echo "Du hast ein falsches Passwort eingegeben";
			weiterleiten("index.php?falsches_passwort=true");
// Cookie für die session setzen weiterleiten
		} elseif($fetch[0][0] == $_POST["password"]) {
			function createsession_id() {
				$Inhalt = md5(rand());
				global $Mysql;
				$query = mysqli_query($Mysql, "SELECT * FROM session WHERE Inhalt='" . $Inhalt . "'");
				if(array_key_exists(0, mysqli_fetch_all($query))) {
					createsession();
				} else {
					return $Inhalt;
				}
			}
			$Zeit = time() + 7200;
			$id = createsession_id();
			setcookie("session", $id, $Zeit);
			$query = mysqli_query($Mysql, "SELECT ID FROM benutzer WHERE Email='" . $_POST["email"] . "'");
			$query_value = "INSERT INTO session (Name, Inhalt, `Original-ID`, Zeit) VALUES ('" . $_POST["email"] . "', '" . $id . "', '" . mysqli_fetch_all($query)[0][0] . "', '" . $Zeit . "')";
			$query = mysqli_query($Mysql, $query_value);
			mysqli_fetch_all($query);
			weiterleiten("index.php?angemeldet=true");
		}
	}
	mysqli_close($Mysql);
?>
<!doctype html>
<html>
	<head>
		<title>Einloggen</title>
		<link rel="stylesheet" href="main.css">
	</head>
    <body>
		<h1>Einloggen</h1>
		<div id="main"><p><?php echo $string; ?></p></div>
	</body>
</html>
