matrix = function (array) {
    this.array = array
    this.m = array.length
    this.n = array[0].length
}
matrix.prototype.show = function () {
    console.table(this.array)
}
matrix.prototype.add = function (to_add) {
    var is_vector = to_add instanceof vector
    var is_matrix = to_add instanceof matrix
    var is_array = Object.prototype.toString.call(to_add) == "[object Array]"
    var is_2d_array = false
    if (is_array) {
        is_2d_array = !!to_add[0].length
    }
    var is_number = typeof to_add == "number"
    if (!(is_array) && !(to_add instanceof vector) && !(is_number)){
        throw "Can't add object of this type"
    } else {
        if ((is_array && (this.array.length != to_add.length || (is_2d_array && this.array[0].length != to_add[0].length))) || (is_vector && is_matrix) && (this.array.length != to_add.array.length) || is_matrix && (this.array[0].length != to_add[0].length)) {
            console.warn("Length of matrix is not the same")
        }
        if (is_number) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    this.array[i][i2] += to_add
                }
            }
        } else if (is_array && !(is_2d_array)) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_add[i] != undefined) {
                        this.array[i][i2] += to_add[i]
                    }
                }
            }
        } else if (is_vector) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_add.data[i] != undefined) {
                        this.array[i][i2] += to_add.data[i]
                    }
                }
            }
        } else if (is_array && is_2d_array) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_add[i][i2] != undefined) {
                        this.array[i][i2] += to_add[i][i2]
                    }
                }
            }
        } else if (is_matrix) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_add.array[i][i2] != undefined) {
                        this.array[i][i2] += to_add.array[i][i2]
                    }
                }
            }
        }
    }
}
matrix.prototype.subtract = function (to_subtract) {
    var is_vector = to_subtract instanceof vector
    var is_matrix = to_subtract instanceof matrix
    var is_array = Object.prototype.toString.call(to_subtract) == "[object Array]"
    var is_2d_array = false
    if (is_array) {
        try {
            is_2d_array = !!to_subtract[0].length
        } catch (e) {}
    }
    var is_number = typeof to_subtract == "number"
    if (!(is_array) && !(to_subtract instanceof vector) && !(is_number)){
        throw "Can't subtract object of this type"
    } else {
        if ((is_array && (this.array.length != to_subtract.length || (is_2d_array && this.array[0].length != to_subtract[0].length))) || !(is_array) && (this.array.length != to_subtract.array.length)) {
            console.warn("Length of matrix is not the same")
        }
        if (is_number) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    this.array[i][i2] -= to_subtract
                }
            }
        } else if (is_array && !(is_2d_array)) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_subtract[i] != undefined) {
                        this.array[i][i2] -= to_subtract[i]
                    }
                }
            }
        } else if (is_vector) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_subtract.data[i] != undefined) {
                        this.array[i][i2] -= to_subtract.data[i]
                    }
                }
            }
        } else if (is_array && is_2d_array) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_subtract[i][i2] != undefined) {
                        this.array[i][i2] -= to_subtract[i][i2]
                    }
                }
            }
        } else if (is_matrix) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i].length; i2++) {
                    if (to_subtract.array[i][i2] != undefined) {
                        this.array[i][i2] -= to_subtract.array[i][i2]
                    }
                }
            }
        }
    }
}
matrix.prototype.multiply = function (to_multiply) {
    var is_scalar = typeof to_multiply == "number"
    var is_vector = to_multiply instanceof vector
    var is_matrix = to_multiply instanceof matrix
    var is_array = Object.prototype.toString.call(to_multiply) == "[object Array]"
    var is_2d_array = false
    if (is_array) {
        try {
            is_2d_array = !!to_multiply[0].length
        } catch (e) {}
    }
    if (is_vector) {
        var temp = []
        for (var i = 0; i < vector.length; i++) {
            temp[i] = [to_multiply.array[i]]
        }
        to_multiply = temp
        is_vector = false
        is_2d_array = true
    }
    if (is_array && !is_2d_array) {
        var temp = []
        for (var i = 0; i < vector.length; i++) {
            temp[i] = [to_multiply[i]]
        }
        to_multiply = temp
        is_2d_array = true
    }
    var is_scalar = typeof to_multiply == "number"
    if ((is_matrix && this.n != to_multiply.m) || (is_2d_array && this.n != to_multiply.length)) {
        throw "You cannot multiply two matrices of this size"
    } else {
        if (is_scalar) {
            for (var i = 0; i < this.array.length; i++) {
                for (var i2 = 0; i2 < this.array[i2].length; i2++) {
                    this.array[i][i2] *= to_multiply
                }
            }
        } else if (is_matrix) {
            var temp = []
            for (var i = 0; i < this.m; i++) {
                temp[i] = []
                for (var i2 = 0; i2 < to_multiply.n; i2++) {
                    temp[i][i2] = 0
                    for (var i3 = 0; i3 < to_multiply.m; i3++) {
                        temp[i][i2] += this.array[i][i3] * to_multiply.array[i3][i2]
                    }
                }
            }
            this.array = temp
        } else if (is_2d_array) {
            var temp = []
            for (var i = 0; i < this.m; i++) {
                for (var i2 = 0; i2 < to_multiply.n; i2++) {
                    for (var i3 = 0; i3 < to_multiply.m; i3++) {
                        temp[i][i2] += this.array[i][i2] * to_multiply[i2][i]
                    }
                }
            }
            this.array = temp
        }
    }
}
