<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use App\Services\CriadorDeSeries;
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
    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {

        $serie = $criadorDeSeries->criarSerie($request->nome, $request->quantidade_temporadas, $request->quantidade_episodios);
        $request->session()->flash('mensagem', "Serie {$serie->nome} inserida com sucesso.");
        return redirect()->route('listar-series');
    }
    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
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
