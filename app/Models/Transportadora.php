<?php

namespace App\Models;

use App\Models\Guia\Traits\RelacionGuias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use RelacionGuias;
    
    /** @use HasFactory<\Database\Factories\TransportadoraFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'sitio_web',
        'telefono',
    ];
}
