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
