<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Models\Socio;
use App\Models\Direccion;
use App\Models\Direccion\DireccionCoberturaEnum;
use App\Models\Guia;
use GuzzleHttp\Client;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Socio $socio)
    {
        return view('direcciones.create', [
            'socio' => $socio,
            'direccion' => new Direccion,
            'coberturas' => DireccionCoberturaEnum::cases(),
        ]);
    }

    public function store(StoreDireccionRequest $request, Socio $socio)
    {
        $direccion = $socio->direcciones()->create($request->validated());

        if(! $direccion instanceof Direccion ) {
            return back()->with('error', 'Error al guardar la dirección, intente nuevamente');
        }

        $guia = Guia::find($request->get('guia'));

        $url = $guia instanceof Guia ? 
        route('guias.edit', [$guia, 'direccion' => $direccion->id]) : 
        route('guias.create', ['direccion' => $direccion->id]);

        return redirect($url)->with('success', sprintf('Dirección %s guardada para Socio %s', $direccion->calle, $socio->nombre));
    }

    /**
     * Display the specified resource.
     */
    public function show(Socio $socio, Direccion $direccion)
    {
        //
    }

    public function edit(Socio $socio, Direccion $direccion)
    {
        return view('direcciones.edit', [
            'socio' => $socio,
            'direccion' => $direccion,
            'coberturas' => DireccionCoberturaEnum::cases(),
        ]);
    }

    public function update(UpdateDireccionRequest $request, Socio $socio, Direccion $direccion)
    {
        if(! $direccion->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar la dirección, intente nuevamente');
        }
            
        return back()->with('success', sprintf('Dirección %s actualizada', $direccion->calle));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Socio $socio, Direccion $direccion)
    {
        //
    }
}
