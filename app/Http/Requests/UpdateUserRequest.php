<?php

namespace App\Http\Requests;

use App\Models\User\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:users,name,'.$this->route('user')->id,
                'regex:/^[a-zA-Z0-9._]+$/',
            ],
            'type' => [
                'required',
                Rule::in( array_column(UserTypeEnum::cases(), 'value') ),
            ],
            'password' => [
                'nullable',
                'confirmed',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'type' => 'tipo',
            'password' => 'contraseña',
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'El nombre de usuario solo puede contener letras, números, puntos y guiones',
        ];
    }
}
