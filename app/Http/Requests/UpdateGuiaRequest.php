<?php

namespace App\Http\Requests;

use App\Models\Transportadora;
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
            'nombre_cliente' => 'nullable',
            'telefono_cliente' => 'nullable',
            'numero_rastreo_usa' => 'required',
            'numero_rastreo_secundario' => 'nullable',
            'numero_consolidado' => 'nullable',
            'secuencia_cajas' => 'nullable',
            'observaciones' => 'nullable',
            'direccion_id' => [
                'nullable',
                'exists:direcciones,id',
            ],
            'transportadora_americana_id' => [
                'nullable',
                Rule::in(array_column(Transportadora::americanas()->get()->toArray(), 'id')),
            ],
            'transportadora_mexicana_id' => [
                'nullable',
                Rule::in(array_column(Transportadora::mexicanas()->get()->toArray(), 'id')),
            ],
            'status_entregado' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'direccion_id' => 'dirección',
            'transportadora_id' => 'transportadora',
            'status_entregado' => 'status entregado',
        ];
    }
}
