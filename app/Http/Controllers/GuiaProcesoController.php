<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Guia;
use Illuminate\Http\Request;

class GuiaProcesoController extends Controller
{
    public function seleccionarDireccion(Request $request)
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
            'guia' => Guia::find($request->get('guia')),
            'request' => $request,
        ]);
    }
}
