<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationPermission extends FormRequest
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
        return [
            'gtvpmss_desc' => [
                'required',
                'max:150',
                Rule::unique('gtvpmss', 'gtvpmss_desc')->ignore($this->route('id'), 'gtvpmss_id')
            ],
            'gtvpmss_slug' => [
                'required',
                'max:50',
                Rule::unique('gtvpmss', 'gtvpmss_slug')->ignore($this->route('id'), 'gtvpmss_id')
            ]
        ];
    }

    public function messages()
    {
        return [
            'gtvpmss_desc.required' => 'El campo nombre es requerido',
            'gtvpmss_desc.max' => 'El campo no puede ser mayor de 150',
            'gtvpmss_desc.unique' => 'El contenido del campo nombre ya fue utilizado',
            'gtvpmss_slug.max' => 'El campo no puede ser mayor de 50',
            'gtvpmss_slug.required' => 'El campo slug es requerido',
            'gtvpmss_slug.unique' => 'El contenido del campo slug ya fue utilizado',
        ];
    }
}
