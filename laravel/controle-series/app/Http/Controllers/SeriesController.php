<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = ['Modern Family', 'Friends', 'The boys', 'Supernatural'];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li> $serie </li>";
        }
        $html .= '</ul>';
        return view('series.index', compact('series'));
    }
    public function  create ()
    {
        $titulo='Nova serie';
        return view('series.create');
    }
}
