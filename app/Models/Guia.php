<?php

namespace App\Models;

use App\Models\Guia\GuiaStatusEnum;
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

    public function tieneDireccion(): bool
    {
        return $this->direccion instanceof Direccion;
    }

    public function tieneTransportadora(): bool
    {
        return $this->transportadora instanceof Transportadora;
    }

    public function statusEs(GuiaStatusEnum $statusEnum): bool
    {
        return $this->status == $statusEnum->value;
    }

    public function asignarStatus(GuiaStatusEnum $statusEnum): self
    {
        $this->status = $statusEnum->value;
        return $this;
    }

    public function puedeTenerStatusPendiente(): bool
    {
        return $this->tieneDireccion() && $this->tieneTransportadora();
    }

    public function puedeTenerStatusTransito(): bool
    {
        return $this->puedeTenerStatusPendiente() && isset($this->numero_rastreo_mex) && isset($this->registro_salida);
    }

    public function puedeTenerStatusEntregado(): bool
    {
        return $this->puedeTenerStatusTransito() && $this->statusEs(GuiaStatusEnum::TRANSITO);
    }

    public function puedeTenerRegistroSalida(): bool
    {
        return $this->tieneDireccion() && $this->tieneTransportadora() && isset($this->numero_rastreo_mex);
    }

    public function tieneStatusEntregado(): bool
    {
        return $this->statusEs(GuiaStatusEnum::ENTREGADO);
    }
}
