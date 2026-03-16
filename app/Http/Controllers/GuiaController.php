<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Direccion;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use App\Models\Transportadora;
use Symfony\Component\HttpFoundation\Request;

class GuiaController extends Controller
{
    public function index(Request $request)
    {
        $guiasQuery = Guia::with(['direccion.Socio', 'transportadoraAmericana', 'transportadoraMexicana']);

        if( $request->has('rastreo') )
        {
            $guiasQuery = $guiasQuery
            ->where('numero_rastreo_usa', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('numero_rastreo_origen', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('nombre_cliente', 'like', "%{$request->get('rastreo')}%");
        } 
        elseif( $request->filled('fecha') )
        {
            $guiasQuery = $guiasQuery->whereDate('created_at', '=', $request->get('fecha'));
        }
        elseif( $request->filled('transportadora-americana') )
        {
            $guiasQuery = $guiasQuery->where('transportadora_americana_id', $request->get('transportadora-americana'));
        }
        elseif( $request->filled('transportadora-mexicana') )
        {
            $guiasQuery = $guiasQuery->where('transportadora_mexicana_id', $request->get('transportadora-mexicana'));
        }
        elseif( $request->filled('status') )
        {
            $guiasQuery = $guiasQuery->where('status', $request->get('status'));
        }
        else {
            $guiasQuery = $guiasQuery->where('status', GuiaStatusEnum::RECIBIDO);
        }

        $guias = $guiasQuery->orderBy('updated_at', 'desc')->paginate(100);

        $contadores = [
            'recibido' => Guia::where('status', GuiaStatusEnum::RECIBIDO)->count(),
            'ingreso' => Guia::where('status', GuiaStatusEnum::INGRESO)->count(),
        ];

        return view('guias.index', [
            'guias' => $guias,
            'contadores' => $contadores,
            'transportadorasAmericanas' => Transportadora::americanas()->get(),
            'transportadorasMexicanas' => Transportadora::mexicanas()->get(),
            'statuses' => GuiaStatusEnum::cases(),
            'request' => $request,
        ]);
    }

    public function create(Request $request)
    {
        return view('guias.create', [
            'direccion' => Direccion::find($request->get('direccion')) ?? new Direccion,
            'guia' => new Guia,
            'request' => $request,
            'transportadorasAmericanas' => Transportadora::americanas()->get(),
            'transportadorasMexicanas' => Transportadora::mexicanas()->get(),
        ]);
    }

    public function store(StoreGuiaRequest $request)
    {    
        if(! $guia = Guia::create($request->validated()) ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al crear la nueva guía');
        }

        return redirect()->route('guias.create')->with('success', sprintf('Nueva guía creada con rastreo: %s', $guia->numero_rastreo_usa));
    }

    public function show(Guia $guia)
    {
        return view('guias.show', [
            'guia' => $guia,
        ]);
    }

    public function edit(Request $request, Guia $guia)
    {
        return view('guias.edit', [
            'direccion' => Direccion::find($request->get('direccion')) ?? new Direccion,
            'guia' => $guia,
            'transportadorasAmericanas' => Transportadora::americanas()->get(),
            'transportadorasMexicanas' => Transportadora::mexicanas()->get(),
        ]);
    }

    public function update(UpdateGuiaRequest $request, Guia $guia)
    {
        if(! $guia->update($request->validated()) ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al actualizar la guía');
        }
        
        return redirect()->route('guias.edit', $guia)->with('success', 'Guía actualizada con éxito');
    }

    public function confirmarEliminacion(Guia $guia)
    {
        return view('guias.confirmar-eliminacion')->with('guia', $guia);
    }

    public function destroy(Guia $guia)
    {
        if(! $guia->delete() ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al eliminar la guía');
        }

        return redirect()->route('guias.index')->with('success', sprintf('Guía con rastreo #%s eliminada con éxito', $guia->numero_rastreo_usa));
    }
}
