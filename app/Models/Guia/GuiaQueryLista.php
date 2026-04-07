<?php

namespace App\Models\Guia;

use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GuiaQueryLista
{
    public static function buscar(Builder $query, string $valor, string $buscarPor): Builder
    {
        if( $buscarPor == 'cliente' ) {
            return $query->whereNotNull('nombre_cliente')
            ->where('nombre_cliente', '!=', '')
            ->where('nombre_cliente', 'like', "%{$valor}%");
        }

        if( $buscarPor == 'direccion' )
        {
            return $query->whereHas('direccion', function ($subquery) use ($valor) {
                $subquery->where('calle', 'like', "%{$valor}%");
            });
        }

        if( $buscarPor == 'rastreo' )
        {
            return $query->where('numero_rastreo_usa', 'like', "%{$valor}%")
            ->orWhere('numero_rastreo_secundario', 'like', "%{$valor}%");
        }

        if( $buscarPor == 'consolidado' ) {
            return $query->where('numero_consolidado', 'like', "%{$valor}%");
        }

        return $query;
    }

    public static function filtrar(Builder $query, Request $request, callable|null $fallback = null): Builder
    {
        if( $request->has('fecha') ) {
            return $query->whereDate('created_at', '=', $request->get('fecha'));
        }

        if( $request->has('transportadora-americana') ) {
            return $query->where('transportadora_americana_id', $request->get('transportadora-americana'));
        }

        if( $request->has('transportadora-mexicana') ) {
            return $query->where('transportadora_mexicana_id', $request->get('transportadora-mexicana'));
        }

        if( $request->has('status') ) {
            return $query->where('status', $request->get('status'));
        }

        return is_callable($fallback) ? $fallback($query) : $query;
    }
}
