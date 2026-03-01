<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero_rastreo_origen' => 'nullable',
            'numero_rastreo_usa' => 'required',
            'numero_rastreo_mex' => 'nullable',
            'registro_salida' => 'nullable',
            'observaciones' => 'nullable',
            'nombre_contacto' => 'nullable',
            'telefono_contacto' => 'nullable',
            'direccion_id' => [
                'bail',
                'nullable',
                'exists:direcciones,id',
            ],
            'transportadora_id' => [
                'bail',
                'nullable',
                'exists:transportadoras,id',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'direccion_id' => 'dirección',
            'transportadora_id' => 'transportadora',
        ];
    }
}
