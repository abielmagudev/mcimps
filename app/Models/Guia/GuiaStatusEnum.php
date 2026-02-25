<?php

namespace App\Models\Guia;

enum GuiaStatusEnum: string
{
    // case DEFAULT = self::RECIBIDO;
    const DEFAULT = self::RECIBIDO;
    
    case RECIBIDO = 'recibido';
    case PENDIENTE = 'pendiente';
    case TRANSITO = 'transito';
    case ENTREGADO = 'entregado';
}
