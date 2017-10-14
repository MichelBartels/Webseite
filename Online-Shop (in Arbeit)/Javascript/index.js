window.onload = function() {
    let direktsuche = document.getElementById("direktsuche")
    let nicht_direktsuche = document.getElementById("nichtdirektsuche")
    let produkte = document.getElementById("produkte")
    direktsuche.addEventListener("input", function() {
        let suchergebnisse = suchen(direktsuche.value)
        let neues_html = ""
        suchergebnisse.forEach(function(element) {
            neues_html += '<a class="produkt_link" href="produkt.php?id=' + element.ID + '"><div class="produkt">' + element.Name + ": " + element.Beschreibung + "</div></a>"
        })
        produkte.innerHTML = neues_html
    })
    function hintergrund_loeschen() {
        document.getElementById("hintergrund").style["opacity"] = "0";
        document.getElementsByTagName("werbung")[0].style["opacity"] = "0"
        document.getElementsByTagName("h1")[0].style["opacity"] = "0"
        direktsuche.style["margin-top"] = "-45vh"
        direktsuche.style["width"] = "80vw"
        produkte.style["z-index"] = 10
    }
    function direktsuche_focus() {
        direktsuche.id = "direktsuche_focus"
        nicht_direktsuche.style["opacity"] = "0";
        hintergrund_loeschen()
    }
    direktsuche.addEventListener("focus", direktsuche_focus)
    function nicht_direktsuche_focus() {
        nicht_direktsuche.style["margin-top"] = "-70vh"
        direktsuche.style["opacity"] = "0";
        hintergrund_loeschen()
    }
    for (i = 0; i < nicht_direktsuche.children.length; i++) {
        nicht_direktsuche.children[i].addEventListener("focus", nicht_direktsuche_focus)
    }
}