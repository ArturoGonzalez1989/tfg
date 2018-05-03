<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuarioRequest extends FormRequest
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
            'nombre' => 'required',
            'email'  => 'required|unique:users,email,' . $this->route('usuario'), //esto nos permite que se compruebe el email contra la ruta usuarios/usuario para que no coja el propio email del usuario y le diga que ya está en uso.
        ];
    }
}
