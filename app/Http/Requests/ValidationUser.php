<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (!$this->route('id')) {
            return [
                'gsbuser_login' => [
                    'required',
                    'max:50',
                    Rule::unique('gsbuser', 'gsbuser_login')->ignore($this->route('id'), 'gsbuser_id')
                ],
                'gsbuser_name' => [
                    'required',
                    'max:50',
                ],
                'gsbuser_email' => [
                    'required',
                    'email',
                    'max:100',
                    Rule::unique('gsbuser', 'gsbuser_email')->ignore($this->route('id'), 'gsbuser_id')
                ],
                'password' => [
                    'required',
                    'min:5',
                ],
                're_password' => [
                    'required',
                    'same:password',
                ],
                'rol_id' => [
                    'required',
                    'array',
                ]
            ];
        } else {
            return [
                'gsbuser_login' => [
                    'required',
                    'max:50',
                    Rule::unique('gsbuser', 'gsbuser_login')->ignore($this->route('id'), 'gsbuser_id')
                ],
                'gsbuser_name' => [
                    'required',
                    'max:50',
                ],
                'gsbuser_email' => [
                    'required',
                    'email',
                    'max:100',
                    Rule::unique('gsbuser', 'gsbuser_email')->ignore($this->route('id'), 'gsbuser_id')
                ],
                'password' => [
                    'nullable',
                    'min:5',
                ],
                're_password' => [
                    'nullable',
                    'required_with:password',
                    'min:5',
                    'same:password',
                ],
                'rol_id' => [
                    'required',
                    'array',
                ]
            ];
        }
    }

    public function messages()
    {
        return [
            'gsbuser_login.required' => 'El campo usuario es requerido',
            'gsbuser_login.max' => 'El campo no puede ser mayor de 50',
            'gsbuser_login.unique' => 'El contenido del campo usuario ya fue utilizado',
            'gsbuser_name.required' => 'El campo nombre es requerido',
            'gsbuser_name.max' => 'El campo no puede ser mayor de 50',
            'gsbuser_email.required' => 'El campo email es requerido',
            'gsbuser_email.email' => 'La cadane no concuerda con un email bien formado',
            'gsbuser_email.max' => 'El campo no puede ser mayor de 100',
            'gsbuser_email.unique' => 'El contenido del campo email ya fue utilizado',
            'gsbuser_password.required' => 'El campo password es requerido',
            'gsbuser_password.min' => 'El campo no puede ser menor de 5',
            're_password.required' => 'El campo re_password es requerido',
            're_password.same' => 'Las contraseñas no coinciden',
            'rol_id.required' => 'El campo rol_id es requerido',
            're_password.required_with:password' => 'El campo re_password es requerido cuando password está presente',
        ];
    }
}
