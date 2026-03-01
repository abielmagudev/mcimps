<?php

namespace App\Models\Guia\Traits;

use App\Models\Guia;

trait RelacionGuiasTrait
{
    public function guias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Guia::class);
    }
}
