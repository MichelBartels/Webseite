var typing = function(wait_time, text, object, callback) {
    var array = text.split("")
    var loop = function(wait_time, array, object) {
        object.innerHTML += array[0]
        if (array.length > 1) {
            console.log("i")
            array.splice(0, 1)
            window.setTimeout(loop.bind(null, wait_time, array, object), wait_time)
        } else if (typeof callback != "undefined") {
            callback()
        }
    }
    loop(wait_time, array, object)
}
