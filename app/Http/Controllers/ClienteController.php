<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return view('clientes.index', [
            'clientes' => Cliente::all()->sortByDesc('id'),
        ]);
    }

    public function create()
    {
        return view('clientes.create', [
            'cliente' => new Cliente,
        ]);
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        if(! $cliente instanceof Cliente ) {
            return back()->with('error', 'Error al guardar el cliente, intente nuevamente');
        }

        return redirect()->route('clientes.index')->with('success', sprintf('Cliente %s guardado', $cliente->nombre_completo));
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
            'cliente' => $cliente,
        ]);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente,
        ]);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        if(! $cliente->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar el cliente, intente nuevamente');
        }
            
        return back()->with('success', sprintf('Cliente %s actualizado', $cliente->nombre_completo));
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}
