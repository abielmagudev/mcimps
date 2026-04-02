<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocioRequest;
use App\Http\Requests\UpdateSocioRequest;
use Illuminate\Http\Request;
use App\Models\Socio;

class SocioController extends Controller
{
    public function index()
    {
        return view('socios.index', [
            'socios' => Socio::orderBy('id')->paginate(config('aplicacion.paginacion.socios')),
        ]);
    }

    public function create()
    {
        return view('socios.create', [
            'socio' => new Socio,
        ]);
    }

    public function store(StoreSocioRequest $request)
    {
        $socio = Socio::create($request->validated());

        if(! $socio instanceof Socio ) {
            return back()->with('error', 'Error al guardar el Socio, intente nuevamente');
        }

        $parameters = [$socio, ...$request->query()];

        return redirect()->route('socios.direcciones.create', $parameters)->with('success', sprintf('Socio %s guardado', $socio->nombre));
    }

    public function show(Socio $socio)
    {
        return view('socios.show', [
            'socio' => $socio,
        ]);
    }

    public function edit(Socio $socio)
    {
        return view('socios.edit', [
            'socio' => $socio,
        ]);
    }

    public function update(UpdateSocioRequest $request, Socio $socio)
    {
        if(! $socio->update($request->validated()) ) {
            return back()->with('error', 'Error al actualizar el Socio, intente nuevamente');
        }
            
        return back()->with('success', sprintf('Socio %s actualizado', $socio->nombre));
    }

    public function destroy(Socio $socio)
    {
        //
    }
}
