<?php

namespace App\ModelFeatures\Traits;

use App\Models\User;

trait EliminadoPorUsuarioTrait
{
    public function eliminadoPorUsuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'eliminado_por_usuario');
    }
}
