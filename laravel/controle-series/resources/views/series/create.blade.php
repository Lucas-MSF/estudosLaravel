@extends('layout')

@section('titulo')
    {{ $titulo }}
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="POST">

        @csrf
        @if (isset($serie->id))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col col-8">
                <label for="Nome">Nome:</label>
                <input type="text" placeholder="Insira o nome da serie" name="nome" id="Nome" class="form-control"
                    @if (isset($serie->id)) value="{{ $serie->nome }}" @endif>
            </div>
            <div class="col col-2">
                <label for="temporadas">Qnt. Temporadas:</label>
                <input type="number"  name="quantidade_temporadas" id="temporadas" class="form-control" value="1">
            </div>
            <div class="col col-2">
                <label for="epidodios">Qnt. Episodios:</label>
                <input type="number" name="quantidade_episodios" id="episodios" class="form-control" value="1">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adcionar</button>
    </form>
@endsection
