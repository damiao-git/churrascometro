<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateChurrasco;
use App\Models\Churrasco;
use Illuminate\Http\Request;

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

        return view('show', compact('churrasco'));
    }


    public function create()
    {
        return view('create');
    }


    public function edit($id)
    {

        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->route('churrasco.index');
        }

        return view('edit', compact('churrasco'));

    }

    public function update(StoreUpdateChurrasco $request,$id)
    {

        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->back();
        }

        $churrasco->update($request->all());

        return redirect()->route('churrasco.index')->with('message', 'Registro atualizado com sucesso!');;

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

        return redirect()->route('churrasco.index')->with('message', 'Registro deletado com sucesso!');;

    }

    public function search(Request $request)
    {

        $data = explode('/', $request->search);

        $data_formatada = $data[2].'-'.$data[1].'-'.$data[0];

        $churrascos = Churrasco::where('local', 'LIKE', "%{$request->search}%")
        ->orWhere('data', '=', $data_formatada)->paginate();

        // if(!$churrascos)
        //     redirect()->back()-with('message', 'Dados não encontrados');

        return view('index', compact('churrascos'));

    }

}
