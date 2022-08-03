<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSeries
{
    public function removerSerie(int $id)
    {
        $nomeSerie = '';
        DB::transaction(function () use (&$nomeSerie, $id) {
            $serie = Serie::find($id);
            $nomeSerie = $serie->nome;
            $this->removerTemporada($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }
    private function removerTemporada(Serie $serie)
    {

        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
    }
    private function removerEpisodio(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
