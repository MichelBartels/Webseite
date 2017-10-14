var evolution = function(variation, population_size, fitness_function, create_gene, number_of_combined, max_fitness, output_best_fitness, output_method) {
    this.variation = variation
    this.population_size = population_size
    this.fitness_function = fitness_function
    this.create_gene = create_gene
    this.fitness = 0
    this.max_fitness = max_fitness
    this.population = []
    this.population_fitness = []
    this.evolution_period = 0
    this.run = function () {
        this.population = []
        this.genes_to_combine = this.genes_to_combine_
        this.genes_to_combine_ = [[0, 0]]
        this.best_fitness = {
            item: "",
            fitness: 0
        }
        for (var i = 0; i < this.population_size; i++) {
            this.population[i] = {}
            if (this.evolution_period == 0) {
                this.population[i].item = this.create_gene()
            } else {
                this.population[i].item = this.create_gene([this.parents[0].item, this.parents[1].item], variation)
            }
            this.population[i].probability = this.fitness_function(this.population[i].item)
            if (this.population[i].probability > this.best_fitness.fitness) {
                this.best_fitness.item = this.population[i].item
                this.best_fitness.fitness = this.population[i].probability
            }
            if (this.population[i].probability == this.max_fitness) {
                clearInterval(timeout)
            }
        }
        var a = random.different_probabilities.own_probabilities(this.population)
        var b = random.different_probabilities.own_probabilities(this.population)
        this.parents = [
            {
                item: a.item,
                fitness: a.probability
            },
            {
                item: b.item,
                fitness: b.probability
            }
        ]
        output_best_fitness(this.best_fitness.item)
        if (this.evolution_period % 100 == 0) {
            output_method("Best fitness of all children in this population: " + this.best_fitness.fitness + "\n")
        }
//        output_method("Best fitness of all children in this population: " + this.best_fitness.fitness)
        this.evolution_period++
    }
    timeout = setInterval(this.run.bind(this), 1)
}
