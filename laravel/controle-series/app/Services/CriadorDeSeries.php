<?php

namespace App\Services;

use App\Models\Serie;

class CriadorDeSeries
{
    public function criarSerie(string $nomeSerie, int $quantidade_temporadas, int $epPorTemporada )
    {
        $serie = Serie::create(['nome' => $nomeSerie]);
        $qntTemporadas = $quantidade_temporadas;
        for ($i = 1; $i <= $qntTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j = 0; $j <= $epPorTemporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return $serie;
    }
}