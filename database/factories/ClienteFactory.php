<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf_cnpj' => $this->faker->unique()->numerify('###.###.###-##'),
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'endereco' => $this->faker->address,
        ];
    }
}
