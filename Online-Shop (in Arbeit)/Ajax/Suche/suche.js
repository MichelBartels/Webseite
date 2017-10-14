function datenbank_abfragen() {
    let anfrage = new XMLHttpRequest()
    anfrage.open("GET", "./Ajax/Suche/suche.php", false)
    anfrage.send()
    let rueckmeldung = JSON.parse(anfrage.responseText)
    return rueckmeldung
}
function umlaute_ersetzen(string_oder_array, andersherum=false) {
    if (string_oder_array instanceof Array) {
        let neuer_array = []
        string_oder_array.forEach(function(element) {
            neuer_array.push(umlaute_ersetzen(element, andersherum))
        })
        return neuer_array
    } else {
        let string = string_oder_array
        if (andersherum) {
            string.replace("&uuml;", "ü")
            string.replace("&ouml;", "ö")
            string.replace("&auml;", "ä")
            string.replace("&szlig;", "ß")
        } else {
            string.replace("ü", "&uuml;")
            string.replace("ö", "&ouml;")
            string.replace("ä", "&auml;")
            string.replace("ß", "&szlig;")
        }
        return string
    }
}
function suchen(suchtext) {
    let abfrage = datenbank_abfragen()
/*    let suche_array = suchtext.split(" ")
    abfrage = umlaute_ersetzen(abfrage, true)
    abfrage.forEach(function(element) {
        element.forEach(function(element2) {
            
        })
    }) */
    return abfrage
}