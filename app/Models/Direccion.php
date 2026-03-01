<?php

namespace App\Models;

use App\Models\Guia\Traits\RelacionGuias;
use App\ModelTraits\ActualizadoPorUsuarioTrait;
use App\ModelTraits\CreadoPorUsuarioTrait;
use App\ModelTraits\EliminadoPorUsuarioTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy('App\Observers\DireccionObserver')]
class Direccion extends Model
{
    /** @use HasFactory<\Database\Factories\DireccionFactory> */
    use HasFactory;

    use RelacionGuias;
    use CreadoPorUsuarioTrait;
    use ActualizadoPorUsuarioTrait;
    
    protected $table = 'direcciones';

    protected $fillable = [
        'calle',
        'colonia',
        'codigo_postal',
        'ciudad',
        'estado',
        'cobertura',
        'referencias',
        'prellenados',
    ];

    public function prellenados(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return json_decode($value, true);
            },
            set: function ($value) {
                return json_encode($value);
            },
        );
    }

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
