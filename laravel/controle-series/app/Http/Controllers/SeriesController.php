<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function listarSeries()
    {
        $series = ['Modern Family', 'Friends', 'The boys', 'Supernatural'];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li> $serie </li>";
        }
        $html .= '</ul>';

        return $html;
    }
}
