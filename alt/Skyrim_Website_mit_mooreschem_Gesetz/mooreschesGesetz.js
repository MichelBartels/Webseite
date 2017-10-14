window.onscroll = function() {
    console.log("scroll")
    if(window.pageYOffset > (window.innerHeight / 2)) {
        console.log("a");
        document.getElementById("Transistoren").style.opacity = 1
    }
    if(window.pageYOffset > (window.innerHeight / 1.5)) {
        console.log("a");
        document.getElementById("Transistoren_jetzt").style.opacity = 1
    }
    if(window.pageYOffset > window.innerHeight) {
        console.log("a");
        document.getElementById("HNF_Transistor_Bild").style.opacity = 1
    }
    if(window.pageYOffset > (window.innerHeight * 1.8)) {
        console.log("a");
        document.getElementById("Informationen").style.opacity = 1
    }
    if(window.pageYOffset > (window.innerHeight * 2)) {
        console.log("a");
        document.getElementById("mooresches_Gesetz_Generator").style.opacity = 1
    }
}
window.onload = function() {
    document.getElementById("Berechnen").addEventListener("click", function() {
        if (document.getElementById("Jaehrliche_Verdoppelung").value == undefined) {
            var Jaehrliche_Verdoppelung = 12
            var Zunahme = Math.LN2 * (1 / Jaehrliche_Verdoppelung)
            var Ergebnis = document.getElementById("Komponente").value * Math.pow(Math.E, Zunahme * document.getElementById("Zeitraum").value)
            console.log(Math.round(Ergebnis))
            if (Ergebnis == Infinity) {
                document.getElementById("Ergebnis").innerHTML = "Ergebnis zu gro&szlig;"
            }
            else {
                document.getElementById("Ergebnis").innerHTML = Ergebnis
            }
        }
        else {
            var Zunahme = Math.LN2 * (1 / document.getElementById("Jaehrliche_Verdoppelung").value)
            var Ergebnis = document.getElementById("Komponente").value * Math.pow(Math.E, Zunahme * document.getElementById("Zeitraum").value)
            console.log(Math.round(Ergebnis))
            if (Ergebnis == Infinity) {
                document.getElementById("Ergebnis").innerHTML = "Ergebnis zu gro&szlig;"
            }
            else {
                if (isNaN(Ergebnis)) {
                    document.getElementById("Ergebnis").innerHTML = "Du hast nicht alle erforderlichen Daten angegeben"
                }
                else {
                    document.getElementById("Ergebnis").innerHTML = Math.round(Ergebnis)
                }
            }
        }
    })
}
