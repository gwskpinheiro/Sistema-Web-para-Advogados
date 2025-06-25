<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{

    function emitirRelatorio(){

        $dompdf = new Dompdf();

        $dados = ['curso'=> 'Análise e Desenvolvimento de Sistemas',
                'alunos'=>['joao','luana','russi'],
                'duração' => 4
            ];

        $html = View::make('relatorio.curso', ['dados' => $dados])->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }

}


// $html = View::make('relatorios.vendas', $dados)->render();
// return $dompdf->stream("relatorio.pdf", ["Attachment" => false]);
