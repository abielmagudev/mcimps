<?php

namespace App\Helpers\Xcode;

use Illuminate\Database\Eloquent\Builder;

class ModelFilter
{
    public function __construct(public Builder $query)
    {

    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->query, $name], $arguments);
    }
}