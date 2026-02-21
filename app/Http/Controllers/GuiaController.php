<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use App\Models\Transportadora;
use Symfony\Component\HttpFoundation\Request;

class GuiaController extends Controller
{
    public function index(Request $request)
    {
        $guiasQuery = Guia::with(['direccion.cliente', 'transportadora']);

        if( $request->has('rastreo') )
        {      
            $guias = $guiasQuery
            ->where('numero_rastreo_origen', 'like', '%' . $request->get('rastreo') . '%')
            ->orWhere('numero_rastreo_usa', 'like', '%' . $request->get('rastreo') . '%')
            ->orWhere('numero_rastreo_mex', 'like', '%' . $request->get('rastreo') . '%')
            ->get();  
        } else {
            $statusInitials = $request->filled('status') ? [$request->get('status')] : [GuiaStatusEnum::DEFAULT, GuiaStatusEnum::EN_RUTA];
            $guias = $guiasQuery->whereIn('status', $statusInitials)->get();
        }

        return view('guias.index', [
            'guias' => $guias,
            'contadores' => [
                'recibido' => Guia::where('status', GuiaStatusEnum::RECIBIDO)->count(),
                'en ruta' => Guia::where('status', GuiaStatusEnum::EN_RUTA)->count(),
                'entregado' => Guia::where('status', GuiaStatusEnum::ENTREGADO)->count(),
                'cancelado' => Guia::where('status', GuiaStatusEnum::CANCELADO)->count(),
            ],
            'statuses' => GuiaStatusEnum::cases(),
        ]);
    }

    public function create(Request $request, Cliente|null $cliente, Direccion|null $direccion)
    {
        if( $cliente->id && $direccion->id )
        {
            if(! $cliente->direcciones->contains($direccion) ) {
                return abort(404);
            }

            return view('guias.create', [
                'guia' => new Guia(),
                'cliente' => $cliente,
                'direccion' => $direccion,
                'transportadoras' => Transportadora::all(),
            ]);
        }
    
        if( $cliente->id && $direccion->id == null )
        {
            return view('guias.create.seleccion-direccion', [
                'cliente' => $cliente,
                'request' => $request,
            ]);
        }

        $clientes = collect();

        if ( $request->has('cliente') ) {
            $clientes = Cliente::where('nombre_completo', 'like', '%' . $request->get('cliente') . '%')->get();
        }

        return view('guias.create.seleccion-cliente', [
            'clientes' => $clientes,
            'request' => $request,
        ]);
    }

    public function store(StoreGuiaRequest $request, Cliente $cliente, Direccion $direccion)
    {
        if(! $cliente->direcciones->contains($direccion) ) {
            return abort(404);
        }

        $validated = $request->validated();
        $validated['direccion_id'] = $direccion->id;
        $validated['transportadora_id'] = $request->input('transportadora');
    
        if(! $guia = Guia::create($validated) ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al crear la guía');
        }

        return redirect()->route('guias.index')->with('success', 'Guía creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guia $guia)
    {
        //
    }

    public function edit(Guia $guia)
    {
        return view('guias.edit', [
            'guia' => $guia,
            'cliente' => $guia->direccion->cliente,
            'direccion' => $guia->direccion,
            'transportadoras' => Transportadora::all(),
            'statuses' => GuiaStatusEnum::cases(),
        ]);
    }

    public function update(UpdateGuiaRequest $request, Guia $guia)
    {
        if(! $guia->update($request->validated())) {
            return back()->withErrors($guia->errors())->with('error', 'Error al actualizar la guía');
        }

        return back()->with('success', 'Guía actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guia $guia)
    {
        //
    }
}
