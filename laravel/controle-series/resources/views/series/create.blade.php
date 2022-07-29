@extends('layout')

@section('titulo')
    Adcionar Serie
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
        <div class="form-group">
            <label for="Nome">Nome:</label>
            <input type="text" name="nome" id="Nome" class="form-control">
        </div>
        <button class="btn btn-primary">Adcionar</button>
    </form>
@endsection
