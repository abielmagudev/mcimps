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
        $guia = Guia::where('numero_rastreo_usa', $request->input('guia'))->first();

        if( $guia && $guia->exists() ) {
            return redirect()->route('registros.mex.edit', $guia);
        }

        return view('registros-mex.search', [
            'request' => $request,
        ]);
    }

    public function edit(Guia $guia)
    {
        return view('registros-mex.edit')->with('guia', $guia);
    }

    public function update(UpdateRegistroMexRequest $request, Guia $guia)
    {
        $guia->status = GuiaStatusEnum::INGRESO->value;

        if( ! $guia->save() ) {
            return back()->with('error', sprintf('Error al registrar de número de rastreo en México [%s]', $guia->numero_rastreo_usa));
        }

        return redirect()->route('registros.mex.search')->with('success', sprintf('Registro de número de rastroe en México [%s]', $guia->numero_rastreo_usa));
    }
}
