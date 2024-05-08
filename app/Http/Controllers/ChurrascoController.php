<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateChurrasco;
use App\Models\Churrasco;
use Illuminate\Http\Request;

use function Laravel\Prompts\confirm;

class ChurrascoController extends Controller
{
    public function index()
    {
        $churrascos = Churrasco::paginate();

        return view('index', compact('churrascos'));
    }


    public function show($id)
    {
        // $post = Post::where('id', $id)->first();
        $churrasco = Churrasco::find($id);



        if (!$churrasco) {
            return redirect()->route('churrasco.index');
        }

        return view('churrasco.show', compact('churrasco'));
    }


    public function create()
    {
        return view('churrasco.create');
    }


    public function edit($id)
    {

        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->route('churrasco.index');
        }

        return view('churrasco.edit', compact('churrasco'));
    }

    public function update(StoreUpdateChurrasco $request, $id)
    {

        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->back();
        }

        $churrasco->update($request->all());

        return redirect()->route('churrasco.index')->with('message', 'Registro atualizado com sucesso!');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        Churrasco::create($request->all());
        return redirect()->route('churrasco.index')->with('message', 'Registro salvo com sucesso!');;
    }

    public function delete($id)
    {


        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->back();
        }

        $churrasco->delete();

        return redirect()->route('churrasco.index')->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $churrascos = Churrasco::where('local', 'LIKE', "%{$request->search}%")
            ->paginate();

        // if(!$churrascos)
        //     redirect()->back()-with('message', 'Dados não encontrados');

        return view('churrasco.index', compact('churrascos'));
    }
    public static function calcularCarne($quantidade)
    {
        $minimo = $quantidade * 300 / 1000;
        $maximo = $quantidade * 700 / 1000;
        return "Entre {$minimo}Kg e {$maximo}Kg de carne";
    }
    public static function calcularBebida($quantidade)
    {
        return "Em média {$quantidade}L de bebida";
    }
}
