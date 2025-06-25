<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    //

    public function create(){
        return view('documentos.create');
    }

    public function store(Request $request){

        // dd($request);
        $request->validate([
            'documento' => 'required|file|mimes:pdf|',//max:2048',
        ]);

        $caminho = $request->file('documento')->store('documentos',
        'public');

        // não é a melhor prática, mas para fins de teste ok! por causa da porta hardcoded
        $caminho = env('APP_URL').':8000'.'/storage/'.$caminho;

        return
            redirect()->route('documentos.create')->with('mensagem', 'Documento
            enviado com sucesso! Caminho: ' . $caminho);
    }
}
