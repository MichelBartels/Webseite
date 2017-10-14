<?php
	$script = "";
	$string = "";
	include "library.php";
	$user = new user($_COOKIE["session"]);
    if(is_dir($user->id . "/")) {
    } else {
        mkdir($user->id . "/");
    }
	function durchsuche_Ordner_mit_Unterordnern($Unterordner) {
		$array = [];
		$Ergebnis = scandir($Unterordner);
		array_shift($Ergebnis);
		array_shift($Ergebnis);
		foreach ($Ergebnis as $item) {
			if(is_dir($Unterordner . "/" . $item)) {
				$array[$item] = durchsuche_Ordner_mit_Unterordnern($Unterordner . "/" . $item);
			} else {
				$array[] = $item;
			}
		}
		return $array;
	}
	function Array_zu_ul($Array, $id) {
		$Ausgabe = "";
		foreach ($Array as $key => $item) {
			global $id;
			if(is_array($item)) {
				$Ausgabe .= "<li>" . $key . "<br><ul>";
				$Funktion = Array_zu_ul($item, $id);
				$Ausgabe .= $Funktion[0] . "</ul></li>";
				$id = $Funktion[1];
			} else {
				$Ausgabe .= '<li id="' . $id . '">' . $item . "</li>";
			}
			$id = $id + 1;
		}
		return array($Ausgabe, $id);
	}
	$array = durchsuche_Ordner_mit_Unterordnern($user->id);
	output(Array_zu_ul($array, 0)[0]);
	if(isset($_POST["code"])) {
		$datei = fopen($user->id . "/index.php", "w");
		fwrite($datei, $_POST["code"]);
		$script = 'window.open("/PHP/' . $user->id . '/index.php")';
		fclose($datei);
	}
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="main.css">
		<script>
			function Fenster(nummer) {
				var Dateiname = prompt("Wie soll die Datei heißen?")
			}
			function speichern() {
				var formular = document.createElement("form")
                formular.setAttribute("method", "post")
                formular.setAttribute("action", "edit.php")
                var unsichtbares_feld = document.createElement("input")
                unsichtbares_feld.setAttribute("type", "hidden")
                unsichtbares_feld.setAttribute("name", "code")
                unsichtbares_feld.setAttribute("value", document.getElementsByTagName("textarea")[0].value)
                formular.appendChild(unsichtbares_feld)
                document.body.appendChild(formular)
                formular.submit()
			}
			window.onload = function () {
				<?php
					echo $script;
				?>
			}
		</script>
	</head>
	<body>
		<title>Code bearbeiten</title>
		<div id="Dateiname">Seite 1
		</div>
		<div id="Dateien">
			<ul><?php
				echo $string;
			?></ul>
			<button onclick="speichern()">Speichern</button>
		</div>
		<textarea>
			<?php
				$datei = fopen($user->id . "/index.php", "r");
				echo fread($datei, filesize($user->id . "/index.php"));
				fclose($datei);
			?>
		</textarea>
		<a id="Startseite" href="index.php?logout=true">Logout</a>
	</body>
</html>
