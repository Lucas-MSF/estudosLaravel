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
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }
    public function  create()
    {
        $titulo = 'Adcionar serie';
        return view('series.create', compact('titulo'));
    }
    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create(['nome' => $request->nome]);
        $qntTemporadas = $request->quantidade_temporadas;
        for ($i = 1; $i <= $qntTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 0; $j <= $request->quantidade_episodios; $j++) {
                $temporada->episodio()->create(['numero' => $j]);
            }
        }

        $request->session()->flash('mensagem', "Serie {$serie->nome} inserida com sucesso.");
        return redirect()->route('listar-series');
    }
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', 'Serie removida com sucesso');
        return redirect()->route('listar-series');
    }
    public function edit(Request $request)
    {
        $titulo = 'Alterar serie';
        $serie = Serie::find($request->id);
        return view('series.create', compact('serie', 'titulo'));
    }

    public function update(SeriesFormRequest $request, $id)
    {

        Serie::find($id)->update(['nome' => $request->nome]);
        $request->session()->flash('mensagem', 'Serie Alterada com sucesso!');
        return redirect()->route('listar-series');
    }
}
