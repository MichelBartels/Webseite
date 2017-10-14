<!DOCTYPE html>
<html>

<head>
    <style>
        #Startseite {
            position: fixed;
            bottom: 2vh;
            right: 2vw;
            background-color: lightgrey;
            padding: 2vh 2vw;
            border-color: grey;
            border-width: 2px;
            border-style: solid;
            border-radius: 2px;
            color: black;
            z-index: 10;
    }
    </style>
    <title>Der (in)offizielle Diff8-Chat</title>
    <link rel="stylesheet" href="main_css.css">
    <script>
        var intervall
        window.onload = function() {
            document.querySelector("body").click()
            document.getElementById("senden").addEventListener("click", function() {
                var xhttp = new XMLHttpRequest;
                xhttp.open("POST", "eingabe.php", true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value + "&Nachricht=" + document.getElementById("nachrichteingabe").value)
                document.getElementById("nachrichteingabe").value = ""
            })
            document.getElementById("login").addEventListener("click", function() {
                var xhttp = new XMLHttpRequest;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "Passwort falsch") {
                            alert("Das Passwort ist falsch, versuch, es nochmal einzugeben")
                        }
                        if (this.responseText == "Nicht angemeldet") {
                            alert("Du hast dich noch nicht registriert, mach das, bevor du nochmal versuchst, dich anzumelden")
                        }
                        if (this.responseText == "Passwort richtig") {
                            document.querySelector("p").style.opacity = 0
                            document.querySelector("img").style.opacity = 0
                            document.querySelector("u").style.opacity = 0
                            document.querySelector("form").style.opacity = 0
                            document.querySelector("p").style["z-index"] = -1
                            document.querySelector("img").style["z-index"] = -1
                            document.querySelector("u").style["z-index"] = -1
                            document.querySelector("form").style["z-index"] = -1
                            document.getElementById("Hauptspalte").style["margin-left"] = 0
                            document.getElementById("Hauptspalte").style["width"] = "100%"
                            document.querySelector("header").style["height"] = "10vh"
                            document.querySelector("header").style["background-color"] = "lightblue"
                            document.getElementById("chat").style.opacity = 1
                            document.getElementById("chat").style["z-index"] = 1
                            document.querySelector("label").style["z-index"] = 1
                            document.querySelector("label").style.opacity = 1
                            document.getElementById("status").style.opacity = 1
                            document.getElementById("status").style["z-index"] = 1
                            document.getElementById("nachrichteingabe").focus()
                            online()
                            status()
                            var xhttp = new XMLHttpRequest
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var Nachrichten = this.responseText.split("\n")
                                    Nachrichten.pop()
                                    var html = "<ul>"
                                    Nachrichten.forEach(function(Nachricht) {
                                        Nachricht = Nachricht.split("|")
                                        html += '<li><p class="textnachricht">' + Nachricht[2] + '</p><div class="strich"></div><p class="zeitautor">' + Nachricht[1] + "<br>" + Nachricht[0] + '</p></li>'
                                    })
                                    html += "</ul>"
                                    document.getElementById("nachrichten").innerHTML = html
                                }
                            }
                            xhttp.open("POST", "abfrage.php", true)
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                            xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
                            intervall = setInterval(function() {
                                var xhttp = new XMLHttpRequest
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        var Nachrichten = this.responseText.split("\n")
                                        Nachrichten.pop()
                                        var html = "<ul>"
                                        Nachrichten.forEach(function(Nachricht) {
                                            Nachricht = Nachricht.split("|")
                                            html += '<li><p class="textnachricht">' + Nachricht[2] + '</p><div class="strich"></div><p class="zeitautor">' + Nachricht[1] + "<br>" + Nachricht[0] + '</p></li>'
                                        })
                                        html += "</ul>"
                                        document.getElementById("nachrichten").innerHTML = html
                                    }
                                }
                                xhttp.open("POST", "abfrage.php", true)
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
                            }, 1000)
                            setInterval(function() {
                                online()
                            }, 10000)
                            setInterval(function() {
                                status()
                            }, 10000)
                        }
                    }
                }
                xhttp.open("POST", "login.php", true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
            })
        }
        function enter(event) {
            if (event.keyCode == 13) {
                var xhttp = new XMLHttpRequest;
                xhttp.open("POST", "eingabe.php", true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value + "&Nachricht=" + document.getElementById("nachrichteingabe").value)
                document.getElementById("nachrichteingabe").value = ""
                return false
            }
        }
        function online() {
            var xhttp = new XMLHttpRequest
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var online = JSON.parse(this.responseText)
                    var html = ""
                    for (var key in online) {
                        html += "<li>" + key + "<br>" + online[key]["status"] + "</li>"
                    }
                    document.getElementById("benutzerul").innerHTML = html
                }
            }
            xhttp.open("GET", "online.php", true)
            xhttp.send()
        }
        function status() {
            var xhttp = new XMLHttpRequest
            xhttp.open("POST", "status.php", true)
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value + "&status=" + document.getElementById("status").options[document.getElementById("status").selectedIndex].value)
        }
        function scroll() {
            document.getElementById("chat").scrollTop = document.getElementById("chat").scrollHeight
        }
        function loginenter(event) {
            console.log(event)
            if (event.keyCode == 13) {
                var xhttp = new XMLHttpRequest;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "Passwort falsch") {
                            alert("Das Passwort ist falsch, versuch, es nochmal einzugeben")
                        }
                        if (this.responseText == "Nicht angemeldet") {
                            alert("Du hast dich noch nicht registriert, mach das, bevor du nochmal versuchst, dich anzumelden")
                        }
                        if (this.responseText == "Passwort richtig") {
                            document.querySelector("p").style.opacity = 0
                            document.querySelector("img").style.opacity = 0
                            document.querySelector("u").style.opacity = 0
                            document.querySelector("form").style.opacity = 0
                            document.querySelector("p").style["z-index"] = -1
                            document.querySelector("img").style["z-index"] = -1
                            document.querySelector("u").style["z-index"] = -1
                            document.querySelector("form").style["z-index"] = -1
                            document.getElementById("Hauptspalte").style["margin-left"] = 0
                            document.getElementById("Hauptspalte").style["width"] = "100%"
                            document.querySelector("header").style["height"] = "10vh"
                            document.querySelector("header").style["background-color"] = "lightblue"
                            document.getElementById("chat").style.opacity = 1
                            document.getElementById("chat").style["z-index"] = 1
                            document.querySelector("label").style["z-index"] = 1
                            document.querySelector("label").style.opacity = 1
                            document.getElementById("status").style.opacity = 1
                            document.getElementById("status").style["z-index"] = 1
                            document.getElementById("nachrichteingabe").focus()
                            online()
                            status()
                            var xhttp = new XMLHttpRequest
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var Nachrichten = this.responseText.split("\n")
                                    Nachrichten.pop()
                                    var html = "<ul>"
                                    Nachrichten.forEach(function(Nachricht) {
                                        Nachricht = Nachricht.split("|")
                                        html += '<li><p class="textnachricht">' + Nachricht[2] + '</p><div class="strich"></div><p class="zeitautor">' + Nachricht[1] + "<br>" + Nachricht[0] + '</p></li>'
                                    })
                                    html += "</ul>"
                                    document.getElementById("nachrichten").innerHTML = html
                                }
                            }
                            xhttp.open("POST", "abfrage.php", true)
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                            xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
                            intervall = setInterval(function() {
                                var xhttp = new XMLHttpRequest
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        var Nachrichten = this.responseText.split("\n")
                                        Nachrichten.pop()
                                        var html = "<ul>"
                                        Nachrichten.forEach(function(Nachricht) {
                                            Nachricht = Nachricht.split("|")
                                            html += '<li><p class="textnachricht">' + Nachricht[2] + '</p><div class="strich"></div><p class="zeitautor">' + Nachricht[1] + "<br>" + Nachricht[0] + '</p></li>'
                                        })
                                        html += "</ul>"
                                        document.getElementById("nachrichten").innerHTML = html
                                    }
                                }
                                xhttp.open("POST", "abfrage.php", true)
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
                            }, 1000)
                            setInterval(function() {
                                online()
                            }, 10000)
                        }
                    }
                }
                xhttp.open("POST", "login.php", true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xhttp.send("Name=" + document.getElementById("login_name").value + "&Passwort=" + document.getElementById("login_passwort").value)
            }
        }
    </script>
</head>

<body>
    <div id="Hauptspalte">
        <center>
            <header>
                <h1>Der (in)offizielle Diff8-Chat</h1>
                <?php
                    date_default_timezone_set("Europe/Berlin");
                    $datum = date("d.m.Y - H:i");
                    echo $datum;
                ?>
                <label for="status">Status</label>
                <select name="status" id="status" onchange="status()">
                    <option selected value="Online">Online</option>
                    <option value="Besch&auml;ftigt">Besch&auml;ftigt</option>
                </select>
            </header>
        </center>
        <p>Dies ist der erste (in)offizielle Diff8-Chat, erstellt von Michel Bartels und Robin Beimstroh. <b>Dieser Chat ist nur für Mitglieder des Diff8-Kurs des 
Herder-Gymnasiums Minden gedacht </b>und soll eine bessere Kommunikation au&szlig;erhalb des Unterrichts ermöglichen.<br> Damit dies gelingt, ist es jedoch auch vonn&ouml;ten bestimmte Regeln zu befolgen. Diese Grundregeln der Chatkommunikation k&ouml;nnt ihr auf folgender Internetseite nachlesen: <a href="http://www.chatiquette.de/">www.chatiquette.de</a>.<br> Registriere dich jetzt, wenn dein Interesse geweckt ist, und starte in dein ganz eigenes Infoabenteuer zusammen mit deinen Freunden.<br> Um zu garantieren, dass nur Mitglieder des Diff8-Kurses in den Genuss dieser Webseite kommen, gilt eine Klarnamenspflicht. Wir behalten uns vor, Personen, die sich nicht an die Regeln halten oder durch anderes negatives Verhalten auffallen, kurzfristig oder langfristig zu sperren.<br>
        </p>
        <br>
        <img height="250px" width="250px" src="smile_pc.png">
        <br><br>

        <u><b id="loginb">Login</b></u>
        <form>
            Name:<br>
            <input type="text" name="Name" id="login_name" onkeydown="loginenter(event)" autofocus><br> Passwort:
            <br>
            <input type="password" onkeydown="loginenter(event)" name="Passwort" id="login_passwort"><br>
            <input type="button" value="Los" id="login">
        </form>
        <div id="chat">
            <div id="nachrichten">
                <ul>
                </ul>
            </div>
            <div id="benutzer">
                <ul id="benutzerul">
                </ul>
            </div>
            <div id="eingabe">
                <form>
                    <input id="nachrichteingabe" type="text" name="Nachricht" placeholder="Hier Nachricht eintippen" onkeypress="return enter(event)">
                    <input type="button" value="Senden" id="senden">
                    
                </form>
                
            </div>
        </div>

    </div>
    <a id="Startseite" href="../../index.html">Zur&uuml;ck zur Startseite</a>








</body>

</html>