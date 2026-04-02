<?php

namespace App\Models\Guia;

use Illuminate\Support\Collection;

enum GuiaStatusEnum: string
{
    const DEFAULT = self::RECIBIDO;
    
    case RECIBIDO = 'recibido';
    case INGRESO = 'ingreso';
    case ENTREGADO = 'entregado';

    public static function seleccionables(): Collection|array
    {
        return collect([
            self::INGRESO,
            self::ENTREGADO,
        ]);
    }
}
