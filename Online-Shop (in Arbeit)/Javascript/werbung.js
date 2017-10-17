function werbung_laden() {
    let werbung = document.getElementsByTagName("werbung")
    for (var i = 0; i < werbung.length; i++) {
        console.log(werbung[i].childNodes)
    }
}
