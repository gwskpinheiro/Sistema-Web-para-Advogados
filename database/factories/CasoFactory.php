<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CasoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph(),
        ];
    }
}
