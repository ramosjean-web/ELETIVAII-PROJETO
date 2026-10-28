<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'senha' => 'required|max:255'
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'senha' => $request->senha
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('mensagem', 'Usuário cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'senha' => 'required|max:255'
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'senha' => $request->senha
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('mensagem', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('mensagem', 'Usuário excluído com sucesso!');
    }
}