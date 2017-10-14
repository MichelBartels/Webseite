var create_gene = function(genes_to_combine, variation) {
    if (typeof genes_to_combine == "undefined") {
        var gene = ""
        for (var i = 0; i < 12; i++) {
            gene += String.fromCharCode(Math.floor(Math.random() * 58 + 65))
        }
    } else {
        var gene = []
        for (var i = 0; i < 12; i++) {
            if (Math.random() < variation) {
                gene[i] = String.fromCharCode(Math.floor(Math.random() * 103 + 20))
            }
            else {
                if (i < 6) {
                    gene[i] = genes_to_combine[0][i]
                } else {
                    gene[i] = genes_to_combine[1][i]
                }
            }
        }
        gene = gene.join("")
    }
    return gene
}
var fitness = function(gene) {
    var fitness_ = 0
    for (var i = 0; i < 12; i++) {
        if (gene[i] == "Coming soon."[i]) {
            fitness_++
        }
    }
    return Math.pow(30, fitness_) - 1
}
var output_best_fitness = function(gene) {
    document.getElementById("best_fitness").innerHTML = gene
}
var setup = function() {
    typing(10, "Making new population\n", document.getElementById("console"), function() {
        evolution_test = new evolution(0.01, 1000, fitness, create_gene, 2, Math.pow(30, 12) - 1, output_best_fitness, function(text) {typing(1, text, document.getElementById("console"))})
    })
}
