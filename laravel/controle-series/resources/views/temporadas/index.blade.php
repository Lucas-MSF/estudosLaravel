@extends('layout')

@section('titulo')
    {{ $serie->nome }}: Temporadas
@endsection
@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{$temporada->id}}/episodios">
                    Temporada {{ $temporada->numero }}
                </a>
                <span class="badge badge-secondary">
                    {{$temporada->getEpisodiosAssistidos()->count()}}/{{$temporada->episodios->count()}}
                </span>
        @endforeach
    @endsection
