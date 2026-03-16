<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Guia;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class GuiaProcesoController extends Controller
{
    public function seleccionarDireccion(Request $request, Guia|null $guia)
    {
        $buscar = $request->get('buscar');

        $direcciones = Direccion::join('socios', 'direcciones.socio_id', '=', 'socios.id')
        ->select('direcciones.*', 'socios.nombre') // Evita colisión de IDs
        ->where(function ($query) use ($buscar) {
            $query->where('direcciones.calle', 'like', "%{$buscar}%")
            ->orWhere('direcciones.prellenados', 'like', "%{$buscar}%")
            ->orWhere('socios.nombre', 'like', "%{$buscar}%");
        })
        ->with('socio')
        ->limit(25)
        ->get();

        $direccionesAgrupadosSocio = $direcciones->groupBy('socio_id');
            
        return view('guias.proceso.seleccionar-direccion', [
            'direcciones' => $direcciones,
            'direccionesAgrupadosSocio' => $direccionesAgrupadosSocio,
            'guia' => $guia,
            'request' => $request,
        ]);
    }

    public function imprimirEtiqueta(Guia $guia)
    {
        return view('guias.proceso.imprimir-etiqueta', [
            'barcode' => (new DNS1D)->getBarcodeSVG($guia->numero_rastreo_usa, 'C128', 2, 60, 'black', true),
            'guia' => $guia,
        ]);
    }
}
