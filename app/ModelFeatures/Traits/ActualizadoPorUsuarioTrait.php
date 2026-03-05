<?php

namespace App\ModelFeatures\Traits;

use App\Models\User;

trait ActualizadoPorUsuarioTrait
{
    public function actualizadoPorUsuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'actualizado_por_usuario');
    }
}
