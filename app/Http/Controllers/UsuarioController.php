<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::paginate();

        return view('usuario/index', compact('usuarios'));
    }
    public function create()
    {
        return view('usuario.create');
    }
    public function store(Request $request)
    {
        // Usuario::create($request->all());
        // return redirect()->route('usuario.index')->with('message', 'Registro salvo com sucesso!');;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:usuarios|max:100',
            'password' => 'required|min:6|max:50',
            'cpassword' => 'required|min:6|max:50|same:password',
        ], [
            'name.required' => 'O campo NOME precisa ser preenchido',
            'name.max' => 'O campo NOME precisa ter no maximo 50 caracteres',
            'email.required' => 'O campo EMAIL precisa ser preenchido',
            'password.required' => 'O campo SENHA precisa ser preenchido',
            'cpassword.required' => 'O campo CONFIRME SENHA precisa ser preenchido',
            'cpassword.same' => 'SENHA não confere',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $usuario = new Usuario();
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->pass);
            $usuario->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Registrado com sucesso!'
            ]);
        }
    }

    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return redirect()->route('usuario.index');
        }
        return view('usuario.show', compact('usuario'));
    }
    public function edit(string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->route('usuario.index');
        }

        return view('usuario.edit', compact('usuario'));
    }
    public function update(Request $request, string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->back();
        }

        $usuario->update($request->all());

        return redirect()->route('usuario.index')->with('message', 'Registro atualizado com sucesso!');
    }
    public function destroy(string $id)
    {
        if (!$usuario = Usuario::find($id)) {
            return redirect()->back();
        }

        $usuario->delete();

        return redirect()->route('usuario.index')->with('message', 'Registro deletado com sucesso!');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function forgot()
    {
        return view('auth.forgot');
    }
    public function reset()
    {
        return view('auth.reset');
    }
}
