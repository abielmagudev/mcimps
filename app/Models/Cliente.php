<?php

namespace App\Models;

use App\ModelTraits\ActualizadoPorUsuarioTrait;
use App\ModelTraits\CreadoPorUsuarioTrait;
use App\ModelTraits\EliminadoPorUsuarioTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy('App\Observers\ClienteObserver')]
class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;
    use SoftDeletes;

    use CreadoPorUsuarioTrait;
    use ActualizadoPorUsuarioTrait;
    use EliminadoPorUsuarioTrait;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre_completo',
        'telefono',
    ];

    public function direcciones(): HasMany
    {
        return $this->hasMany(Direccion::class);
    }
}
