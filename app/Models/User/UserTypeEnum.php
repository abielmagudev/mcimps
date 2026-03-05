<?php

namespace App\Models\User;

use BenSampo\Enum\Enum;

enum UserTypeEnum: string
{
    case ADMINISTRADOR = 'administrador';
    case DOCUMENTADOR = 'documentador';
    case ALMACEN = 'almacen';
    case ALMACEN_USA = 'almacen_usa';
    case ALMACEN_MEX = 'almacen_mex';

    public function titulo(): string
    {
        return match ($this) {
            self::ADMINISTRADOR => 'Administrador',
            self::DOCUMENTADOR => 'Documentador',
            self::ALMACEN => 'Almacén en Estados Unidos y México',
            self::ALMACEN_USA => 'Almacén en Estados Unidos',
            self::ALMACEN_MEX => 'Almacén en México',
        };
    }

    public function routePaginaInicial(): string
    {
        return match ($this) {
            self::ADMINISTRADOR => 'guias.index',
            self::DOCUMENTADOR => 'guias.index',
            self::ALMACEN => 'registros.usa.create',
            self::ALMACEN_USA => 'registros.usa.create',
            self::ALMACEN_MEX => 'registros.mex.search',
        };
    }
    
    public function urlPaginaInicial(array $parameters = []): string
    {
        return route($this->routePaginaInicial(), $parameters);
    }
}
