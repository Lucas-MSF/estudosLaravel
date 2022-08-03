@extends('layout')

@section('titulo')
    Episodios
@endsection
@section('conteudo')
    <form action="/temporadas/{{$temporadaid}}/episodios/assistir" method="POST">
        @csrf
        @php
          
        @endphp
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    episodio {{ $episodio->numero }}
                    <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{$episodio->assistido ? 'checked' : ''}}>
                </li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-end mt-2 mb-2">
            <button class="btn btn-primary   ">Salvar</button>
        </div>
    </form>
@endsection
