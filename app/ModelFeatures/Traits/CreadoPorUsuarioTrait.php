<?php

namespace App\ModelFeatures\Traits;

use App\Models\User;

trait CreadoPorUsuarioTrait
{
    public function creadoPorUsuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'creado_por_usuario');
    }
}
