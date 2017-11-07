var vector = function (array) {
    this.array = array
    this.dimensions = array.length
}
vector.prototype.length = function () {
    var sum = 0
    for (var i = 0; i < this.array.length; i++) {
        sum += Math.pow(this.array[i], 2)
    }
    return Math.sqrt(sum)
};
vector.prototype.show = function () {
    if (window.chrome) {
        var temp = []
        for (var i = 0; i < this.array.length; i++) {
            temp[i] = [this.array[i]]
        }
    } else {
        var temp = this.array
    }
    console.table(temp)
}
vector.prototype.add = function (to_add) {
    var is_array = Object.prototype.toString.call(to_add) == "[object Array]"
    var is_number = typeof to_add == "number"
    if (!(is_array) && !(to_add instanceof vector) && !(is_number)){
        throw "Can't add object of this type"
    } else {
        if (is_array) {
            if (this.array.length != to_add.length) {
                console.warn("Length of vector is not the same")
            }
        } else {
            if (this.array.length != to_add.array.length) {
                console.warn("Length of vector is not the same")
            }
        }
        if (is_number) {
            for (var i = 0; i < this.array.length; i++) {
                this.array[i] += to_add
            }
        } else {
            for (var i = 0; i < this.array.length; i++) {
                if (is_array) {
                    if (to_add[i] != undefined) {
                        this.array[i] += to_add[i]
                    }
                } else {
                    if (to_add.array[i] != undefined) {
                        this.array[i] += to_add.array[i]
                    }
                }
            }
        }
    }
}
vector.prototype.subtract = function (to_subtract) {
    var is_array = Object.prototype.toString.call(to_subtract) == "[object Array]"
    var is_number = typeof to_subtract == "number"
    if (!(is_array) && !(to_subtract instanceof vector) && !(is_number)){
        throw "Can't subtract object of this type"
    } else {
        if (is_array) {
            if (this.array.length != to_subtract.length) {
                console.warn("Length of vector is not the same")
            }
        } else {
            if (this.array.length != to_subtract.array.length) {
                console.warn("Length of vector is not the same")
            }
        }
        if (is_number) {
            for (var i = 0; i < this.array.length; i++) {
                this.array[i] -= to_subtract
            }
        } else {
            for (var i = 0; i < this.array.length; i++) {
                if (is_array) {
                    if (to_subtract[i] != undefined) {
                        this.array[i] -= to_subtract[i]
                    }
                } else {
                    if (to_subtract.array[i] != undefined) {
                        this.array[i] -= to_subtract.array[i]
                    }
                }
            }
        }
    }
}
vector.prototype.multiply = function (to_multiply) {
    var is_array = Object.prototype.toString.call(to_multiply) == "[object Array]"
    var is_number = typeof to_multiply == "number"
    if (!(is_array) && !(to_multiply instanceof vector) && !(is_number)){
        throw "Can't multiply object of this type"
    } else {
        if (is_number) {
            for (var i = 0; i < this.array.length; i++) {
                this.array[i] *= to_multiply
            }
        } else {
            if (this.array.length != to_multiply.length) {
                throw "Length of vector is not the same"
            } else {
                var sum = 0
                for (var i = 0; i < this.array.length; i++) {
                    sum += this.array[i] * to_multiply[i]
                }
                return sum
            }
        }
    }
}
vector.prototype.normalize = function () {
    var temp = []
    for (var i = 0; i < this.array.length; i++) {
        temp[i] = this.array[i] / this.length()
    }
    this.array = temp
}
