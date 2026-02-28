<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDireccionRequest extends FormRequest
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
            'calle' => 'required',
            'colonia' => 'required',
            'codigo_postal' => [
                'required',
                'integer',
            ],
            'ciudad' => 'required',
            'estado' => 'required',
            'cobertura' => ['required', 'in:domicilio,ocurre'],
            'nombre_contacto' => 'nullable',
            'telefono_contacto' => 'nullable',
            'referencias' => 'nullable',
        ];
    }
}
