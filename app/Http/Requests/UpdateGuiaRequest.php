<?php

namespace App\Http\Requests;

use App\Models\Guia\GuiaStatusEnum;
use App\Models\Transportadora;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGuiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'nombre_cliente' => str($this->input('nombre_cliente'))->stripTags()->toString(),
            'telefono_cliente' => str($this->input('telefono_cliente'))->stripTags()->toString(),
            'numero_rastreo_usa' => str($this->input('numero_rastreo_usa'))->stripTags()->toString(),
            'numero_rastreo_secundario' => str($this->input('numero_rastreo_secundario'))->stripTags()->toString(),
            'numero_consolidado' => str($this->input('numero_consolidado'))->stripTags()->toString(),
            'secuencia_cajas' => str($this->input('secuencia_cajas'))->stripTags()->toString(),
            'observaciones' => str($this->input('observaciones'))->stripTags()->toString(),
        ]);
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
            'status' => [
                'sometimes',
                'required',
                sprintf('in:%s', GuiaStatusEnum::seleccionables()->pluck('value')->implode(',')),
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
