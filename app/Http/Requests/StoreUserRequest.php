<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        // dd($this->all());
        return [
            "name"                => "required|max:255",
            "email"                => "required|email|confirmed|unique:users|max:255",
            "password"            => "required|confirmed|max:255"
        ];
    }


    public function attributes(): array
    {
        return [
            'name'                => 'nombre',
            'email'                => 'correo',
            'password'            => 'contraseña',
        ];
    }

    public function messages(): array
    {
        return [
        'name.required'               => 'El :attribute es requerido',
        'name.max'                    => 'El :attribute es de máximo 255 carácteres',  
        'email.required'               => 'El :attribute es requerido',
        'email.max'                    => 'El :attribute es de máximo 255 carácteres',
        'email.email'                  => 'Ingrese un formato de :attribute válido',
        'password.required'           => 'La :attribute es requerido',
        'password.max'                    => 'La :attribute es de máximo 255 carácteres',
        ];
    }

}
