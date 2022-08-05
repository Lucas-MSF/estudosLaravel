<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    
    public function index(Request $request)
    {
        
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }
    public function  create()
    {
        $titulo = 'Adcionar serie';
        return view('series.create', compact('titulo'));
    }
    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {


        $serie = $criadorDeSeries->criarSerie($request->nome, $request->quantidade_temporadas, $request->quantidade_episodios);
        $request->session()->flash('mensagem', "Serie {$serie->nome} inserida com sucesso.");
        return redirect()->route('listar-series');
    }
    public function destroy(Request $request, RemovedorDeSeries $removedorDeSeries)
    {
        $serie = $removedorDeSeries->removerSerie($request->id);
        $request->session()->flash('mensagem', "Serie {$serie} removida com sucesso");
        return redirect()->route('listar-series');
    }
    public function edit(int $id, Request $request)
    {

        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
