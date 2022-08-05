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
    <form action="" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col col-8">
                <label for="Nome">Nome:</label>
                <input type="text" placeholder="Insira o nome da serie" name="nome" id="Nome" class="form-control">
            </div>



            <div class="col col-2">
                <label for="temporadas">Qnt. Temporadas:</label>
                <input type="number" name="quantidade_temporadas" id="temporadas" class="form-control" value="1">
            </div>
            <div class="col col-2">
                <label for="epidodios">Qnt. Episodios:</label>
                <input type="number" name="quantidade_episodios" id="episodios" class="form-control" value="1">
            </div>

        </div>
        <div class="row mt-2">
            <div class="input-group mb-3 col col-8">
                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                <input type="file" class="form-control" id="inputGroupFile01" name="capa">
              </div>
        </div>
        <button class="btn btn-primary mt-2">Adcionar</button>
    </form>
@endsection
