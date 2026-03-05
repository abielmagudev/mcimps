<?php

namespace App\Models\Guia;

use App\ModelFeatures\Abstracts\ModelFilter;

class GuiaFilter extends ModelFilter
{
    public function buscar(string $valor)
    {
        $this->query = $this->query->where('id', 'like', $valor);

        return $this;
    }

    public function status(string $valor)
    {
        $this->query = $this->query->where('status', $valor);

        return $this;
    }
}
