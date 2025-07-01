<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Caso;

class CasoSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            Caso::factory()->count(rand(1, 5))->create([
                'cliente_id' => $cliente->id,
            ]);
        }
    }
}
