<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Caso;
use App\Models\Processo;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    $this->call([
         AtividadeSeeder::class,
    ]);
}
}
