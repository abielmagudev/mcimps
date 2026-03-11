<?php

namespace App\Models;

use App\ModelFeatures\Traits\ActualizadoPorUsuarioTrait;
use App\ModelFeatures\Traits\CreadoPorUsuarioTrait;
use App\ModelFeatures\Traits\EliminadoPorUsuarioTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy('App\Observers\SocioObserver')]
class Socio extends Model
{
    /** @use HasFactory<\Database\Factories\SocioFactory> */
    use HasFactory;
    use SoftDeletes;

    use CreadoPorUsuarioTrait;
    use ActualizadoPorUsuarioTrait;
    use EliminadoPorUsuarioTrait;

    protected $table = 'socios';

    protected $fillable = [
        'nombre',
        'telefono',
    ];

    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class);
    }
}
