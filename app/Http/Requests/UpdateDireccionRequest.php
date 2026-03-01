<?php

namespace App\Http\Requests;

use App\Models\Direccion\DireccionCoberturaEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDireccionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'calle' => 'required',
            'colonia' => 'required',
            'codigo_postal' => [
                'required',
                'integer',
            ],
            'ciudad' => 'required',
            'estado' => 'required',
            'cobertura' => [
                'required', 
                Rule::in(array_column(DireccionCoberturaEnum::cases(), 'value'))
            ],
            'referencias' => 'nullable',
            'prellenados' => [
                'nullable', 
                'array'
            ],
        ];
    }
}
