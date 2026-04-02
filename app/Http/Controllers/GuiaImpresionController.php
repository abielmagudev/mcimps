<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class GuiaImpresionController extends Controller
{
    public function etiqueta(Guia $guia)
    {
        return view('guias.imprimir.etiqueta', [
            'barcode' => (new DNS1D)->getBarcodeSVG($guia->numero_rastreo_usa, 'C128', 2, 60, 'black', true),
            'guia' => $guia,
        ]);
    }
}
