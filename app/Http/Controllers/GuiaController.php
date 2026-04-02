<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Direccion;
use App\Models\Guia;
use App\Models\Guia\GuiaStatusEnum;
use App\Models\Guia\GuiaQueryLista;
use App\Models\Transportadora;
use Symfony\Component\HttpFoundation\Request;

class GuiaController extends Controller
{
    public function index(Request $request)
    {
        $guiasQuery = Guia::with(['Direccion.Socio', 'transportadoraAmericana', 'transportadoraMexicana']);
        
        if( $request->filled('buscar') && $request->filled('buscar-por') ) {
            $guiasQuery = GuiaQueryLista::buscar($guiasQuery, $request->get('buscar'), $request->get('buscar-por'));
        }

        if(! $request->filled('buscar') ) {
            $guiasQuery = GuiaQueryLista::filtrar($guiasQuery, $request, function ($guiasQuery) {
                return $guiasQuery->where('status', GuiaStatusEnum::RECIBIDO);
            });
        }
        
        $guias = $guiasQuery->orderBy('updated_at', 'desc')->paginate(100)->withQueryString();

        $contadores = [
            'recibido' => Guia::where('status', GuiaStatusEnum::RECIBIDO)->count(),
            'ingreso' => Guia::where('status', GuiaStatusEnum::INGRESO)->count(),
            'entregado' => Guia::where('status', GuiaStatusEnum::ENTREGADO)->count(),
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
            'statusSeleccionables' => GuiaStatusEnum::seleccionables(),
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

        return redirect()->route('guias.index', ['status' => $guia->status])->with('success', sprintf('Guía con rastreo #%s eliminada con éxito', $guia->numero_rastreo_usa));
    }
}
