@extends('layout')

@section('titulo')
    Series
@endsection
@section('conteudo')
    @if (isset($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif
    <a href="{{route('form-criar-serie')}}" class="btn btn-dark mb-2">Adcionar</a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> {{ $serie->nome }}
            <form action="/series/{{$serie->id}}" method="post" onsubmit="return confirm('Deseja excluir a serie {{addslashes($serie->nome)}}?')">
        
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><ion-icon name="trash-sharp" size="small"></ion-icon></button>
            </form>
            </li>
        @endforeach
    </ul>
@endsection
