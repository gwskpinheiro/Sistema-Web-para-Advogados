<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProcessoSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('processos')->insert([
                'numero_processo' => '2025'.str_pad((string)$i, 6, '0', STR_PAD_LEFT),
                'descricao' => 'Processo judicial relacionado à demanda nº '.$i,
                'cliente_id' => rand(1, 10),
                'created_at' => Carbon::now()->subDays(rand(0, 90)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
