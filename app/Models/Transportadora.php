<?php

namespace App\Models;

use App\Models\Guia\Traits\RelacionGuiasTrait;
use App\ModelTraits\ActualizadoPorUsuarioTrait;
use App\ModelTraits\CreadoPorUsuarioTrait;
use App\ModelTraits\EliminadoPorUsuarioTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy('App\Observers\TransportadoraObserver')]
class Transportadora extends Model
{   
    /** @use HasFactory<\Database\Factories\TransportadoraFactory> */
    use HasFactory;
    use SoftDeletes;

    use RelacionGuiasTrait;
    use CreadoPorUsuarioTrait;
    use ActualizadoPorUsuarioTrait;
    use EliminadoPorUsuarioTrait;

    protected $fillable = [
        'nombre',
        'sitio_web',
        'telefono',
    ];
}
