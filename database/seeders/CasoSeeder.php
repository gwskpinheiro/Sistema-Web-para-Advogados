<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CasoSeeder extends Seeder
{
    public function run(): void
    {
        $titulos = [
            'Ação de Cobrança',
            'Inventário e Partilha',
            'Revisão de Contrato Bancário',
            'Ação de Indenização por Danos Morais',
            'Rescisão de Contrato de Locação',
            'Ação de Guarda de Menor',
            'Ação de Pensão Alimentícia',
            'Ação Trabalhista contra Ex-empregador',
            'Ação de Usucapião',
            'Regularização de Imóvel',
            'Ação de Obrigação de Fazer',
            'Defesa em Processo Criminal',
            'Reintegração de Posse',
            'Reconhecimento de União Estável',
            'Ação de Despejo por Falta de Pagamento',
            'Ação Monitória',
            'Cancelamento de Protesto Indevido',
            'Ação de Alvará Judicial',
            'Ação de Execução Fiscal',
            'Dissolução de Sociedade Empresarial'
        ];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('casos')->insert([
                'titulo' => $titulos[$i - 1],
                'descricao' => 'Descrição detalhada do caso "' . $titulos[$i - 1] . '".',
                'cliente_id' => rand(1, 10),
                'created_at' => Carbon::now()->subDays(rand(0, 90)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
