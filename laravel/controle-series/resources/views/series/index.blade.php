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
    <a href="{{ route('form-criar-serie') }}" class="btn btn-dark mb-2">Adcionar</a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-ite d-flex justify-content-between mt-2 "> {{ $serie->nome }}
               <span class="d-flex">
                <form action="/series/edit/{{ $serie->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm mr-1"><ion-icon name="create-outline" size="small"></ion-icon></button>
                </form>
                <form action="/series/{{ $serie->id }}" method="post"
                    onsubmit="return confirm('Deseja excluir a serie {{ addslashes($serie->nome) }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mr-1">
                        <ion-icon name="trash-sharp" size="small"></ion-icon>
                    </button>
                </form>
                <a href="#" class="btn btn-info btn-sm mr-1">sei la</a>

            </span>
              
            </li>
        @endforeach
    </ul>
@endsection
