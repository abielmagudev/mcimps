<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGuiaRequest extends FormRequest
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
            'direccion_id' => [
                'nullable',
                'exists:direcciones,id',
            ],
            'transportadora_id' => [
                'nullable',
                'exists:transportadoras,id',
            ],
            'status_entregado' => [
                'sometimes', 
                'boolean',
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
