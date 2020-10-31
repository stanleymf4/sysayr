<?php

namespace App\Http\Requests;

use App\Rules\ValidateUrlField;
use Illuminate\Foundation\Http\FormRequest;

class ValidationMenu extends FormRequest
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
            'gsbmenu_name' => 'required|max:50|unique:gsbmenu,gsbmenu_name' . $this->route('id'),
            'gsbmenu_url' => ['required', 'max:100', new ValidateUrlField()],
            'gsbmenu_icon' => 'nullable|max:50'
        ];
    }

    public function messages()
    {
        return [
            'gsbmenu_name.required' => 'El campo nombre es requerido',
            'gsbmenu_url.required' => 'El campo url es requerido',
            'gsbmenu_name.max' => 'El campo no puede ser mayor de 50',
            'gsbmenu_name.unique' => 'El contenido del campo nombre ya fue utilizado',
            'gsbmenu_url.max' => 'El campo no puede ser mayor de 100'
        ];
    }
}
