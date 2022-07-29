@extends('layout')

@section('titulo')
    Adcionar Serie
@endsection

@section('conteudo')
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nome">Nome:</label>
            <input type="text" name="nome" id="Nome" class="form-control">
        </div>
        <button class="btn btn-primary">Adcionar</button>
    </form>
@endsection
