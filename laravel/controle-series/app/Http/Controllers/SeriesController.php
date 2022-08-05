<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Mail\NovaSerie;
use Illuminate\Http\Request;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SeriesFormRequest;

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
       

        $this->enviaEmail($request->nome, $request->quantidade_temporadas, $request->quantidade_episodios,$request->user()->name,$request->user()->email);
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
    private function enviaEmail(string $nome,int $quantidade_temporadas, int $quantidade_episodios, string $nomeUser , string $emailUser)
    {

        $email= new NovaSerie($nome,$quantidade_temporadas,$quantidade_episodios);
    
        $email->subject('Nova série adcionada');
        $user= (object)[
            'email'=> $emailUser,
            'name' => $nomeUser
        ];
        return Mail::to($user)->send($email);
    }
}
