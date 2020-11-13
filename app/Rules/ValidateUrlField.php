<?php

namespace App\Rules;

use App\Models\Admin\Gsbmenu;
use Illuminate\Contracts\Validation\Rule;

class ValidateUrlField implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value != '#') {
            $menu = Gsbmenu::where($attribute, $value)->where('gsbmenu_id', '!=', request()->route('id'))->get(); //devuelve una colección en caso que encuentre el dato en la tabla 
            return $menu->isEmpty(); //si no esta vacio devuelve false
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La url ya fue asignada.';
    }
}
