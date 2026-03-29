<?php

namespace App\Http\Requests;

use App\Models\Direccion\DireccionCoberturaEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDireccionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'calle' => str($this->input('calle'))->stripTags()->toString(),
            'colonia' => str($this->input('colonia'))->stripTags()->toString(),
            'ciudad' => str($this->input('ciudad'))->stripTags()->toString(),
            'estado' => str($this->input('estado'))->stripTags()->toString(),
            'referencias' => str($this->input('referencias'))->stripTags()->toString(),
        ]);
    }

    public function rules(): array
    {
        return [
            'calle' => [
                'required',
                'string'
            ],
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
