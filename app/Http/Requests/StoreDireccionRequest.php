<?php

namespace App\Http\Requests;

use App\Models\Direccion\DireccionCoberturaEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDireccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
