<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index')->with('pessoas', $pessoas);
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {

        // Pessoa::create([
        //     'nome' => $request->nome,
        //     'idade' => $request->idade,
        //     'cpf' => $request->cpf,
        // ]);

        // DB::table('pessoas')->insert([
        //     'nome' => $request->nome,
        //     'idade' => $request->idade,
        //     'cpf' => $request->cpf,
        // ]);

        //Pessoa::create($request->all());

        $nome = $request->nome;
        $idade = $request->idade;
        $cpf = $request->cpf;

        $pessoa = new Pessoa();
        $pessoa->nome = $nome;
        $pessoa->idade = $idade;
        $pessoa->cpf = $cpf;

        $pessoa->save();

        // return view('pessoas.index');
        return redirect()->route('pessoas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $pessoa = Pessoa::find($id);

        if(isset($pessoa)){
            $pessoa->nome = $request->nome;
            $pessoa->idade = $request->idade;
            $pessoa->cpf = $request->cpf;

            $pessoa->save();

            return redirect()->route('pessoas.index');
        }
        return '<h1>Não foi possível atualizar!</h1>';
    }

    public function destroy(string $id)
    {
        $pessoa = Pessoa::find($id);

        if (isset($pessoa)){
            $pessoa->delete();
            return '<h1>Registro excluído!</h1>';
        }

        return '<h1>Não consseguiu ser excluído!</h1>';

    }
}
