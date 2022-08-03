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
            <li class="list-group-item d-flex justify-content-between align-items-center ">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            editar
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex  align-items-center">
                  
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                        <ion-icon name="create-outline" size="small"></ion-icon>
                    </button>


                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1 ">
                        <ion-icon name="eye-outline" size="small"></ion-icon>
                    </a>

                    <form  action="/series/{{ $serie->id }}" method="post"
                        onsubmit="return confirm('Deseja excluir a serie {{ addslashes($serie->nome) }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-3 ">
                            <ion-icon name="trash" size="small"></ion-icon>
                        </button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>
@endsection
<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId) {
        let formData = new FormData();

        const nome = document
            .querySelector(`#input-nome-serie-${serieId} > input`)
            .value;

        const token = document
            .querySelector(`input[name="_token"]`)
            .value;

        formData.append('nome', nome);
        formData.append('_token', token);

        const url = `/series/${serieId}/editNome`;
       
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(serieId);
            document
            .getElementById(`nome-serie-${serieId}`)
            .textContent = nome;
        });
    }
</script>
