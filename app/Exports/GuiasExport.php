<?php

namespace App\Exports;

use App\Models\Guia;
use App\Models\Guia\GuiaQueryLista;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class GuiasExport implements FromView
{
    protected $request;

    public function view(): View
    {
        $guiasQuery = Guia::with(['direccion','direccion.socio', 'transportadoraAmericana', 'transportadoraMexicana']);
        
        if( $this->request->filled('buscar') && $this->request->filled('buscar-por') ) {
            $guiasQuery = GuiaQueryLista::buscar($guiasQuery, $this->request->get('buscar'), $this->request->get('buscar-por'));
        }

        if(! $this->request->filled('buscar') ) {
            $guiasQuery = GuiaQueryLista::filtrar($guiasQuery, $this->request);
        }
        
        $guias = $guiasQuery->orderBy('updated_at', 'desc')->get();

        return view('guias.export.lista', [
            'guias' => $guias,
        ]);
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}
