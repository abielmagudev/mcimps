<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;
    use SoftDeletes;

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
