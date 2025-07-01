<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::factory()->count(10)->create();
    }
}
