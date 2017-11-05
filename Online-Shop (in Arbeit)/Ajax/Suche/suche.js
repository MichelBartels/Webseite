function datenbank_abfragen() {
    let anfrage = new XMLHttpRequest()
    anfrage.open("GET", "./Ajax/Suche/suche.php", false)
    anfrage.send()
    let rueckmeldung = JSON.parse(anfrage.responseText)
    return rueckmeldung
}
function groesster_wert_in_object(object) {
    return Math.max.apply(Math, Object.values(object));
}
function suchen(suchtext) {
    let abfrage = datenbank_abfragen()
    let suche_array = suchtext.split(" ")
    let passend = {};
    for (let i = 0; i < suche_array.length; i++) {
        suche_array[i] = suche_array[i].toLowerCase()
        if (suche_array[i].endsWith("m") || suche_array[i].endsWith("m2") || suche_array[i].endsWith("m²") || suche_array[i].endsWith("M") || suche_array[i].endsWith("M2") || suche_array[i].endsWith("M²")) {
            let groesse = parseInt(suche_array[i])
            let am_besten_passend = [Infinity, false]
            abfrage.forEach(function(element, index) {
                let differenz = element["Grundstueckgroesse"] - groesse
                if (Math.abs(differenz) < am_besten_passend[0]) {
                    am_besten_passend = [element - groesse, element["ID"]]
                }
            })
            console.log(am_besten_passend)
            if (am_besten_passend[1]) {
                passend[am_besten_passend[1]] = 10 || (passend[am_besten_passend[1]] + 10)
            }
        }
        for (let i2 = 0; i2 < abfrage.length; i2++) {
            let abfrage_schluessel = Object.keys(JSON.parse(abfrage[i2]["Suchinformationen"]))
            for (let i3 = 0; i3 < abfrage_schluessel.length; i3++) {
                if (abfrage_schluessel[i3] == suche_array[i]) {
                    passend[i2] = 1 || (passend[i2] + 1)
                }
            }
        }
    }
    let sortiert = []
    let passende_haeuser = Object.keys(passend)
    let anzahl_passender_haeuser = passende_haeuser.length
    console.log(passend)
    for (let i = 0; i < anzahl_passender_haeuser; i++) {
        let groesster_wert = groesster_wert_in_object(passend)
        let schluessel = Object.keys(passend)[Object.values(passend).indexOf(groesster_wert)]
        sortiert.push(abfrage[schluessel])
        delete passend[schluessel]
    }
    if (sortiert.length == 0) {
        sortiert = abfrage
    }
    return sortiert
}
