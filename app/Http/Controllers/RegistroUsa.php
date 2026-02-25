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
                return back()->with('error', sprintf('Error al guardar rastreo en USA: %s', $request->input('numero_rastreo_usa')));
            }

            return redirect()->route('registros.usa.create')->with('success', sprintf('Rastreo en USA ha sido guardado: %s', $guia->numero_rastreo_usa));
        }

        if(! $guia->update($request->validated()) ) {
            return back()->with('error', sprintf('Error al actualizar rastreo en USA: %s', $guia->numero_rastreo_usa));
        }

        return redirect()->route('registros.usa.create')->with('success', sprintf('Rastreo en USA ha sido actualizado: %s', $guia->numero_rastreo_usa));
    }
}
