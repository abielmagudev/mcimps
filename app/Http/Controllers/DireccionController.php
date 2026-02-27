<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Models\Cliente;
use App\Models\Direccion;
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

    public function create(Cliente $cliente)
    {
        return view('direcciones.create', [
            'cliente' => $cliente,
            'direccion' => new Direccion,
        ]);
    }

    public function store(StoreDireccionRequest $request, Cliente $cliente)
    {
        $direccion = $cliente->direcciones()->create($request->validated());

        if(! $direccion instanceof Direccion ) {
            return back()->with('error', 'Error al guardar la dirección, intente nuevamente');
        }

        $guia = Guia::find($request->get('guia'));

        $url = $guia instanceof Guia ? 
        route('guias.edit', [$guia, 'direccion' => $direccion->id]) : 
        route('guias.create', ['direccion' => $direccion->id]);

        return redirect($url)->with('success', sprintf('Dirección %s guardada para cliente %s', $direccion->calle, $cliente->nombre_completo));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente, Direccion $direccion)
    {
        //
    }

    public function edit(Cliente $cliente, Direccion $direccion)
    {
        return view('direcciones.edit', [
            'cliente' => $cliente,
            'direccion' => $direccion,
        ]);
    }

    public function update(UpdateDireccionRequest $request, Cliente $cliente, Direccion $direccion)
    {
        if(! $direccion->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar la dirección, intente nuevamente');
        }
            
        return back()->with('success', sprintf('Dirección %s actualizada', $direccion->calle));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente, Direccion $direccion)
    {
        //
    }
}
