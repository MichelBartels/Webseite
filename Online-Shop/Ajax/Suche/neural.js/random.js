var random = {
    whole_number: function(start, end) {
        start = start || 0
        end = end || 1
        return Math.floor(Math.random() * (end - start + 1) + start)
    },
    decimal_number: function(start, end) {
        start = start || 0
        end = end || 1
        return Math.random() * (end - start) + start
    },
    different_probabilities: {
        own_probabilities: function(probabilities) {
            var sum = 0
            for (var i = 0; i < probabilities.length; i++) {
                sum += probabilities[i].probability
            }
            for (var i = 0; i < probabilities.length; i++) {
                probabilities[i].probability_normalized = probabilities[i].probability / sum
            }
            var index = -1
            var r = random.decimal_number(0, 1)

            while (r > 0) {
                index++
                r = r - probabilities[index].probability_normalized
            }
            return {item: probabilities[index].item,
                probability: probabilities[index].probability}
        }
    }
}
