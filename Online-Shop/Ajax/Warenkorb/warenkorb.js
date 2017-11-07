function warenkorb_abfragen() {
    let anfrage = new XMLHttpRequest()
    anfrage.open("GET", "/Ajax/Warenkorb/warenkorb.php", false)
    anfrage.send()
    let rueckmeldung = JSON.parse(anfrage.responseText)
    return rueckmeldung
}