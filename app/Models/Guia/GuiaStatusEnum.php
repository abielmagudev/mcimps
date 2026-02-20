<?php

namespace App\Models\Guia;

enum GuiaStatusEnum: string
{
    // case DEFAULT = self::RECIBIDO;
    const DEFAULT = self::RECIBIDO;
    
    case RECIBIDO = 'recibido';
    case EN_RUTA = 'en ruta';
    case ENTREGADO = 'entregado';
    case CANCELADO = 'cancelado';
}
