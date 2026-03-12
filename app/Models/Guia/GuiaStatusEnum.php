<?php

namespace App\Models\Guia;

enum GuiaStatusEnum: string
{
    const DEFAULT = self::RECIBIDO;
    
    case RECIBIDO = 'recibido';
    case INGRESO = 'ingreso';
}
