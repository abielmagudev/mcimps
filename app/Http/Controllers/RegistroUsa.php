<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroUsaRequest;
use App\Models\Guia;
use Illuminate\Http\Request;

class RegistroUsa extends Controller
{
    public function create()
    {
        return view('registros-usa.create');
    }

    public function store(StoreRegistroUsaRequest $request)
    {
        $guia = Guia::where('numero_rastreo_usa', $request->input('numero_rastreo_usa'))->first();

        if( is_null($guia) )
        {
            if( ! $guia = Guia::create($request->validated()) ) {
                return back()->with('error', 'Error al guardar el número de rastreo en USA');
            }

            return redirect()->route('registros.usa.create')->with('success', 'Número de rastreo en USA ha sido guardado');
        }

        if(! $guia->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar el número de rastreo en USA');
        }

        return redirect()->route('registros.usa.create')->with('success', 'Número de rastreo en USA ha sido actualizado');
    }
}
