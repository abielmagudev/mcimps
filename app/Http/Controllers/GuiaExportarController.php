<?php

namespace App\Http\Controllers;

use App\Exports\GuiasExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuiaExportarController extends Controller
{
    public function __construct(private Excel $excel)
    {
        //
    }

    public function lista(Request $request)
    {
        $export = new GuiasExport();
        $export->setRequest($request);
        $filename = sprintf('guias-%s.xlsx', now());

        return Excel::download($export, $filename);
        // return $this->excel->download((new GuiasExport())->setRequest($request), 'guias.xlsx');
    }
}
