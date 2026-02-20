<?php

namespace App\Models\Guia\Traits;

trait RelacionGuias
{
    public function guias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Guia::class);
    }
}
