<?php
	include "library.php";
	if(isset($_COOKIE["session"]) && $_COOKIE["session"] != 0) {
		if(isset($_GET["logout"])) {
			unset($_COOKIE["session"]);
			setcookie("session", 0);
		} else {
			header("Location: edit.php");
		}
	}
    if(isset($_GET["angemeldet"])) {
        header("Location: edit.php");
    }
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="main.css">
		<script>
			function match(input) {
				if(input.value == document.getElementById("Passwort").value) {
					input.setCustomValidity("");
				} else {
					input.setCustomValidity("Das eingegebene Passwort stimmt nicht mit dem oben Eingegebenen überein")
				}
			}
		</script>
	</head>
    <body>
		<h1>Einloggen</h1>
		<div id="main">
	    	<form action="login.php" method="post">
	    		<input type="email" required name="email" placeholder="Email-Adresse"><br>
				<input type="password" required name="password" placeholder="Passwort"><br>
    			<input type="submit" value="Login">
    		</form>
    		<h3>Hast du noch keinen Account?</h3>
    		<h3>Dann registriere dich jetzt!</h3>
    		<form action="register.php" method="post">
	    		<input type="email" required name="email" placeholder="Email-Adresse"><br>
				<input type="password" required name="password" id="Passwort" placeholder="Passwort"><br>
				<input type="password" required name="password" placeholder="Passwort wiederholen" oninput="match(this)"><br>
    			<input type="submit" value="Registrieren">
    		</form>
		</div>
		<a id="Startseite" href="../index.html">Zur&uuml;ck zur Startseite</a>
		<p>Wenn du dich mit anderen Mitgliedern des Diff8-Kurses austauschen m&ouml;chtest, kannst du einfach <a href="../Chat/index.php">hier</a> klicken und den inoffizielen Diff8-Chat nutzen.</p>
    </body>
</html>
