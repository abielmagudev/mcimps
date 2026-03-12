<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Socio;
use App\Models\Direccion;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use App\Models\Transportadora;
use Symfony\Component\HttpFoundation\Request;

class GuiaController extends Controller
{
    public function index(Request $request)
    {
        $guiasQuery = Guia::with(['direccion.Socio', 'transportadora']);

        if( $request->has('rastreo') )
        {
            $guiasQuery = $guiasQuery
            ->where('numero_rastreo_origen', 'like', "%{$request->get('rastreo')}%")
            ->orWhere('numero_rastreo_usa', 'like', "%{$request->get('rastreo')}%");
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

        $guias = $guiasQuery->orderBy('updated_at', 'desc')->paginate(100);

        $contadores = [
            'recibido' => Guia::where('status', GuiaStatusEnum::RECIBIDO)->count(),
            'ingreso' => Guia::where('status', GuiaStatusEnum::INGRESO)->count(),
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
        
        return redirect()->route('guias.edit', $guia)->with('success', 'Guía actualizada con éxito');
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

            $data['direcciones'] = Direccion::join('socios', 'direcciones.socio_id', '=', 'socios.id')
            ->select('direcciones.*', 'socios.nombre') // Evita colisión de IDs
            ->where(function ($query) use ($buscar) {
                $query->where('direcciones.calle', 'like', "%{$buscar}%")
                    ->orWhere('socios.nombre', 'like', "%{$buscar}%");
            })
            ->with('socio')
            ->limit(50)
            ->get();

            $data['sociosDirecciones'] = $data['direcciones']->groupBy('socio_id');
        }

        return view('guias.seleccionar-direccion', $data);
    }

    public function destroy(Guia $guia)
    {
        if(! $guia->delete() ) {
            return back()->withErrors($guia->errors())->with('error', 'Error al eliminar la guía');
        }

        return redirect()->route('guias.index')->with('success', sprintf('Guía con rastreo #%s eliminada con éxito', $guia->numero_rastreo_usa));
    }

    public function confirmarEliminacion(Guia $guia)
    {
        return view('guias.confirmar-eliminacion')->with('guia', $guia);
    }
}
