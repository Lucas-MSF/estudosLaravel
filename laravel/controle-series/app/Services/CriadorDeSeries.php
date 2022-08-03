<?php

namespace App\Services;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSeries
{
    public function criarSerie(string $nomeSerie, int $quantidade_temporadas, int $epPorTemporada)
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporada($quantidade_temporadas, $epPorTemporada, $serie);
        DB::commit();
        return $serie;
    }
    private function criaTemporada($quantidade_temporadas, $epPorTemporada, &$serie)
    {
        for ($i = 1; $i <= $quantidade_temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }
    private function criaEpisodios($epPorTemporada, &$temporada)
    {
        for ($j = 0; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
