<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use Illuminate\Http\Request;

class GuiaImpresionController extends Controller
{
    public function imprimir(Guia $guia)
    {
        return view('guias.imprimir', ['guia' => $guia]);
    }
}
