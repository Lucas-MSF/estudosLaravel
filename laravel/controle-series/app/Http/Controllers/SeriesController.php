<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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
    public function store(SeriesFormRequest $request)
    {
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
    public function update(SeriesFormRequest $request, $id)
    {
        $serie= Serie::find($id);
        $serie->nome= $request->input('nome');
        $serie->update();
        $request->session()->flash('mensagem','Serie Alterada com sucesso!');
        return redirect()->route('listar-series');

    }
}
