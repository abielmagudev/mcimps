<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy('App\Observers\GuiaObserver')]
class Guia extends Model
{
    /** @use HasFactory<\Database\Factories\GuiaFactory> */
    use HasFactory;

    protected $fillable = [
        'numero_rastreo_origen',
        'numero_rastreo_usa',
        'numero_rastreo_mex',
        'registro_salida',
        'fecha_salida',
        'observaciones',
        'status',
        'direccion_id',
        'transportadora_id',
        'salida_por_usuario',
        // 'creado_por_usuario',
        // 'actualizado_por_usuario',
    ];

    public function direccion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Direccion::class);
    }

    public function cliente(): Cliente|null
    {
        return $this->direccion->cliente;
    }

    public function transportadora(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transportadora::class);
    }

    public function salidaPorUsuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
