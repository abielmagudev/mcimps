<?php

namespace App\Models;

use App\Models\Guia\Traits\RelacionGuias;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use RelacionGuias;
    
    /** @use HasFactory<\Database\Factories\DireccionFactory> */
    use HasFactory;

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
