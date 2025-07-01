<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtividadeSeeder extends Seeder
{
    public function run(): void
    {
        $titulos = [
            'Reunião com cliente',
            'Análise de documentos',
            'Redação de petição inicial',
            'Elaboração de contestação',
            'Audiência de conciliação',
            'Audiência de instrução',
            'Acompanhamento de perícia',
            'Atualização processual no sistema',
            'Encaminhamento de e-mails',
            'Contato com testemunhas',
            'Estudo de jurisprudência',
            'Revisão contratual',
            'Confecção de procuração',
            'Visita técnica ao local',
            'Elaboração de parecer jurídico',
            'Reunião com equipe técnica',
            'Protocolização de recurso',
            'Consulta com cliente no escritório',
            'Defesa prévia elaborada',
            'Revisão de minuta contratual',
            'Leitura de sentença',
            'Recurso interposto',
            'Consulta telefônica com cliente',
            'Preparação de audiência',
            'Protocolo de petição intermediária',
            'Análise de decisão interlocutória',
            'Resposta a despacho',
            'Estudo do caso',
            'Revisão de provas',
            'Organização de pastas processuais',
        ];

        for ($i = 1; $i <= 47; $i++) {
            DB::table('atividades')->insert([
                'titulo' => $titulos[array_rand($titulos)],
                'descricao' => 'Atividade jurídica realizada no âmbito do caso ou processo em andamento.',
                'data_hora' => Carbon::now()->subDays(rand(1, 60))->setTime(rand(8, 17), [0, 15, 30, 45][rand(0, 3)]),
                'user_id' => rand(1, 6),
                'caso_id' => rand(1, 20),
                'processo_id' => rand(1, 20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
