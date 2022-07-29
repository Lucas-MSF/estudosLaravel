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
            <li class="list-group-ite d-flex justify-content-between  "> {{ $serie->nome }}
               <div class="d-flex justify-content-end">
                <form action="/series/edit/{{ $serie->id }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm"><ion-icon name="create-outline" size="small"></ion-icon></button>
                </form>
                <form action="/series/{{ $serie->id }}" method="post"
                    onsubmit="return confirm('Deseja excluir a serie {{ addslashes($serie->nome) }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <ion-icon name="trash-sharp" size="small"></ion-icon>
                    </button>
                </form>

            </div>
              
            </li>
        @endforeach
    </ul>
@endsection
