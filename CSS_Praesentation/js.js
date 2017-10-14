var Seiten = {
	1: "Seite1",
	2: "Seite2",
    3: "Seite3"
}
var aktuell = 1

document.onkeydown = function (event) {
    if (event.keyCode == 87 && event.ctrlKey && event.altKey) {
		if (aktuell == Object.keys(Seiten).length) {
			document.getElementById(Seiten[aktuell]).style.opacity = 0
			document.getElementById(Seiten[1]).style.opacity = 1
			document.getElementById(Seiten[aktuell]).style.zIndex = 0
			document.getElementById(Seiten[1]).style.zIndex = 1
			aktuell = 1
		}
		else {
			document.getElementById(Seiten[aktuell]).style.opacity = 0
			document.getElementById(Seiten[++aktuell]).style.opacity = 1
			document.getElementById(Seiten[aktuell - 1]).style.zIndex = 0
			document.getElementById(Seiten[aktuell]).style.zIndex = 1
		}
	}
	return event.returnValue
}
function Weiter() {
    if (aktuell == Object.keys(Seiten).length) {
        document.getElementById(Seiten[aktuell]).style.opacity = 0
        document.getElementById(Seiten[1]).style.opacity = 1
        document.getElementById(Seiten[aktuell]).style.zIndex = 0
        document.getElementById(Seiten[1]).style.zIndex = 1
        aktuell = 1
    }
    else {
        document.getElementById(Seiten[aktuell]).style.opacity = 0
        document.getElementById(Seiten[++aktuell]).style.opacity = 1
        document.getElementById(Seiten[aktuell - 1]).style.zIndex = 0
        document.getElementById(Seiten[aktuell]).style.zIndex = 1
    }
}
function Aenderung(id) {
    console.log(id)
    var html = document.querySelector("#" + id + " #html").value
    var css = document.querySelector("#" + id + " #css").value
	document.getElementById("css_output").innerHTML = css
    document.querySelector("#" + id + " #Output").innerHTML = html
}
window.onload = function () {
    var htmlcssbox = document.getElementsByTagName("htmlcssbox")
    var css = document.getElementsByTagName("css")
    for (i = 0; i < htmlcssbox.length; ++i) {
        htmlcssbox[i].innerHTML = '<textarea id="html">' + htmlcssbox[i].innerHTML + '</textarea><textarea id="css">' + css[i].innerHTML + '</textarea><div id="Output"></div>'
    }
    document.getElementById("html").addEventListener("keyup", function (event) {
        console.log(event)
        Aenderung(event.target.parentElement.id)
	})
    document.getElementById("css").addEventListener("keyup", function (event) {
        Aenderung(event.target.parentElement.id)
    })
    document.querySelector("#zweitesTestfeld #html").addEventListener("keyup", function (event) {
        console.log(event)
        Aenderung(event.target.parentElement.id)
    })
    document.querySelector("#zweitesTestfeld #css").addEventListener("keyup", function (event) {
        Aenderung(event.target.parentElement.id)
    })
	Aenderung()
}
function Aendern (html, css, id) {
    var htmltag = document.querySelector("#" + id + " #html")
    htmltag.innerHTML = html
    var csstag = document.querySelector("#" + id + " #css")
    csstag.innerHTML = css
    Aenderung(id)
}
