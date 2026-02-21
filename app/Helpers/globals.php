<?php

/**
 * Bootstrao CSS helpers
 */
if( ! function_exists('bsIsInvalidClass') )
{
    function bsIsInvalidClass($key, $class = 'is-invalid')
    {
        $errors = session('errors');
        
        return ($errors && $errors->has($key)) ? $class : '';
    }
}

if( ! function_exists('marker') )
{
    function marker(string $search, string $subject)
    {        
        if ( empty($search) ) {
            return $subject;
        }

        // Escapamos caracteres especiales del patrón para evitar errores de Regex
        $pattern = '/' . preg_quote($search, '/') . '/i';

        // El marcador $0 representa la coincidencia encontrada (mantiene el formato original)
        return preg_replace($pattern, '<mark>$0</mark>', $subject);
    }
}
