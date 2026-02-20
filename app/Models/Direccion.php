<?php

namespace App\Models;

use App\Models\Guia\Traits\RelacionGuias;
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
        'nombre_contacto',
        'telefono_contacto',
        'referencias',
        'cobertura',
    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function getLinealAttribute(): string
    {
        return sprintf('%s, %s, %s, %s %s', 
            $this->calle, 
            $this->colonia, 
            $this->ciudad, 
            $this->estado, 
            $this->codigo_postal
        );
    }
}
