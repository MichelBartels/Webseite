let weiter_rechts = document.getElementById("weiter_rechts")
let weiter_links = document.getElementById("weiter_links")
let erste_seite = document.getElementById("werbeseite_1")
let zweite_seite = document.getElementById("werbeseite_2")
let suchfeld = document.getElementById("suchfeld")
let werbung_die_nicht_von_adblockern_geblockt_werden_soll = document.getElementById("werbung_die_nicht_von_adblockern_geblockt_werden_soll")
let footer = document.querySelector("footer")
let li = document.getElementsByTagName("li")
let suchmodus = false
let html_suchergebnisse = document.getElementById("suchergebnisse")
erste_seite.style["transition"] = "opacity 200ms"
zweite_seite.style["transition"] = "opacity 200ms"
let erste_seite_sichtbar = true
weiter_rechts.addEventListener("click", function() {
    if (erste_seite_sichtbar) {
        erste_seite.style["opacity"] = 0
        zweite_seite.style["opacity"] = 1
        erste_seite_sichtbar = false
    } else {
        erste_seite.style["opacity"] = 1
        zweite_seite.style["opacity"] = 0
        erste_seite_sichtbar = true
    }
})
weiter_links.addEventListener("click", function() {
    if (erste_seite_sichtbar) {
        erste_seite.style["opacity"] = 0
        zweite_seite.style["opacity"] = 1
        erste_seite_sichtbar = false
    } else {
        erste_seite.style["opacity"] = 1
        zweite_seite.style["opacity"] = 0
        erste_seite_sichtbar = true
    }
})
suchfeld.addEventListener("input", function() {
    if (!suchmodus) {
        werbung_die_nicht_von_adblockern_geblockt_werden_soll.style["transition"] = "opacity 200ms"
        werbung_die_nicht_von_adblockern_geblockt_werden_soll.style["opacity"] = 0
        footer.style["transition"] = "background-color 200ms"
        footer.style["background-color"] = "white"
        for (let i = 0; i < li.length; i++) {
            li[i].style["transition"] = "color 100ms"
            li[i].style["color"] = "black"
        }
        html_suchergebnisse.style["z-index"] = 10
        suchmodus = true
    }
    if (suchmodus && suchfeld.value == "") {
        werbung_die_nicht_von_adblockern_geblockt_werden_soll.style["opacity"] = 1
        footer.style["transition"] = "background-color 200ms"
        footer.style["background-color"] = "#1e2529"
        for (let i = 0; i < li.length; i++) {
            li[i].style["color"] = "white"
        }
        html_suchergebnisse.style["z-index"] = -1
        suchmodus = false
    }
    let suchergebnisse = suchen(suchfeld.value)
})
