<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuiaRequest extends FormRequest
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
            'numero_rastreo_origen' => 'required',
            'numero_rastreo_usa' => 'required',
            'numero_rastreo_mex' => 'required',
            'numero_rastreo_salida' => 'required',
            'observaciones' => 'required',
            'transportadora' => 'required|exists:transportadoras,id',
            'status' => 'required',
        ];
    }
}
