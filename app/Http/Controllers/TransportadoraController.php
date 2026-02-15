<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransportadoraRequest;
use App\Http\Requests\UpdateTransportadoraRequest;
use App\Models\Transportadora;

class TransportadoraController extends Controller
{
    public function index()
    {
        return view('transportadoras.index', [
            'transportadoras' => Transportadora::all(),
        ]);
    }

    public function create()
    {
        return view('transportadoras.create', [
            'transportadora' => new Transportadora,
        ]);
    }

    public function store(StoreTransportadoraRequest $request)
    {
        $transportadora = Transportadora::create($request->validated());

        if(! $transportadora instanceof Transportadora ) {
            return back()->with('error', 'Error al guardar la transportadora, intente nuevamente');
        }

        return redirect()->route('transportadoras.index')->with('success', sprintf('Transportadora %s guardada', $transportadora->nombre));
    }

    public function show(Transportadora $transportadora)
    {
        return view('transportadoras.show', [
            'transportadora' => $transportadora,
        ]);
    }

    public function edit(Transportadora $transportadora)
    {
        return view('transportadoras.edit', [
            'transportadora' => $transportadora,
        ]);
    }

    public function update(UpdateTransportadoraRequest $request, Transportadora $transportadora)
    {
        if(! $transportadora->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar la transportadora, intente nuevamente');
        }
            
        return back()->with('success', sprintf('Transportadora %s actualizada', $transportadora->nombre));
    }

    public function destroy(Transportadora $transportadora)
    {
        //
    }
}
