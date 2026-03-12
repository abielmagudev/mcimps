<?php

namespace App\Models\Transportadora;

use Laravel\Nova\Fields\Enum;

enum TransportadoraNacionalidadEnum: string
{
    case MEXICANA = 'mexicana';
    case AMERICANA = 'americana';
}
