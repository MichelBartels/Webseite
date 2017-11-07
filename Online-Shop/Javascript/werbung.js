function werbung_laden() {
    let werbung_tags = document.getElementsByTagName("werbung")
    let werbung = []
    for (var i = 0; i < werbung_tags.length; i++) {
        werbung_nodes = werbung_tags[i].children
        werbung.push({bilder: [], })
        for (var i2 = 0; i2 < werbung_nodes.length; i2++) {
            werbung_seite_nodes = werbung_nodes[i2].children
            werbung[i].bilder.push(werbung_seite_nodes[0].src)
        }
    }
    console.log(werbung)
}
