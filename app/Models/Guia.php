<?php

namespace App\Models;

use App\Models\Guia\GuiaStatusEnum;
use App\ModelFeatures\Traits\ActualizadoPorUsuarioTrait;
use App\ModelFeatures\Traits\CreadoPorUsuarioTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy('App\Observers\GuiaObserver')]
class Guia extends Model
{
    /** @use HasFactory<\Database\Factories\GuiaFactory> */
    use HasFactory;

    use CreadoPorUsuarioTrait;
    use ActualizadoPorUsuarioTrait;

    protected $fillable = [
        'numero_rastreo_usa',
        'numero_rastreo_secundario',
        'numero_consolidado',
        'secuencia_cajas',
        'observaciones',
        'nombre_cliente',
        'telefono_cliente',
        'direccion_id',
        'transportadora_americana_id',
        'transportadora_mexicana_id',
        // 'status',
    ];

    public function direccion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Direccion::class);
    }

    public function socio(): Socio|null
    {
        return $this->direccion->socio;
    }

    public function ingresadoPorUsuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'ingresado_por_usuario');
    }

    public function transportadoraAmericana(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transportadora::class, 'transportadora_americana_id');
    }

    public function transportadoraMexicana(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transportadora::class, 'transportadora_mexicana_id');
    }

    public function tieneTransportadoraAmericana(): bool
    {
        return $this->transportadoraAmericana instanceof Transportadora;
    }

    public function tieneTransportadoraMexicana(): bool
    {
        return $this->transportadoraMexicana instanceof Transportadora;
    }

    public function tieneDireccion(): bool
    {
        return $this->direccion instanceof Direccion;
    }

    public function statusEs(GuiaStatusEnum $statusEnum): bool
    {
        return $this->status == $statusEnum->value;
    }

    public function tieneStatusEntregado(): bool
    {
        return $this->statusEs(GuiaStatusEnum::ENTREGADO);
    }
}
