<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRegistroMexRequest;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroMex extends Controller
{
    public function search(Request $request)
    {
        if( $request->has('guia') )
        {
            // $guia = Guia::where('numero_rastreo_usa', $request->input('guia'))
            // ->orWhere('numero_rastreo_mex', $request->input('guia'))
            // ->orWhere('numero_rastreo_origen', $request->input('guia'))
            // ->first();

            $guia = Guia::where('numero_rastreo_usa', $request->input('guia'))->first();

            if( $guia ) {
                return redirect()->route('registros.mex.edit', $guia);
            }
        }

        return view('registros-mex.search', [
            'request' => $request,
            'guia' => isset($guia) ? $guia : new Guia,
        ]);
    }

    public function edit(Guia $guia)
    {
        return view('registros-mex.edit')->with('guia', $guia);
    }

    public function update(UpdateRegistroMexRequest $request, Guia $guia)
    {
        $guia->registro_salida = $request->input('registro_salida');
        $guia->fecha_salida = now();
        $guia->salida_por_usuario = Auth::id();
        $guia->status = GuiaStatusEnum::TRANSITO;

        if(! $guia->save() ) {
            return back()->with('error', 'Error al actualizar el registro de salida de guía');
        }

        return redirect()->route('registros.mex.search')->with('success', sprintf('Registro de salida de guía #%s actualizado', $guia->numero_rastreo_usa));
    }
}
