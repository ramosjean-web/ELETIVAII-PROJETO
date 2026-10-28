<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();

        return view('ingredientes.index', compact('ingredientes'));
    }

    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:45'
        ]);

        Ingrediente::create([
            'nome' => $request->nome
        ]);

        return redirect()
            ->route('ingredientes.index')
            ->with('mensagem', 'Ingrediente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);

        return view('ingredientes.show', compact('ingrediente'));
    }

    public function edit(string $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);

        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|max:45'
        ]);

        $ingrediente = Ingrediente::findOrFail($id);

        $ingrediente->update([
            'nome' => $request->nome
        ]);

        return redirect()
            ->route('ingredientes.index')
            ->with('mensagem', 'Ingrediente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);

        $ingrediente->delete();

        return redirect()
            ->route('ingredientes.index')
            ->with('mensagem', 'Ingrediente excluído com sucesso!');
    }
}