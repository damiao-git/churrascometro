<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateChurrasco;
use App\Models\Churrasco;
use Illuminate\Http\Request;

class ChurrascoController extends Controller
{
    public function index()
    {
        $churrascos = Churrasco::get();

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

        return redirect()->route('churrasco.index');

    }


    public function store(Request $request)
    {

        Churrasco::create($request->all());
        return redirect()->route('churrasco.index');
    }

    public function delete($id)
    {

        if (!$churrasco = Churrasco::find($id)) {
            return redirect()->back();
        }

        $churrasco->delete();

        return redirect()->route('churrasco.index');

    }

}
