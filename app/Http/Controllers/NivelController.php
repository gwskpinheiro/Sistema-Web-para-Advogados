<?php

namespace App\Http\Controllers;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::all();
        return view('niveis.index')->with(['niveis'=>$niveis]);
    }
   public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome'=>'required|string|min:3']);

        Nivel::create($request->all());
        return redirect()->route('niveis.index')->with('success', 'Nivel created successfully.');
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
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
