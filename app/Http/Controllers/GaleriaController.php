<?php

namespace App\Http\Controllers;

use App\Models\Galeria;

class GaleriaController extends Controller
{
    public function index()
    {
        $galerias = Galeria::latest()->get();

        return view('galeria.index', compact('galerias'));
    }
}