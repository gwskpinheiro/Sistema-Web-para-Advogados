<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Processo;

class ProcessoSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            Processo::factory()->count(rand(1, 5))->create([
                'cliente_id' => $cliente->id,
            ]);
        }
    }
}
