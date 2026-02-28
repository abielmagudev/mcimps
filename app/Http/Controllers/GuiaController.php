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
            $guiasQuery = $guiasQuery
            ->where('numero_rastreo_origen', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('numero_rastreo_usa', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('numero_rastreo_mex', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('registro_salida', 'like', "%{$request->get('rastreo')}%");
        } 
        elseif( $request->filled('fecha') )
        {
            $guiasQuery = $guiasQuery->whereDate('created_at', '=', $request->get('fecha'));
        }
        elseif( $request->filled('transportadora') )
        {
            $guiasQuery = $guiasQuery->where('transportadora_id', $request->get('transportadora'));
        }
        elseif( $request->filled('status') )
        {
            $guiasQuery = $guiasQuery->where('status', $request->get('status'));
        }
        else {
            $guiasQuery = $guiasQuery->where('status', GuiaStatusEnum::RECIBIDO);
        }

        $guias = $guiasQuery->get();

        $contadores = [
            'recibido' => Guia::where('status', GuiaStatusEnum::RECIBIDO)->count(),
            'pendiente' => Guia::where('status', GuiaStatusEnum::PENDIENTE)->count(),
            'transito' => Guia::where('status', GuiaStatusEnum::TRANSITO)->count(),
            'entregado' => Guia::where('status', GuiaStatusEnum::ENTREGADO)->count(),
        ];

        return view('guias.index', [
            'guias' => $guias,
            'contadores' => $contadores,
            'transportadoras' => Transportadora::all(),
            'statuses' => GuiaStatusEnum::cases(),
            'request' => $request,
        ]);
    }

    public function create(Request $request)
    {
        if( $request->has('seleccionar-direccion') ) {
           return $this->seleccionarDireccion($request, new Guia);
        }

        return view('guias.create', [
            'direccion' => Direccion::find($request->get('direccion')) ?? new Direccion,
            'guia' => new Guia,
            'request' => $request,
            'transportadoras' => Transportadora::all(),
        ]);
    }

    public function store(StoreGuiaRequest $request)
    {    
        if(! $guia = Guia::create($request->validated()) ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al crear la nueva guía');
        }

        return redirect()->route('guias.index')->with('success', sprintf('Nueva guía #%s creada con éxito', $guia->id));
    }

    public function show(Guia $guia)
    {
        return view('guias.show', [
            'guia' => $guia,
        ]);
    }

    public function edit(Request $request, Guia $guia)
    {
        if( $request->has('seleccionar-direccion') ) {
           return $this->seleccionarDireccion($request, $guia);
        }

        return view('guias.edit', [
            'direccion' => Direccion::find($request->get('direccion')) ?? new Direccion,
            'guia' => $guia,
            'transportadoras' => Transportadora::all(),
        ]);
    }

    public function update(UpdateGuiaRequest $request, Guia $guia)
    {
        if(! $guia->update($request->validated()) ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al actualizar la guía');
        }

        $guia->refresh();

        if(! $guia->puedeTenerStatusPendiente() ) {
            $guia->asignarStatus(GuiaStatusEnum::RECIBIDO);
        }

        if( $guia->puedeTenerStatusPendiente() ) {
            $guia->asignarStatus(GuiaStatusEnum::PENDIENTE);
        }

        if( $guia->puedeTenerStatusTransito() ) {
            $guia->asignarStatus(GuiaStatusEnum::TRANSITO);
        }

        if( $guia->puedeTenerStatusEntregado() && $request->filled('status_entregado') ) {
            $guia->asignarStatus(GuiaStatusEnum::ENTREGADO);
        }

        if( $guia->isDirty() &&! $guia->save() ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al actualizar status de la guía');
        }

        return redirect()->route('guias.edit', $guia)->with('success', 'Guía actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guia $guia)
    {
        //
    }

    public function seleccionarDireccion(Request $request, Guia $guia)
    {
        $data = [
            'guia' => $guia,
            'request' => $request,
        ];

        if( $request->filled('seleccionar-direccion') ) 
        {
            $buscar = $request->get('seleccionar-direccion');

            $data['direcciones'] = Direccion::join('clientes', 'direcciones.cliente_id', '=', 'clientes.id')
            ->select('direcciones.*', 'clientes.nombre_completo') // Evita colisión de IDs
            ->where(function ($query) use ($buscar) {
                $query->where('direcciones.calle', 'like', "%{$buscar}%")
                    ->orWhere('clientes.nombre_completo', 'like', "%{$buscar}%");
            })
            ->with('cliente')
            ->limit(50)
            ->get();
        }

        return view('guias.seleccionar-direccion', $data);
    }
}
