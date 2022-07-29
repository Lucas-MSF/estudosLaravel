<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem= $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index', compact('series','mensagem'));
    }
    public function  create()
    {
        
        return view('series.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|min:3']);
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem',"Serie {$serie->nome} inserida com sucesso.");
        return redirect()->route('listar-series');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem','Serie removida com sucesso');
        return redirect()->route('listar-series');
        

    }
}
