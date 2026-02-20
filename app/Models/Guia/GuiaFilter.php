<?php

namespace App\Models\Guia;

use App\Models\Guia;

class GuiaFilter
{
    public static function buscar(string $valor)
    {
        return Guia::where('nombre', 'like', '');
    }
}
