<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::paginate();

        return view('usuario/index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usuario::create($request->all());
        return redirect()->route('usuario.index')->with('message', 'Registro salvo com sucesso!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);



        if (!$usuario) {
            return redirect()->route('usuario.index');
        }

        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->route('usuario.index');
        }

        return view('usuario.edit', compact('usuario'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->back();
        }

        $usuario->update($request->all());

        return redirect()->route('usuario.index')->with('message', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->back();
        }

        $usuario->delete();

        return redirect()->route('usuario.index')->with('message', 'Registro deletado com sucesso!');
    }
}
