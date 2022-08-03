@extends('layout')

@section('titulo')
    {{$serie->nome}}: Temporadas
@endsection
@section('conteudo')
<ul class="list-group">
    @foreach ($temporadas as $temporada)
        <li class="list-group-item ">Temporada {{ $temporada->numero }}
    @endforeach

@endsection