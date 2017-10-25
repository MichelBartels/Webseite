let weiter_rechts = document.getElementById("weiter_rechts")
let weiter_links = document.getElementById("weiter_links")
let erste_seite = document.getElementById("werbeseite_1")
let zweite_seite = document.getElementById("werbeseite_2")
erste_seite.style["transition"] = "opacity 200ms"
zweite_seite.style["transition"] = "opacity 200ms"
let erste_seite_sichtbar = true
weiter_rechts.addEventListener("click", function() {
    if (erste_seite_sichtbar) {
        erste_seite.style["opacity"] = 0
        zweite_seite.style["opacity"] = 1
    } else {
        erste_seite.style["opacity"] = 1
        zweite_seite.style["opacity"] = 0
    }
})
weiter_links.addEventListener("click", function() {
    if (erste_seite_sichtbar) {
        erste_seite.style["opacity"] = 0
        zweite_seite.style["opacity"] = 1
    } else {
        erste_seite.style["opacity"] = 1
        zweite_seite.style["opacity"] = 0
    }
})
