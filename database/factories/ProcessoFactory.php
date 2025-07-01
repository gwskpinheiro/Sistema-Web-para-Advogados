<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_processo' => $this->faker->unique()->numerify('#####-##.####.#.##.####'),
            'descricao' => $this->faker->sentence(),
        ];
    }
}
